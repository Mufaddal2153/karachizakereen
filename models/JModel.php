<?php

/**
 * User: Moiz Shabbir
 * Date: 29/08/14
 * Fund Type Model
 */

class JModel extends Model {
    
    public function  afterValidate() {
        parent::afterValidate();
        if($this->getScenario() == 'insert'){
            $this->created_at = $this->date();
            if(isset($_SESSION['user_id'])) {
                $this->created_by = $_SESSION['user_id'];
            }
            else
            {
                $_SESSION['user_id']='';
            }
        }
        if($this->getScenario() == 'update'){
            $this->updated_at = $this->date();
            if(isset($_SESSION['user_id'])) {
                $this->updated_by = $_SESSION['user_id'];
            }
            else
            {
                $_SESSION['user_id']='';
            }
        }
        return;
    }
    
}