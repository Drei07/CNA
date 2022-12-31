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

if(isset($_POST['btn-edit-questions'])){

    $questions                = trim($_POST['questions']);

    $pdoQuery = 'UPDATE question SET questions=:questions WHERE Id= :Id';
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(
    array
    ( 

        ":questions"      =>      $questions,
        ":Id"             =>      $questionsID

    )
    );

    $_SESSION['status_title'] = "Success!";
    $_SESSION['status'] = "Question succesfully updated";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_timer'] = 40000;
    header("Location: ../view-survey?Id=$surveyID");

}
else{

    $_SESSION['status_title'] = "Oops!";
    $_SESSION['status'] = "Something went wrong, please try again!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_timer'] = 100000;
    header("Location: ../view-survey?Id=$surveyID");
    
    
}

?>