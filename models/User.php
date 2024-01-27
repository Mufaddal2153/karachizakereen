<?php

class User extends JModel {

    public static $_table = 'user';
    //fields
    protected $_fields = array(
        'id',
        'user',
        'pass',
    );

    function authenticate($data) {
        try {
            /*if (trim($data['its_id']) == "" || !is_numeric($data['its_id']) || strlen($data['its_id']) != 8) {
                throw new Exception("Invalid ITS Number Entered");
            }*/
            if (trim($data['user']) == "") {
                throw new Exception("User Required");
            }
            if (trim($data['password']) == "") {
                throw new Exception("Invalid pass Entered");
            }

            $oModel = Model::factory('User')->where('user', $data['user'])->find_one();
            if (!$oModel) {
                throw new Exception("No User found.");
            }
            $oModel = Model::factory('User')
                    ->where('user', $data['user'])
                    ->where('pass', $data['password'])
                    ->find_one();
            if(!$oModel)
                throw new Exception("Authentication Failed! Invalid user / pass.");

            $aResult = $oModel->as_array();
            $_SESSION['user_id'] = $aResult['id'];
            $_SESSION['user'] = $aResult['user'];
        } catch (Exception $ex) {
            $aResult['error'] = $ex->getMessage();
        }
        return $aResult;
    }
}
?>