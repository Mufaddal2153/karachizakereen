<?php

define('CURR_DIR',  '/karachizakereen/');
define('SESSION_NAME',  'gs1MainPanel');
require_once 'config.php';
require_once 'constants.php';

$app->config(array('templates.path' => 'templates'));

require_once 'lib/Hooks.php';
initSession(SESSION_NAME);

function my_autoloader($className) {
    $arr = preg_split('/(?=[A-Z])/', $className);
    $arr = array_slice($arr, 1);
    $path = false;
    if (isset($arr[1]) && $arr[1] == "Vendor") {
        $path = __DIRNAME__ . "vendor/" . strtolower($arr[2]) . ".php";
    } elseif (stristr($className, 'Controller')) {
        $path = __DIRNAME__ . "/controllers/" . $className . ".php";
    } else {
        $path = __DIRNAME__ . "/models/" . $className . ".php";
    }
    if (file_exists($path)) {
        require_once $path;
    }
}

spl_autoload_register("my_autoloader");

$app->get('/', 'ControllerApp:index');
$app->get('/home', 'ControllerApp:index_blank');
$app->get('/search', 'ControllerApp:ajax');
$app->post('/attended', 'ControllerApp:attended');
$app->get('/teeperLogin', 'ControllerApp:teeperLogin');
$app->post('/verifyTeeper', 'ControllerApp:verifyTeeper');

$app->get('/aamil', 'ControllerApp:login');
$app->post('/aamil', 'ControllerApp:authenticate');

$app->get('/mohalla', $tokenAuth($app), 'ControllerApp:mohallaIndex');
$app->post('/mohalla', 'ControllerApp:mohallaDetail');

$app->get('/party', 'ControllerApp:party');

$app->get("/teeperPartyInfo", 'ControllerApp:teeperPartyInfo');

$app->get('/partyinfo', 'ControllerApp:partyinfo');
$app->post('/partyinfo', 'ControllerApp:savePartyinfo');

$app->post('/upload', 'ControllerApp:uploadPhotos');

$app->get('/partyedit', 'ControllerApp:partyedit');
$app->post('/partyedit', 'ControllerApp:savePartyedit');

/* * ************************************ */
/* * *************End Dashboard********** */
/* * ************************************ */

$app->run();
?>