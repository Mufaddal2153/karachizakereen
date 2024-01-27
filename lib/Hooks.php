<?php

/**
 * Add Validation script
 */
$app->hook('add.validation.script', function($aParam) use ($app) {
    $aData = $app->view()->getData();
    $mModel = null;
    if(isset($aParam['models']) && $aParam['models']){
        $mModel = $aParam['models'];
    }
    if($mModel == null){
        return false;
    }
    $sForm = 'document.forms[0]';
    if(isset($aParam['form']) && $aParam['form']){
        $sForm = $aParam['form'];
    }
    $aData['aScript'][] = 'assets/js/jquery.validate.min.js';
    $aRules = array();
    if (is_array($mModel)) {
        $aModelRules = array();
        foreach ($mModel as $oModel) {
            $aRule = $oModel->getRules();
            $aModelRules = array_merge($aModelRules, $aRule['rules']);
        }
        $aRules['rules'] = $aModelRules;
        
    } else {
        $aRules = $mModel->getRules();
    }
    //d($sForm);
    $aData['aInlineScript'][] = '$('.$sForm.').validate(' . json_encode($aRules) . ');';
    $app->view()->appendData($aData);
});

/**
 * Slim internal before route dispatch hook
 * Initiating variables
 */
$app->hook('slim.before.dispatch', function() use ($app) {
    $aData['aScript'] = array();
    $aData['aInlineScript'] = array();
    $aData['aVarScript'] = array();
    $aData['aLinks'] = array();
    $aData['header_title'] = '';

    $request_url = $app->request()->getResourceUri();
    if (preg_match('/\/[\d]+/', $request_url)) {
        $request_url = preg_replace('/\/[\d]+/', '', $request_url);
    }

    $app->request_url = $request_url;

    $app->view()->appendData($aData);
});

/**
 * Slim internal after route dispatch hook
 */
$app->hook('slim.before.view', function() use ($app) {
    $aData = $app->view()->getData();
    $aData['request_url'] = $app->request_url;
//    $aBusinessConcepts = CHtml::listData(Model::factory('BusinessConcept')
//                            ->where('is_active', 1)
//                            ->where('is_deleted', 0)
//                            ->find_many(), 'id', 'route');
    $aData['aVarScript'][] = 'var request_url = "' . $app->request_url . '";';
    $aData['aVarScript'][] = 'var iActivityModule = false'; //. ((in_array($request_url, $aBusinessConcepts)) ? array_search($request_url, $aBusinessConcepts) : 'false' ) . ';';
    if ($app->request()->get('no-layout', '') != '' || $app->request()->isAjax()) {
        $aData['layout'] = false;
    }
    $app->view()->appendData($aData);
});


/**
 * Authentication callback
 */
$authenticate = function ($app, $bRedirect = true) {

    return function () use ($app, $bRedirect) {
        try {
            if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
                throw new Exception('Login Required', 1);
            }

            $result = false;
            
        } catch (Exception $ex) {
            if (!$bRedirect) {
                $app->stop();
            } else {
                $app->flash('errors', $ex->getMessage());
                if ($ex->getCode() == 1) {
                    $app->redirect(CURR_DIR . 'login');
                } else {
                    $app->redirect(CURR_DIR);
                }
            }
        }
    };
};
$tokenAuth = function() use($app){
    return function() use($app) {
        $token = $app->request->get('token', false);
        //token = a717f41c203cb970f96f706e4b12617b
        if($token && $token == md5('12453')){
            return true;
        }
        $app->redirect(CURR_DIR);
    };
};
?>