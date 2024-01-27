<?php
class ControllerApp extends BaseController {

	public function index_blank() {
		$this->app->render('blank.php');
	}
	
	public function index() {
		$this->app->render('main.php');
	}

	public function ajax(){
		$hijri = new HijriCalendar();
		$its = $this->app->request->get('search_term');
		//Making Log on ITS # Search
		$date = date('F j, Y');
        $time = date('g:i A');
        $its_log = Model::factory('ItsLog')->create();
        $its_log ->its = $its;
        $its_log ->date = $date;
        $its_log ->time = $time;
        $its_log->save();

		$search = Model::factory('Schedule')//raw_query('SELECT *,p.name as party_name, s.id as schedule_id FROM schedule s INNER JOIN party p ON s.party_id = p.id INNER JOIN mohalla m ON s.mohalla_id = m.id WHERE p.its = '.$this->app->request->get('search_term'))->find_array();
				->table_alias('s')
				->select_many('s.*', 'p.teeper', 'p.phone', 'p.its',array('party_name' => 'p.name'),array('urus' => 'e.title'),'e.date', 'e.is_multiple', 'm.name', 'm.mohalla_co', 'm.mohalla_num')
				->inner_join('party','s.party_id=p.id','p')
				->inner_join('event','s.event_id=e.id','e')
				->inner_join('mohalla','s.mohalla_id=m.id','m')
				->left_outer_join('event_time','et.event_id=e.id AND m.id=et.mohalla_id','et')
				->order_by_asc('e.date')
				->where('p.its',$its)
				->find_array();
				
		$this->app->render('search.php',  array('search_results' => $search, 'hijri_date' => $hijri));
	}

	public function attended() {
		$aResult = array();
		try {
			$params = $this->app->request()->post();
			$oModel = Model::factory('Schedule')->find_one($params['id']);
			if(!$oModel)
				throw new Exception("Error Processing Schedule");
			
			if($params['type'] == "user")
				$oModel->attended = $params['status'];
			
			if($params['type'] == "aamil")
				$oModel->verified = $params['status'];
				
			$oModel->save();
			
			$aResult['success'] = "Attendance Saved";
		} catch (Exception $e) {
			$aResult['error'] = $e->getMessage();
		}
		echo json_encode($aResult);
			
	}

	public function login() {

		$this->app->render('login.php');
	}

	public function teeperLogin() {
		$this->app->render('teeperLogin.php');
	}

	public function verifyTeeper() {
		$aResult = array();
		try {
			$params = $this->app->request()->post();
			// print_r($params);
			$oModel = Model::factory('Party')
			->where('its', $params['teeper_its'])
			->where('password', $params['teeper_password'])
			->find_one();
			// d($oModel, 1);
			if(!$oModel)
				throw new Exception("Teeper ID doesnt Exist");
			
			$_SESSION['teeper_its'] = $params['teeper_its'];
			
			$aResult['success'] = True;
			$aResult["redirect"] = "partyinfo";
		} catch (Exception $e) {
			$aResult['error'] = $e->getMessage();
		}
		echo json_encode($aResult);
	
	}

	public function teeperPartyInfo() {
		if(!isset($_SESSION['teeper_its']))
			$this->app->redirect(CURR_DIR . 'teeperLogin');
		$oModel = Model::factory('Party')->where('its', $_SESSION['teeper_its'])->find_one()->as_array();
		$aResult = array();
		$aResult = $oModel;
		// d($aResult, 1);
		$this->app->render('teeperPartyInfo.php', array("data" => $aResult));
	}

	public function authenticate() {
		try {
			$params = $this->app->request->params();
			$oModel = Model::factory('User')->create();
			$aUser = $oModel->authenticate($params);
			if(isset($aUser['error']))
				throw new Exception($aUser['error']);
			
			$redirect = 'mohalla';
		} catch(Exception $e) {
			$this->app->flash('errors', $e->getMessage());
			$redirect = 'aamil';
		}
		$this->app->redirect(CURR_DIR . $redirect);
	}

	public function mohallaIndex() {
		$result['aMohalla'] = CHtml::listData(Model::factory('Mohalla')->order_by_asc('name')->find_many(), 'id', 'name');

		$this->app->render('mohalla.php', $result);
	}

