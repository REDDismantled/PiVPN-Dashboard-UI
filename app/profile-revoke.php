<?php
//Check for valid session:
session_start();
include('app/functions.php');
if(!isset($_SESSION['username'])){
	die("You must be logged in to view this page!");
}
if(!isset($_POST['profile'])){ die("No profile name selected!"); }
$pro = $_POST['profile'];
$pro = str_replace("/home/pi/ovpns/","", $pro);
$pro = str_replace(".ovpn","", $pro);
add_vpn_profile($pro);
//Run selected script, but only if it exists in the scr_up folder.
function add_vpn_profile($profile) {
	
    // Open a handle to expect in write mode
    $p = popen('sudo /usr/bin/expect','w');
    $profile_short = $_POST['profile'];
    $profile_short = str_replace("/home/vpn/ovpns/","", $pro);
    $profile_short = str_replace(".ovpn","", $pro);

    // Log conversation for verification
    $log = './tmp/passwd_' . md5($profile . time());
    $cmd .= "log_file -a \"$log\"; ";
    
    // Spawn a shell as $user
    $cmd .= "spawn /bin/bash; ";
    // Change the unix password
    $cmd .= "send \"pivpn revoke\\r\"; ";
    $cmd .= "expect \"::: Please enter the Name of the client to be revoked from the list above: \"; ";
    $cmd .= "send \"$profile_short\\r\"; ";
    $cmd .= "expect \"Completed!\"; ";
    // Commit the command to expect & close
    fwrite($p, $cmd); pclose ($p);

    // Read & delete the log
    $fp = fopen($log,r);
    $output = fread($fp, 2048);
    fclose($fp); unlink($log);
	print "Notification : $output ";
    $output = explode("\n",$output);


    return $output;
}

?>
