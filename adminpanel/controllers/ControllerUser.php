<?php
error_reporting(E_ERROR);
class ControllerUser extends BaseController
{
    public function login() {
        if(isset($_SESSION['user_id'])){
            session_unset();
        }
        $req = $this->app->request();
        $data = $req->post();
        $oModel = Model::factory('User')->create();
        $aResult = $oModel->authenticate($data);
        
        if (!isset($aResult['error'])) {
            $this->app->redirect(CURR_DIR .'adminindex');
        } else {
            $this->app->flash('errors', $aResult['error']);
            $this->app->redirect(CURR_DIR . 'login' );
        }
    }
        
    public function loginForm() {
        $this->app->breadcrumb->clearList();
        
        if (isset($_SESSION['user_id'])) {
            $_SESSION['name'] = "test";
            session_unset();
            session_destroy();
        }
        
        //$data['layout'] = false;
        $this->app->render('user/login.php');
    }
    
    public function logout() {
        session_unset();
        session_destroy();
        $this->app->redirect(CURR_DIR);
    }

    public function adminIndex() {
       $url='eventschedule';
        $result = array();
        $aEvents = Model::factory('Event')
                ->find_array();

        $events = array();
        foreach($aEvents as $aEvent){
            $events[] = array(
                'start'=>$aEvent['date'],
                'url'=> $url.'/'.$aEvent['id'],
                'title' => $aEvent['title']
            );
        }
         $result['events'] = json_encode($events);

        $this->app->render('admin.php', $result);
    }


    public function getDetails() {
        $party = $this->app->request()->params('party', null);
        //d($party,1);
        $event_id = $this->app->request()->params('event_id', null);
        
        $result['schedules'] = Model::factory('Schedule')
                            ->where('party_id', $party)
                            //->where('event_id',$event_id)
                            ->find_array();
         //d($result['schedules'],1);
        echo json_encode($result);
    }

    public function scheduleIndex() {
        $result = array();

        $result['event_id'] = $this->app->request()->params('id', '');

        $result['aParties'] = CHtml::listData(Model::factory('Party')->order_by_asc('name')->find_array(), 'id', function($row){return 'Hizbe '.$row['name'];});
        $result['aTeepers'] = CHtml::listData(Model::factory('Party')->select('id')->select_expr('CONCAT(teeper," - (",IFNULL(name,"N/A"),")")','party')->order_by_asc('teeper')->find_many(), 'id', 'party');
        $result['aMohalla'] = CHtml::listData(Model::factory('Mohalla')->order_by_asc('name')->find_many(), 'id', 'name');
        $result['aEvents'] = CHtml::listData(Model::factory('Event')->order_by_asc('date')->find_many(), 'id', 'title');
        
        $this->app->render('zakereen.php', $result);
    }    

    public function addSchedule() {

        $aResult = array();
        $aUpdatedTargets = array();
        try {
            if ($this->app->request()->post()) {
                ORM::get_db()->beginTransaction();
                $aTargeted = $this->request->post('target');
                $party = $this->request->post('party');
                if(!$party){
                    throw new Exception('Select party.');
                }
               $oModel = Model::factory('Schedule')
                       ->where('party_id', $party);
               $oModel->delete_many();

                foreach ($aTargeted as $i=>$aTarget) {
                    if($i != -1){
                        $oModelTarget = Model::factory('Schedule')->create();
                        $oModelTarget->setFields($aTarget);
                        $oModelTarget->party_id = $party;
                        $oModelTarget->attended = 0;
                        $oModelTarget->verified=-1;
                        $oModelTarget->save();
                        if($oModelTarget->hasErrors()){
                            throw new Exception(CHtml::errorSummary($oModelTarget));
                        }
                    }
                  
                }
                
            }
            ORM::get_db()->commit();
            $this->app->flash('success', "Successfully Saved");
        }
        catch (Exception $ex) {
            ORM::get_db()->rollBack();
            d($ex->getMessage());
            $this->app->flash('errors', $ex->getMessage());
        }
        $aResult['result'] = CURR_DIR . 'zakereen';
        echo json_encode($aResult);
    }

