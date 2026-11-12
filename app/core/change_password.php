<?php
session_start();
require __DIR__.'\..\..\env.php';
include __DIR__.'\server_status.php';

$EmailResetData = filter_var($_POST['emailresetpass'], FILTER_SANITIZE_EMAIL);
$RegNumberResetData = filter_var($_POST['regnumberresetpass'], FILTER_SANITIZE_NUMBER_INT);
$IdCardResetData = filter_var($_POST['idcardresetpass'], FILTER_SANITIZE_NUMBER_INT);
$NewPasswordResetData = filter_var($_POST['newpasswordresetpass'], FILTER_SANITIZE_STRING);

$QueryEmailExists = "SELECT email FROM accounts WHERE email='$EmailResetData'";
$QueryEmailExistsExec = mysqli_query($CONNECTION_DB, $QueryEmailExists);
$QueryEmailExistsResult = mysqli_num_rows($QueryEmailExistsExec);

if($QueryEmailExistsResult){

	$RegNumberExists = "SELECT registernumber FROM accounts WHERE registernumber='$RegNumberResetData' AND email='$EmailResetData'";
	$RegNumberExistsExec = mysqli_query($CONNECTION_DB, $RegNumberExists);
	$RegNumberExistsResult = mysqli_num_rows($RegNumberExistsExec);

	if($RegNumberExistsResult){

		$IdCardExists = "SELECT idcard FROM accounts WHERE idcard='$IdCardResetData' AND email='$EmailResetData'";
		$IdCardExistsExec = mysqli_query($CONNECTION_DB, $IdCardExists);
		$IdCardExistsResult = mysqli_num_rows($IdCardExistsExec);

		if($IdCardExistsResult){
			
			if(strlen($NewPasswordResetData)>=8 and strlen($NewPasswordResetData)<=100 and strpbrk($NewPasswordResetData,'!@#$%¨&*()')){
				$UpdatePassword = "UPDATE accounts SET pass=md5('$NewPasswordResetData') WHERE email='$EmailResetData'";
				$UpdatePasswordExec = mysqli_query($CONNECTION_DB, $UpdatePassword);

				if($UpdatePasswordExec){
					$_SESSION['Msg'] = '<div class="alert-simple alert-success" role="alert" style="width: 100%"><i class="fa-solid fa-circle-check fa-beat"></i> Senha redefinida com sucesso!</div>';
					header('Location: ..\pages\forgot_password.php');
					exit();
				}
				else{
					$_SESSION['Msg'] = '<div class="alert-simple alert-danger" role="alert" style="width: 100%"><i class="fa-solid fa-exclamation fa-beat"></i> Erro ao redefinir a senha!</div>';
					header('Location: ..\pages\forgot_password.php');
					exit();
				}
			}
			else{
				$_SESSION['Msg'] = '<div class="alert-simple alert-warning" role="alert" style="width: 100%"><i class="fa-solid fa-exclamation fa-beat"></i> A senha deve conter no mínimo 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.</div>';
				header('Location: ..\pages\forgot_password.php');
				exit();
			}
		}
		else{
			$_SESSION['Msg'] = '<div class="alert-simple alert-warning" role="alert" style="width: 100%"><i class="fa-solid fa-exclamation fa-beat"></i> O CPF ou RG informado não está no banco de dados!</div>';
			header('Location: ..\pages\forgot_password.php');
			exit();
		}
	}
	else{
		$_SESSION['Msg'] = '<div class="alert-simple alert-warning" role="alert" style="width: 100%"><i class="fa-solid fa-exclamation fa-beat"></i> A matrícula informada não está no banco de dados!</div>';
		header('Location: ..\pages\forgot_password.php');
		exit();
	}
}
else{
	$_SESSION['Msg'] = '<div class="alert-simple alert-warning" role="alert" style="width: 100%"><i class="fa-solid fa-exclamation fa-beat"></i> O email informado não está no banco de dados do servidor!</div>';
	header('Location: ..\pages\forgot_password.php');
	exit();
}

mysqli_close($CONNECTION_DB);