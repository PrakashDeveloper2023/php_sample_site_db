<?php 
session_start();
require_once("Master.php");
$master = new Master();
$action = isset($_GET['action']) ? $_GET['action'] : "";
switch($action){
    case 'save_content':
        echo $master->save_content();
        break;
    case 'delete_content':
        echo $master->delete_content();
        break;
    case 'get_content':
        echo $master->get_content();
        break;
    default:
        echo json_encode(['status' => "error", "error" => "Invalid Ajax Request."]);
        break;
}
?>