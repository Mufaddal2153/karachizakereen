<?php

class SiteConfig {

    private $_aConfig = array();

    public function __construct() {
        $aModels = ORM::for_table('setting')->find_many();
        foreach ($aModels as $oModel) {
            $this->_aConfig[$oModel->key] = $oModel->value;
        }
        $_SESSION['config'] = $this->_aConfig;
    }

    public function get($key) {
        return isset($this->_aConfig[$key]) ? $this->_aConfig[$key] : '';
    }

    public function getAll() {
        return $this->_aConfig;
    }

    public function set($group, $key, $value) {
        $oModel = ORM::for_table('setting')
                ->where('group', $group)
                ->where('key', $key)
                ->find_one();

        if (!$oModel) {
            $oModel = ORM::for_table('setting')->create();
            $oModel->key = $key;
            $oModel->group = $group;
        }
        $oModel->value = $value;
        $oModel->save();
        return $this->_aConfig[$key] = $value;
    }

}
