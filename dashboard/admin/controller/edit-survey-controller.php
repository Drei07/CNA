<?php
include_once __DIR__. '/../../../database/dbconfig2.php';
require_once '../authentication/admin-class.php';


$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
 $admin_home->redirect('');
}

$surveyID            = $_GET["Id"];

if(isset($_POST['btn-edit-survey'])){

    $title                      = trim($_POST['title']);
    $start_date                 = trim($_POST['start_date']);
    $end_date                   = trim($_POST['end_date']);
    $description                = trim($_POST['description']);

    $pdoQuery = 'UPDATE survey SET title=:title, description=:description, start_date=:start_date, end_date=:end_date WHERE Id= :Id';
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(
    array
    ( 

        ":title"            =>      $title,
        ":description"      =>      $description,
        ":start_date"       =>      $start_date,
        ":end_date"         =>      $end_date,
        ":Id"               =>      $surveyID

    )
    );

    $_SESSION['status_title'] = "Success!";
    $_SESSION['status'] = "Survey succesfully updated";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_timer'] = 40000;
    header('Location: ../survey-data');

}
else{

    $_SESSION['status_title'] = "Oops!";
    $_SESSION['status'] = "Something went wrong, please try again!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_timer'] = 100000;
    header('Location: ../survey-data');
    
    
}

?>