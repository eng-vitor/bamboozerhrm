<?php
session_start();
include __DIR__.'\server_status.php';
session_destroy();
header('Location: ..\..\index.php');
exit();