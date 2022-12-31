<?php
include_once __DIR__. '/../../../database/dbconfig2.php';
require_once '../authentication/admin-class.php';


$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
 $admin_home->redirect('');
}


    $surveyID = $_GET["Id"];


    $pdoQuery = "UPDATE survey SET status = :status WHERE Id=:Id";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(
    array
    ( 
    ":status"      => "disabled",
    ":Id"          =>$surveyID
    )
    );

    $_SESSION['status_title'] = "Success!";
    $_SESSION['status'] = "Survey has been disabled";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_timer'] = 40000;
    header("Location: ../view-survey?Id=$surveyID");


?>