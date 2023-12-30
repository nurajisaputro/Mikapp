<?php
require('conn.php');

// $cpu = $API->comm('/system/resource/print');
// $json = json_encode($cpu);
// $cpu = json_decode($json, true);

// foreach ($cpu as $data) {
//   echo $data['cpu-load'] . '<br>';
//   echo $data['uptime'] . '<br>';
//   echo $data['board-name'] . '<br>';
//   echo $data['platform'] . '<br>';
// }
// var_dump($cpu)


// $test = $API->comm('/log/print');


// foreach ($test as $data) {
//   echo $data['message'] . '<br>';
//   echo $data['time'] . '<br>';
//   echo $data['topics'] . '<br>';
//   echo $data['pppoe'] . '<br>';
// }

// var_dump($test)



// $log = $API->comm('/log/print',array(
//   "=follow=where?topics~"=>".ppp"
// ));

$message = "ppp";
$API->write("/log/print",false);  
$API->write('?=massage?'.$message,true);

$ARRAY = $API->read();
// $READ = $API->read(false);
// $ARRAY = $API->parseResponse($READ);

var_dump($ARRAY);
$API->disconnect();
?>
