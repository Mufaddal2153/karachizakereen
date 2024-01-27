<?php

$count = $pages = 0;

/* * ****************************** */
/* * *****Start Login Page********* */
/* * ****************************** */
$app->get('/', 'ControllerUser:loginForm');
$app->get('/login', 'ControllerUser:loginForm');
$app->get('/logout', 'ControllerUser:logout');

$app->post('/', 'ControllerUser:login');
$app->post('/login', 'ControllerUser:login');

$app->get('/adminindex', $authenticate($app), 'ControllerUser:adminIndex');

$app->get('/zakereen', $authenticate($app), 'ControllerUser:scheduleIndex');
$app->post('/zakereen', 'ControllerUser:addSchedule');

$app->post('/schedule', 'ControllerUser:getDetails');
$app->post('/schedule_delete','ControllerUser:deleteSchedule');

$app->get('/event', $authenticate($app), 'ControllerEvent:getEvent');
$app->post('/event', 'ControllerEvent:saveEvent');
$app->get('/eventschedule(/:id)', $authenticate($app), 'ControllerEvent:eventSchedule');
$app->post('/eventtime','ControllerEvent:eventTime');
$app->post('/eventsettime','ControllerEvent:setEventTime');
$app->post('/eventdelete', 'ControllerEvent:deleteEvent');
$app->post('/eventupdate', 'ControllerEvent:updateEvent');
$app->post('/clear_log', 'ControllerUser:clearLog');
$app->post('/clear_schedule', 'ControllerUser:clearSchedule');
$app->post('/schedule_csv', 'ControllerUser:addCsv');

?>