	public function mohallaDetail() {
		$hijri = new HijriCalendar();
		//$search = ORM::for_table('party')->raw_query('SELECT *, m.name as mohalla, p.name as party_name , s.id as schedule_id FROM schedule s INNER JOIN party p ON s.party_id = p.id INNER JOIN mohalla m ON s.mohalla = m.id WHERE s.mohalla = '.$this->app->request->post('search_term'). ' order by s.date ASC')->find_array();
		$search = ORM::for_table('party')->raw_query('SELECT *, m.name as mohalla, p.name as party_name ,e.title as urus,e.date as dates ,s.id as schedule_id FROM schedule s INNER JOIN party p ON s.party_id = p.id INNER JOIN mohalla m ON s.mohalla_id = m.id INNER JOIN event e ON s.event_id = e.id WHERE s.mohalla_id = '.$this->app->request->post('search_term').' ORDER BY e.date ASC' )->find_array();
		$status = array('-1' => '-', '0'=> 'No', '1'=>'Yes');
		$this->app->render('mohalla.php',  array('search_results' => $search, 'hijri_date' => $hijri, 'status'=> $status));
	}

	public function party() {

		$partys = ORM::for_table('party')->order_by_asc('name')->find_array();
		$this->app->render('party.php',  array('data' => $partys));

	}

	public function partyinfo() {

		$partys = CHtml::listData(ORM::for_table('party')->order_by_asc('name')->find_array(), 'id', function($row){return 'Hizbe '.$row['name'];});
		$aMohallas = CHtml::listData(Model::factory('Mohalla')->order_by_asc('name')->find_many(), 'id', 'name');
		$this->app->render('partyinfo.php',  array('aParties' => $partys, 'aMohalla' => $aMohallas));

	}

	public function savePartyinfo() {
		$aResult = array();
		try {
			ORM::get_db()->beginTransaction();
			$params = $this->app->request()->post();
			// TODO:: validate field in params before save;

			$oModel = Model::factory('PartyInfo')->create();
			
			if(isset($params['id']) && $params['id']){
				$oModel = Model::factory('PartyInfo')->find_one($params['id']);
			}
			$aPartyInfo = array(
				'party_id' => $params['party_id'],
				'mohalla_id' => $params['mohalla_id'],
				'registered' => $params['registered']
			);
			$oModel->setFields($aPartyInfo);
			$oModel->save();
			if($oModel->hasErrors()){
				throw new Exception(CHtml::errorSummary($oModel));
			}

			if(isset($params['members']) && count($params['members']) > 0) {
				if(isset($params['id'])){
					Model::factory('PartyMember')->where('partyinfo_id',$params['id'])->delete_many();
				}

				foreach ($params['members'] as $aMember) {
					$oMember = Model::factory('PartyMember')->create();
					$oMember->partyinfo_id = $oModel->id;
					$oMember->setFields($aMember);
					$oMember->save();
					if($oMember->hasErrors()){
						throw new Exception(CHtml::errorSummary($oMember));
					}
				}
			}
			
			$aResult['success'] = "PartyInfo Saved";
			ORM::get_db()->commit();
		} catch (PDOException $e) {
			ORM::get_db()->rollBack();
			$aResult['error'] = $e->getMessage();
		} catch (Exception $e) {
			ORM::get_db()->rollBack();
			$aResult['error'] = $e->getMessage()." - ". $e->getTraceAsString();
		}
		echo json_encode($aResult);
	}

	public function uploadPhotos() {
		try {
			$params = $this->app->request->params();
			$directory = 'photos'; // Folder where to save in DIR_FILES;
			// $model = str_replace(' ', '', ucwords(str_replace('_', ' ', $directory)));

			$files = $_FILES['image'];
			$pathInfo = pathinfo($files['name']);
			$ext = $pathInfo['extension'];

			$res = uploadSingleFile($files, $directory);
			$aFile = array(
				'name' => $directory."/".$files['name'],
				'full_name' => HTTP_FILES."/".$directory."/".$files['name'],
				'ext' => $ext,
				'size' => $files['size'],
			);

			if(!isset($res['success']))
				throw new Exception($res['error']);
		} catch(Exception $e) {
			$aFile['error'] = $e->getMessage();
		}

		$oFiles = new stdClass();
		$oFiles->files = array($aFile);

		echo json_encode($oFiles);
	}

