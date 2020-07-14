<?php
//Basic Dbug
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['username'])){
	die("You must be logged in to view this page!");
}
if(isset($_POST['page'])){
	switch($_POST['page']){
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
	include('app/openvpn.php');
}
function blocked()
{
	include('app/block.php');
}
function logs()
{
	include('app/logs.php');
}
?>
