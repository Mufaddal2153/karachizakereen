<?php
class ControllerEvent extends BaseController
{
    public function getEvent() {
        $hijri = new HijriCalendar();
        $events = Model::factory('Event')->find_array();
        $this->app->render('event.php', array('events' => $events, 'hijri_date' => $hijri));
    }

    public function saveEvent() {
        
        
        $aTargets = $this->app->request()->post();
       //d($aTargets,1);
        $oEvent = Model::factory('Event')->create();
        $oEvent->setFields($aTargets);
        $oEvent->save();
        echo json_encode($aTargets);
        $this->app->flash('success', "Successfully Saved");
    } 
    public function deleteEvent(){
        $id = $this->app->request()->params('id');
        $oEvent = Model::factory('Event')
                       ->where_equal('id',$id)
                       ->delete_many(); 
    echo json_encode($id);
    }
    public function updateEvent(){
        try{
        $update = $this->app->request()->params();
        $oEvent = Model::factory('Event')->find_one($update['id']);
        $oEvent->setFields($update);
        $oEvent->save();

        if($oEvent->hasErrors()){
            throw new Exception(CHtml::errorSummary($oEvent));
        }
        echo json_encode($update);
    }
    catch (Exception $ex) {
        ORM::get_db()->rollBack();
        d($ex->getMessage());
        $this->app->flash('errors', $ex->getMessage());
    }
        
    }
    public function eventSchedule($id = null){
        $aData['id'] = $id;
        $aData['event'] = Model::factory('Event')
                            ->order_by_asc('date')
                               ->find_array();
        

        $this->app->render('event_time.php',$aData);
    }
    public function eventTime(){
        $event_id=$this->app->request()->params('event_id');
        //d($event_id,1);
        $eventshedule['mohallah'] = Model::factory('Mohalla')
                                  ->table_alias('m')  
                                  ->select_many_expr('m.*','et.time')
                                  ->left_outer_join('event_time','et.mohalla_id=m.id AND et.event_id='.$event_id,'et' )
                                  ->order_by_asc('m.id')
                                  ->find_array();
          // d($eventshedule['mohallah'],1);
        $eventshedule['event_id']=$event_id;
          echo json_encode($eventshedule);

    }
    public function setEventTime(){
          $aRequest = $this->app->request()->post();
          //d($aRequest['event_id'],1);
          $event_time = Model::factory('EventTime')
                      ->where_equal('event_id', $aRequest['event_id']);

          $event_time->delete_many();
         
          foreach($aRequest['time'] as $key => $value){
             if($value != ''){
                //d($event_id);
                $oModel = Model::factory('EventTime')->create();
                $oModel->event_id = $aRequest['event_id'];
                $oModel->mohalla_id = $key;
                $oModel->time = $value;
                //d($oModel);
                $oModel->save();

              }
          }
          $this->app->flash('success', "Successfully Saved");
          $this->app->redirect(CURR_DIR .'eventschedule');
          
    }

}
?>