	public function partyedit() {

		$partys = CHtml::listData(ORM::for_table('party')->order_by_asc('name')->find_array(), 'id', function($row){return 'Hizbe '.$row['name'];});
		$aMohallas = CHtml::listData(Model::factory('Mohalla')->order_by_asc('name')->find_many(), 'id', 'name');
		$result = array();

        $result['event_id'] = $this->app->request()->params('id', '');
        $result['aParties'] = CHtml::listData(Model::factory('Party')->order_by_asc('name')->find_array(), 'id', function($row){return 'Hizbe '.$row['name'];});
        $result['aTeepers'] = CHtml::listData(Model::factory('Party')->select('id')->select_expr('CONCAT(teeper," - (",IFNULL(name,"N/A"),")")','party')->order_by_asc('teeper')->find_many(), 'id', 'party');
        $result['aMohalla'] = CHtml::listData(Model::factory('Mohalla')->order_by_asc('name')->find_many(), 'id', 'name');
        $result['aEvents'] = CHtml::listData(Model::factory('Event')->order_by_asc('date')->find_many(), 'id', 'title');
        // d($result['aEvents']);
		$this->app->render('partyedit.php',  array('aParties' => $partys, 'aMohalla' => $aMohallas, $result));

	}

	public function savePartyedit() {
		$aResult = array();
		$aUpdatedTargets = array();
		try {
			ORM::get_db()->beginTransaction();
			$params = $this->app->request()->post();
            $aTargeted = $this->request->post('target');
            $party = $this->request->post('party');
			// TODO:: validate field in params before save;

			$oModel = Model::factory('PartyInfo')->create();
			
			if(isset($params['id']) && $params['id']){
				$oModel = Model::factory('PartyInfo')->find_one($params['id']);
			}
			$aPartyInfo = array(
				'party_id' => $params['party_id'],
				'mohalla_id' => $params['mohalla_id'],
				'registered' => $params['registered']
			);
			$oModel->setFields($aPartyInfo);
			$oModel->save();
			if($oModel->hasErrors()){
				throw new Exception(CHtml::errorSummary($oModel));
			}

			if(isset($params['members']) && count($params['members']) > 0) {
				if(isset($params['id'])){
					Model::factory('PartyMember')->where('partyinfo_id',$params['id'])->delete_many();
				}

				foreach ($params['members'] as $aMember) {
					$oMember = Model::factory('PartyMember')->create();
					$oMember->partyinfo_id = $oModel->id;
					$oMember->setFields($aMember);
					$oMember->save();
					if($oMember->hasErrors()){
						throw new Exception(CHtml::errorSummary($oMember));
					}
				}
			}

            if(!$party){
                throw new Exception('Select party.');
            }
           $SModel = Model::factory('Schedule')->where('party_id', $party);
           $SModel->delete_many();

            foreach ($aTargeted as $i=>$aTarget) {
                if($i != -1){
                    $SModelTarget = Model::factory('Schedule')->create();
                    $SModelTarget->setFields($aTarget);
                    $SModelTarget->party_id = $party;
                    $SModelTarget->attended = 0;
                    $SModelTarget->verified=-1;
                    $SModelTarget->save();
                    if($SModelTarget->hasErrors()){
                        throw new Exception(CHtml::errorSummary($SModelTarget));
                    }
                }
            }
			$aResult['success'] = "PartyEdit Saved";
			ORM::get_db()->commit();
		} catch (PDOException $e) {
			ORM::get_db()->rollBack();
			$aResult['error'] = $e->getMessage();
		} catch (Exception $e) {
			ORM::get_db()->rollBack();
			$aResult['error'] = $e->getMessage()." - ". $e->getTraceAsString();
		} catch (Exception $ex) {
            ORM::get_db()->rollBack();
            d($ex->getMessage());
            $this->app->flash('errors', $ex->getMessage());
        }
        d($aResult['result'],1);
        
        $aResult['result'] = CURR_DIR . 'partyedit';
        echo json_encode($aResult);
	}
}