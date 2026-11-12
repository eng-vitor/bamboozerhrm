<?php
session_start();
require __DIR__.'\..\..\env.php';
include __DIR__.'\server_status.php';

if(isset($_SESSION['DataAccount']['id'])){
    $_SESSION['Msg'] = '<div class="alert alert-warning" role="alert"><i class="fa-solid fa-triangle-exclamation fa-beat"></i> Você já está logado!</div>';
    header("Location: ..\pages\system.php");
    exit();
}

$UserData = filter_var($_POST['loginuser'], FILTER_SANITIZE_EMAIL);
$PassData = md5(filter_var($_POST['loginpass'], FILTER_SANITIZE_STRING));

$QueryEmailExists = "SELECT email FROM accounts WHERE email='$UserData'";
$QueryEmailExistsExec = mysqli_query($CONNECTION_DB, $QueryEmailExists);
$QueryEmailExistsResult = mysqli_num_rows($QueryEmailExistsExec);

if($QueryEmailExistsResult){
	$QueryAccountData = "SELECT id,email,fullname,roleid,registernumber,idcard,initdate FROM accounts WHERE email='$UserData' AND pass='$PassData'";
	$QueryAccountDataExec = mysqli_query($CONNECTION_DB, $QueryAccountData);
	$QueryAccountDataResult = mysqli_num_rows($QueryAccountDataExec);

	if ($QueryAccountDataResult){
		$_SESSION['DataAccount'] = $QueryAccountDataExec->fetch_assoc();
		/* AccountUpdate */
		$QueryUpdateLastView = "UPDATE accounts SET lastaccess='".date('Y-m-d H:i:s')."' WHERE email='$UserData'";
		mysqli_query($CONNECTION_DB, $QueryUpdateLastView);
		/* AccountUpdate */
	    if($_SESSION['DataAccount']['roleid']==0){		
				header("Location: ..\..\app\pages\dashboard.php");
				exit();
			}else{
				header("Location: ..\..\app\pages\system.php");
				exit();
			}
	}else{
		$_SESSION['Msg'] = '<div class="alert alert-danger" role="alert" style="width: 100%"><i class="fa-solid fa-xmark fa-beat"></i> A senha informada está incorreta!</div>';
		header("Location: ..\..\index.php");
		exit();
	}
}
else{
	$_SESSION['Msg'] = '<div class="alert alert-warning" role="alert" style="width: 100%"><i class="fa-solid fa-exclamation fa-beat"></i> O email informado não está no banco de dados do servidor!</div>';
	header("Location: ..\..\index.php");
	exit();
}

mysqli_close($CONNECTION_DB);