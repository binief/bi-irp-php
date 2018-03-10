<?php
include_once ("../configs/autoloader.php");
include_once ("../configs/handlers.php");

session_start();

$action = $_POST["action"];
 
$userServices = new userservices;

switch ($action)
{
    case 'login':
        $myJSON = $userServices->autheticate('dasd', 'dsad');
        echo json_encode($myJSON);
    break;

    case 'checkAccess':
        $myJSON = $userServices->checkAccess();
        echo json_encode($myJSON);
    break;

    case 'label3':
    break;

    default:
};

?>
