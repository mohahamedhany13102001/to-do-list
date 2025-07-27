<?php
use Request\Request;
use Session\session;

require_once'inc/connection.php';
require_once'classes/Request.php';
require_once'classes/session.php';
require_once'classes/validation/Required.php';
require_once'classes/validation/Str.php';
require_once'classes/validation/Validation.php';

$request = new request();
$session = new session();
$validation = new validation();
