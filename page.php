<?php
//Basic Dbug
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ini_set('max_execution_time',300);

define("UI", true);
define("BASEURI", dirname($_SERVER['SCRIPT_NAME'])."/");

require_once('app/functions.php');
if (!isset($_SESSION)) {
    session_start();
};
if(!isset($_SESSION['username'])){
	die("You must be logged in to view this page!");
}
if (isset($_POST['page'])) {
//		Event::handle('PageLoad',array($_SESSION,&$_POST));
        switch ($_POST['page']) {
        case "logs":
        	logs();
        	break;
        case "PiVPN":
        	openvpn();
        	break;
        case "block":
        	blocked();
        	break;
	default:
		echo "404 - Page not found!";
		break;
		
	}
}

//Simple page functions..
function openvpn(){
	include('pages/openvpn.php');
}
function blocked()
{
	include('pages/block.php');
}
function logs()
{
	include('pages/logs.php');
}
?>
