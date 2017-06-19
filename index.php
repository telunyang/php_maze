<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Taipei');

require_once './controllers/WebController.php';
$ctrl = new WebController();
$ctrl->index();
unset($ctrl);
?>