<?php
include_once __DIR__. '/../../../database/dbconfig2.php';
require_once '../authentication/admin-class.php';


$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
 $admin_home->redirect('');
}


    $questionsID = $_GET["questionsID"];
    $surveyID = $_GET["surveyID"];



    $pdoQuery = "UPDATE question SET status = :status WHERE Id=:Id";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(
    array
    ( 
    ":status"      => "disabled",
    ":Id"          =>$questionsID
    )
    );

    $_SESSION['status_title'] = "Success!";
    $_SESSION['status'] = "Question has succesfully removed";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_timer'] = 40000;
    header("Location: ../view-survey?Id=$surveyID");


?>