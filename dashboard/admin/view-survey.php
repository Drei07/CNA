<?php
include_once '../../database/dbconfig2.php';
require_once 'authentication/admin-class.php';
include_once '../superadmin/controller/select-settings-configuration-controller.php';



$admin_home = new ADMIN();

if (!$admin_home->is_logged_in()) {
    $admin_home->redirect('../../public/admin/signin');
}

$stmt = $admin_home->runQuery("SELECT * FROM admin WHERE userId=:uid");
$stmt->execute(array(":uid" => $_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$UId = $row['userId'];

$pdoQuery = "SELECT * FROM admin WHERE userId=$UId";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute();
$admin_profile = $pdoResult->fetch(PDO::FETCH_ASSOC);


$name = $row['adminLast_Name'] . ', ' . $row['adminFirst_Name'];
$profile_admin = $row['adminProfile'];

// SURVEY INFORMATION

$surveyID = $_GET['Id'];

$pdoQuery = "SELECT * FROM survey WHERE Id=$surveyID";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute();
$survey_data = $pdoResult->fetch(PDO::FETCH_ASSOC);

$title = $survey_data['title'];
$description = $survey_data['description'];
$start_date = $survey_data['start_date'];
$end_date = $survey_data['end_date'];

$status = $survey_data['status'];


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../src/img/<?php echo $favicon ?>">
    <link rel="stylesheet" href="../../src/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../src/node_modules/boxicons/css/boxicons.min.css">
    <link href="../../src/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../../src/css/sb-admin-2.min.css?v=<?php echo time(); ?>" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <title>View Survey</title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home  ">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="../../src/img/favicon_white.png" alt="logo" width="50px">
                </div>
                <div class="sidebar-brand-text mx-3">DHVSU CNA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home  ">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Survey</span>
                </a>
                <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="survey-data">List</a>
                        <a class="collapse-item" href="add-survey">Add Survey</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="archive">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Archive</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="profile">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../../src/img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../../src/img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../../src/img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name ?></span>
                                <img class="img-profile rounded-circle" src="../../src/img/<?php echo $profile_admin ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="title">Survey Data</h1>
                    <ul class="breadcrumbs">
                        <p><a href="home">Home</a></p>
                        <p class="divider">|</p>
                        <p><a href="survey-data">Survey List</a></p>
                        <p class="divider">|</p>
                        <p><a href="" class="active">Survey Data</a></p>
                    </ul>
                    <button onclick="location.href='add-questions?Id=<?php echo $surveyID ?>'" class="primary" name="btn-add" id="btn-add"><i class="fas fa-fw fa-plus"></i> Add Questions</button> <br><br>
                    <button onclick="location.href='survey-summary?Id=<?php echo $surveyID ?>'" class="primary" name="btn-add" id="btn-add"><i class="fas fa-fw fa-book"></i> Survey Summary</button>


                    <section class="data-form">
                        <div class="header"></div>
                        <div class="registration">
                            <div class="survey-data">
                                <div class="survey-details">
                                    <h1><?php echo $title ?></h1>
                                    <p><?php echo $description ?></p>
                                    <p>Start Date : <?php echo date("M d, Y", strtotime($start_date)) ?></p>
                                    <p>End Date : <?php echo date("M d, Y", strtotime($end_date)) ?></p><br>

                                    <?php

                                    if ($status == "active") {
                                    ?>
                                        <button type="button" class="active"><a href="controller/disabled-survey-controller?Id=<?php echo $surveyID ?>" class="Active"><i class="fas fa-eye"></i> Visible</a></button>
                                    <?php

                                    } else if ($status == "disabled") {
                                    ?>
                                        <button type="button" class="disabled"><a href="controller/active-survey-controller?Id=<?php echo $surveyID ?>" class="Disabled"><i class="fas fa-eye-slash"></i> Not Visible</a></button>
                                    <?php
                                    }

                                    ?>

                                </div>
                                <div class="respondent">
                                    <a class="nav-link" href="#">
                                        <i class="fas fa-fw fa-user"></i>
                                        <?php
                                        $pdoQuery = "SELECT DISTINCT user_id FROM answer WHERE survey_id = :survey_id";
                                        $pdoResult2 = $pdoConnect->prepare($pdoQuery);
                                        $pdoResult2->execute(array("survey_id" => $surveyID));

                                        $user_count = $pdoResult2->rowCount();

                                        if ($user_count <= 9) {
                                        ?>
                                            <span>0<?php echo $user_count ?></span></a>
                                <?php

                                        } else if ($user_count >= 10) {
                                ?>
                                    <span><?php echo $user_count ?></span></a>
                                <?php
                                        }
                                ?>
                                </div>
                            </div>
                        </div>
                    </section> <br>

                    <?php

                    $pdoQuery = "SELECT * FROM question WHERE survey_id = :survey_id AND status = :status";
                    $pdoResult = $pdoConnect->prepare($pdoQuery);
                    $pdoExec = $pdoResult->execute(array(":survey_id" => $surveyID, ":status" => "active"));


                    while ($questions = $pdoResult->fetch(PDO::FETCH_ASSOC)) {
                        $questionsID = $questions['Id'];

                        if ($questions == NULL) {
                    ?>

                            <div class="no-data">
                                <h3>NO QUESTIONS AVAILABLE</h3>
                            </div>

                        <?php

                        } else {
                        ?>

                            <section class="data-form">
                                <div class="questions">
                                    <div class="survey-data2">
                                        <div class="survey-details">
                                            <div class="dropdown no-arrow">
                                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-fw fa-ellipsis-v"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="edit-survey-questions?questionsID=<?php echo $questionsID ?>&surveyID=<?php echo $surveyID ?>">Edit</a></li>
                                                    <li><a class="dropdown-item delete-questions" href="controller/delete-survey-questions?questionsID=<?php echo $questionsID ?>&surveyID=<?php echo $surveyID ?>">Delete</a></li>
                                                </ul>
                                            </div>
                                            <h5><?php echo $questions['questions'] ?></h5>

                                        </div>
                                        <div class="graph">
                                            <canvas id="<?php echo $questions['Id']; ?>" style="width:100%;height:300px;"></canvas>
                                        </div>
                                        <!-- PHP -->
                                        <?php
                                        // TOTAL USER ANSWER THE QUESTIONS
                                        $pdoQuery = "SELECT DISTINCT user_id FROM answer WHERE survey_id = :survey_id AND question_id = :question_id";
                                        $pdoResult3 = $pdoConnect->prepare($pdoQuery);
                                        $pdoResult3->execute(array("survey_id" => $surveyID, ":question_id" => $questionsID));

                                        $answer = $pdoResult3->rowCount();

                                        if ($answer <= 9) {
                                            $total_answer = "0$answer";
                                        } elseif ($answer >= 10) {
                                            $total_answer = $answer;
                                        }

                                        // STRONGLY AGREE
                                        $pdoQuery = "SELECT answer FROM answer WHERE survey_id = :survey_id AND question_id = :question_id AND answer = :answer";
                                        $pdoResult4 = $pdoConnect->prepare($pdoQuery);
                                        $pdoResult4->execute(array("survey_id" => $surveyID, ":question_id" => $questionsID, ":answer" => 1));
                                        $strongly_agree = $pdoResult4->rowCount();

                                        // AGREE
                                        $pdoQuery = "SELECT answer FROM answer WHERE survey_id = :survey_id AND question_id = :question_id AND answer = :answer";
                                        $pdoResult5 = $pdoConnect->prepare($pdoQuery);
                                        $pdoResult5->execute(array("survey_id" => $surveyID, ":question_id" => $questionsID, ":answer" => 2));
                                        $agree = $pdoResult5->rowCount();

                                        // SLIGHTLY AGREE
                                        $pdoQuery = "SELECT answer FROM answer WHERE survey_id = :survey_id AND question_id = :question_id AND answer = :answer";
                                        $pdoResult6 = $pdoConnect->prepare($pdoQuery);
                                        $pdoResult6->execute(array("survey_id" => $surveyID, ":question_id" => $questionsID, ":answer" => 3));
                                        $slightly_agree = $pdoResult6->rowCount();

                                        // NOR 
                                        $pdoQuery = "SELECT answer FROM answer WHERE survey_id = :survey_id AND question_id = :question_id AND answer = :answer";
                                        $pdoResult7 = $pdoConnect->prepare($pdoQuery);
                                        $pdoResult7->execute(array("survey_id" => $surveyID, ":question_id" => $questionsID, ":answer" => 4));
                                        $nor = $pdoResult7->rowCount();

                                        // SLIGHTLY DISAGREE
                                        $pdoQuery = "SELECT answer FROM answer WHERE survey_id = :survey_id AND question_id = :question_id AND answer = :answer";
                                        $pdoResult8 = $pdoConnect->prepare($pdoQuery);
                                        $pdoResult8->execute(array("survey_id" => $surveyID, ":question_id" => $questionsID, ":answer" => 5));
                                        $slightly_disagree = $pdoResult8->rowCount();

                                        // DISAGREE
                                        $pdoQuery = "SELECT answer FROM answer WHERE survey_id = :survey_id AND question_id = :question_id AND answer = :answer";
                                        $pdoResult9 = $pdoConnect->prepare($pdoQuery);
                                        $pdoResult9->execute(array("survey_id" => $surveyID, ":question_id" => $questionsID, ":answer" => 6));
                                        $disagree = $pdoResult9->rowCount();

                                        // STRONGLY DISAGREE
                                        $pdoQuery = "SELECT answer FROM answer WHERE survey_id = :survey_id AND question_id = :question_id AND answer = :answer";
                                        $pdoResult10 = $pdoConnect->prepare($pdoQuery);
                                        $pdoResult10->execute(array("survey_id" => $surveyID, ":question_id" => $questionsID, ":answer" => 7));
                                        $slightly_disagree = $pdoResult10->rowCount();


                                        ?>
                                        <script>
                                            var xValues = ["Stongly Agree", "Agree", "Slightly Agree", "Neither Agree nor Disagree", "Slightly Disagree", "Disagree", "Strongly Disagree"];
                                            var yValues = [<?php echo $strongly_agree ?>, <?php echo $agree ?>, <?php echo $slightly_agree ?>, <?php echo $nor ?>, <?php echo $slightly_disagree ?>, <?php echo $disagree ?>, <?php echo $strongly_disagree ?>];
                                            var barColors = ['#0080ff', '#00bfff', '#00ffbf', '#00ff80', '#ffff00', '#ffbf00', '#ff4000'];

                                            new Chart("<?php echo $questions['Id']; ?>", {
                                                type: "bar",
                                                data: {
                                                    labels: xValues,
                                                    datasets: [{
                                                        backgroundColor: barColors,
                                                        data: yValues
                                                    }]
                                                },
                                                options: {
                                                    legend: {
                                                        display: false
                                                    },
                                                    title: {
                                                        display: true,
                                                        text: "<?php echo $total_answer ?> Responses"
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </section> <br>
                    <?php
                        }
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="authentication/admin-signout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../src/vendor/jquery/jquery.min.js"></script>
    <script src="../../src/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../src/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->

    <!-- Page level custom scripts -->

    <script src="../../src/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../src/node_modules/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        // Form
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })();

        //Delete Questions

        $('.delete-questions').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            swal({
                    title: "Delete?",
                    text: "Do you want to delete?",
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.location.href = href;
                    }
                });
        })

        // VIEW

        $('.Active').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            swal({
                    title: "Disabled?",
                    text: "Do you want to disabled this survey?",
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.location.href = href;
                    }
                });
        })

        // DELETE

        $('.Disabled').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            swal({
                    title: "Visible?",
                    text: "Do you want to visible this survey?",
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.location.href = href;
                    }
                });
        })
    </script>

    <!-- SWEET ALERT -->
    <?php

    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status_title']; ?>",
                text: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: false,
                timer: <?php echo $_SESSION['status_timer']; ?>,
            });
        </script>
    <?php
        unset($_SESSION['status']);
    }
    ?>
</body>

</html>