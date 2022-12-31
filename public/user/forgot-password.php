<?php
include_once '../../dashboard/user/authentication/user-forgot-password.php';
include_once '../../dashboard/superadmin/controller/select-settings-configuration-controller.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="../../src/img/<?php echo $favicon ?>">

    <title>CNA | Forgot Password?</title>

    <link href="../../src/css/signin.css?v=<?php echo time(); ?>" rel="stylesheet">


</head>

<body>
    <div class="session">
        <div class="left">
            <svg enable-background="new 0 0 300 302.5" version="1.1" viewBox="0 0 300 302.5" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                <style type="text/css">
                    .st0 {
                        fill: #fff;
                    }
                </style>
                <path class="st0" d="m126 302.2c-2.3 0.7-5.7 0.2-7.7-1.2l-105-71.6c-2-1.3-3.7-4.4-3.9-6.7l-9.4-126.7c-0.2-2.4 1.1-5.6 2.8-7.2l93.2-86.4c1.7-1.6 5.1-2.6 7.4-2.3l125.6 18.9c2.3 0.4 5.2 2.3 6.4 4.4l63.5 110.1c1.2 2 1.4 5.5 0.6 7.7l-46.4 118.3c-0.9 2.2-3.4 4.6-5.7 5.3l-121.4 37.4zm63.4-102.7c2.3-0.7 4.8-3.1 5.7-5.3l19.9-50.8c0.9-2.2 0.6-5.7-0.6-7.7l-27.3-47.3c-1.2-2-4.1-4-6.4-4.4l-53.9-8c-2.3-0.4-5.7 0.7-7.4 2.3l-40 37.1c-1.7 1.6-3 4.9-2.8 7.2l4.1 54.4c0.2 2.4 1.9 5.4 3.9 6.7l45.1 30.8c2 1.3 5.4 1.9 7.7 1.2l52-16.2z" />
            </svg>
        </div>
        <form action="../../dashboard/user/authentication/user-forgot-password.php" method="POST" class="log-in" autocomplete="off">
            <a href="../../"><img src="../../src/img/<?php echo $logo ?>" width="120px" alt=""></a><br><br>
            <p>Forgot Password? Enter the email you used and we will send you an e-mail with a link to reset your password.</p>
            <div class="floating-label">
                <input placeholder="Email" type="email" name="email" id="email" autocomplete="off" required>
                <label for="email">Email:</label>
            </div>
            <button type="submit" name="btn-forgot-password">Send</button>
            <a href="../../" class="discrete" >Back to sign in</a>
        </form>
    </div>

    <script src="../../src/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../src/node_modules/jquery/dist/jquery.min.js"></script>


    <script>
        // CAPTCHA
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo $SiteKEY ?>', {
                action: 'submit'
            }).then(function(token) {
                document.getElementById("g-token").value = token;
            });
        });
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