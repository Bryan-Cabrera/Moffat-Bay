<?php
//Prevents direct access
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die("ACCESS DENIED");
}

//Log file location
$logFile = 'logs/visits.log';

//To make sure log directory exists
if (!is_dir('logs')) {
    mkdir('logs', 0755, true);
}

//Visitor info
$visitorIP = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN';
$timestamp = date("Y-m-d H:i:s");

//Log entry format
$logEntry = "[$timestamp] IP: $visitorIP - User Agent: $userAgent" . PHP_EOL;

//Writes to the log file
file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
?>