    public function deleteSchedule(){
        $id = $this->app->request()->params('id');
        //d($id,1);
        $oEvent = Model::factory('Schedule')->find_one($id);
        $oEvent->delete();
    }

    public function clearLog(){
        try{
            $delete = orm::for_table('its_log')->delete_many();
            $res['success'] = 'Log Deleted Successfully';         
        }
        catch(Exception $ex){
            $res['error'] = $ex->getMessage();
        }
        echo json_encode($res);
    }

    public function clearschedule(){
        try{
            $delete = orm::for_table('schedule')->delete_many();
            $res['success'] = 'Schedule Deleted Successfully';         
        }
        catch(Exception $ex){
            $res['error'] = $ex->getMessage();
        }
        echo json_encode($res);
    }

    public function schedule_ids($shedule_detail){
         $ids = array();
        foreach($shedule_detail as $key=>$name){
            if($key == 'party_name'){
                $oModel = Model::factory('Party')
                        ->where('name',$name)->find_one();
                if(isset($oModel->id)){        
                    $ids['party_id'] = $oModel->id;
                }
                else{
                    return 0;
                }
            }
            if($key == 'event_name'){
                $oModel = Model::factory('Event')
                        ->where('title',$name)->find_one();
                if(isset($oModel->id)){
                    $ids['event_id'] = $oModel->id;
                }
                else{
                    return 0;
                }   
            }
            if($key == 'mohallah_name'){
                $oModel = Model::factory('Mohalla')
                        ->where('name',$name)->find_one();
                if(isset($oModel->id)){
                    $ids['mohallah_id'] = $oModel->id;
                }
                else{
                    return 0;
                }
            }
        }
        return $ids;
    }
    
    public function addCsv(){
        $form = $this->app->request()->post();
        try{
            if(isset($_FILES['schedule_file']) && $_FILES['schedule_file']['name'] != '') {
                $directory = 'schedule_detail';
                $scheduleFile = $_FILES['schedule_file'];
                $res = uploadImage($scheduleFile, $directory);
                if(isset($res['error'])) {
                    throw new Exception($res['error']);
                }
                $file_path = DIR_FILES . '/schedule_detail/'.$scheduleFile['name'];
                $file_path = str_replace('\\','/',$file_path);
                
                $rows = array_map('str_getcsv', file($file_path));
                $header = array_shift($rows);
                $csv = array();
                foreach ($rows as $row) {
                    $csv = array_combine($header, $row);
                    $oModel = orm::for_table('schedule_details')->create();
                    $oModel ->party_name = $csv['party_name'];
                    $oModel->event_name = $csv['event_name'];
                    $oModel->mohallah_name = $csv['mohallah_name'];
                    $oModel->save();
                }
                $aSchedules = orm::for_table('schedule_details')
                           ->select_many('party_name','event_name','mohallah_name')
                           ->find_array();
                foreach($aSchedules as $schedule){
                    if($this->schedule_ids($schedule) != 0 ){
                        $schedule_id = $this->schedule_ids($schedule);
                        $oModel = orm::for_table('schedule')->create();
                        $oModel ->party_id = $schedule_id['party_id'];
                        $oModel->event_id = $schedule_id['event_id'];
                        $oModel->mohalla_id = $schedule_id['mohallah_id'];
                        $oModel->save();
                    }
                }
                $aSchedules = orm::for_table('schedule_details')->delete_many();
                unlink($file_path);
                $this->app->flash('success', 'Schedule Updated Successfully');
            }
        }
        catch(Exception $ex){
            $this->app->flash('error', $ex->getMessage());
        }
        $this->app->redirect(CURR_DIR.'zakereen');
    }

}

?>