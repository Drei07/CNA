<?php
include_once __DIR__. '/../../../database/dbconfig2.php';
require_once '../authentication/admin-class.php';


$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
 $admin_home->redirect('');
}

$stmt = $admin_home->runQuery("SELECT * FROM admin WHERE userId=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$admin_id = $row['userId'];


if(isset($_POST['btn-add'])) {

    $title                      = trim($_POST['title']);
    $start_date                 = trim($_POST['start_date']);
    $end_date                   = trim($_POST['end_date']);
    $description                = trim($_POST['description']);


    $pdoQuery = "INSERT INTO survey (admin_id, title, description, start_date, end_date) 
                    VALUES (:admin_id, :title, :description, :start_date, :end_date)";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute
    (
        array
        ( 
            ":title"            =>      $title,
            ":description"      =>      $description,
            ":start_date"       =>      $start_date,
            ":end_date"         =>      $end_date,
            ":admin_id"         =>      $admin_id


        )
      );

      $_SESSION['status_title'] = "Success!";
      $_SESSION['status'] = "Survey successfully created!";
      $_SESSION['status_code'] = "success";
      $_SESSION['status_timer'] = 40000;
      header("Location: ../add-survey");
  
}
else
{
    $_SESSION['status_title'] = "Oops!";
    $_SESSION['status'] = "Something went wrong, please try again!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_timer'] = 100000;
    header("Location: ../add-survey");

}

?>

?>