<?php
include_once '../../../database/dbconfig2.php';
require_once '../authentication/user-class.php';


$user_home = new USER();

if(!$user_home->is_logged_in())
{
 $user_home->redirect('');
}


$userId     = $_GET['userId'];
$surveyId   = $_GET['surveyId'];


if(isset($_POST['btn-answer-survey'])) {

    $answer                     = trim($_POST['answer']);
    $questionID                 = trim($_POST['questionID']);


    $pdoQuery = "INSERT INTO answer (question_id, survey_id, user_id, answer) 
                    VALUES (:question_id, :survey_id, :user_id, :answer)";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute
    (
        array
        ( 
            ":question_id"  =>      $questionID,
            ":survey_id"    =>      $surveyId,
            ":user_id"      =>      $userId,
            ":answer"       =>      $answer


        )
      );

      header("Location: ../take-survey?Id=$surveyId");
  
}
else
{
    $_SESSION['status_title'] = "Oops!";
    $_SESSION['status'] = "Something went wrong, please try again!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_timer'] = 100000;
    header("Location: ../take-survey?Id=$surveyId");

}

?>

?>