<?php

/**
 * Description of Breadcrumb
 * Set/Get breadcrumb dynamically
 * @author MoizShabbir
 */
class Breadcrumb {

    protected $_app;
    public $seperator = " / ";

    public function __construct($app) {
        $this->_app = $app;
        if (!isset($_SESSION['breadcrumbs'])) {
            $_SESSION['breadcrumbs'] = array(
                array(
                    'name' => 'Home',
                    'url' => CURR_DIR
                )
            );
        }
    }

    private function checkExists($aPermission) {
        $bExists = false;
        if (array_key_exists($aPermission['id'], $_SESSION['breadcrumbs']) == true) {
            $bExists = true;
            $iCount = count($_SESSION['breadcrumbs']);
            $i = array_search($aPermission['id'], array_keys($_SESSION['breadcrumbs']));
            if (($i + 1) != $iCount) {
                $aArr = array_slice($_SESSION['breadcrumbs'], 0, ($i + 1), true);
                $_SESSION['breadcrumbs'] = $aArr;
            }
        } else {
            $aKeys = array_keys($_SESSION['breadcrumbs']);
            $iLast = $aKeys ? end($aKeys) : array();
            if ($iLast != 0) {
                $aResource = Model::factory('UserRole')->create()->getResource($iLast);
                if ((isset($aResource['parent_resource']) && isset($aPermission['parent_resource'])) && $aResource['parent_resource'] != $aPermission['parent_resource']) {
                    $first = reset($_SESSION['breadcrumbs']);
                    $this->clearList();
                    $_SESSION['breadcrumbs'][] = $first;
                }
            }
        }
        return $bExists;
    }

    public function clearList() {
        if (isset($_SESSION['breadcrumbs']))
            unset($_SESSION['breadcrumbs']);
    }

    public function add($sName, $sUrl) {
        if ($this->_app->permission) {
            $id = $this->_app->permission['id'];
        } else {
            $id = 0;
            $this->_app->permission = array('id' => -1);
        }

        if (!$this->checkExists($this->_app->permission)) {
            $_SESSION['breadcrumbs'][$id] = array(
                'name' => $sName,
                'url' => $sUrl,
            );
        }
    }

    public function getList() {
        return $_SESSION['breadcrumbs'];
    }

}
