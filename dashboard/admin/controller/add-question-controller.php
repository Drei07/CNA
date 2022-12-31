<?php
include_once __DIR__. '/../../../database/dbconfig2.php';
require_once '../authentication/admin-class.php';


$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
 $admin_home->redirect('');
}


$surveyID = $_GET['Id'];



if(isset($_POST['btn-add'])) {

    $questions                = trim($_POST['questions']);


    $pdoQuery = "INSERT INTO question (survey_id,  questions) 
                    VALUES (:survey_id, :questions)";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute
    (
        array
        ( 

            ":questions"      =>      $questions,
            ":survey_id"      =>      $surveyID



        )
      );

      $_SESSION['status_title'] = "Success!";
      $_SESSION['status'] = "Survey successfully created!";
      $_SESSION['status_code'] = "success";
      $_SESSION['status_timer'] = 40000;
      header("Location: ../view-survey?Id=$surveyID");
  
}
else
{
    $_SESSION['status_title'] = "Oops!";
    $_SESSION['status'] = "Something went wrong, please try again!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_timer'] = 100000;
    header("Location: ../view-survey?Id=$surveyID");

}

?>

?>