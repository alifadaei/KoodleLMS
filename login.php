<?
session_start();
require_once 'application/utils.php';
if (is_authenticated()) {
    redirect_panel();
}

//security check
define('APPLICATION_START', true);

//define variables
$id = '';
$password = '';
//post process
if (isset($_POST['btn-login']) && isset($_POST['idNumber']) && isset($_POST['password'])) {
    require_once 'application/process-login.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koodle Login</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&family=Quicksand:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<? require_once 'partials/header.php' ?>

<body>

    <style>
        /* GLOBAL STYLES */
        #header>div>a {
            justify-content: center;
        }



        #header {
            justify-content: center !important;
        }

        #header>div.d-flex.align-items-center.justify-content-between>a>img {
            margin: 0;
            margin-right: 28px;
        }


        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        footer {
            font-family: 'Quicksand', sans-serif;
        }

        .body-back {
            background-image: url("img/back1.jpg");
            background-position: right;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        p {
            font-family: 'Open Sans', sans-serif;
        }


        /* GLOBAL STYLES */


        /* navbar */

        .navbar {
            background-color: var(--blue);
        }


        /* ./ navbar */

        .hidden {
            display: none;
        }

        .divider {
            font-weight: bolder;
            font-size: 20px;
            color: var(--blue);
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 0.7px;
            background: var(--complementary);
        }


        /* footer */

        .text-small {
            font-size: 0.6rem;
        }

        a {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        a:hover,
        a:focus {
            text-decoration: none;
        }


        .btn-primary {
            background-color: var(--blue);
            border-color: var(--blue);
        }

        .btn-primary:hover {
            background-color: var(--bluer);
            border-color: var(--bluer);
        }

        .btn-dark {
            background-color: var(--green);
            border-color: var(--green);
        }

        .btn-dark:hover {
            background-color: var(--greener);
            border-color: var(--greener);
        }

        .form-check-input:checked {
            background-color: var(--blue);
            border-color: var(--blue);
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem var(--shadow-blue);
            border-color: var(--blue);
        }

        .form-select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 0.25rem var(--shadow-blue);
        }

        body>div>div.row.row.row {
            margin-top: 80px !important;
        }

        header i.bi,
        header nav,
        .search-bar {
            display: none;
        }

        @media (min-width: 1200px) {
            #footer {
                margin-left: 0;
            }
        }

        body>div>div>div.col-10 {
            background-color: white !important;
        }
    </style>



    <!-- ./Login -->
    <div class="py-3 container">
        <div class="row justify-content-center align-items-center my-sm-5 ">
            <div class="col-10 col-sm-7 col-md-6 col-lg-4 bg-light p-3 p-md-4 rounded-2 shadow">
                <!-- errors -->
                <?php if (isset($error) && isset($msgs) && $error == true) : ?>
                    <div class="alert alert-danger" role="alert" style="font-size: 15px;">
                        <?php foreach ($msgs as $msg) {
                            echo "<p>$msg</p>";
                        } ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($success) && isset($msgs) && $success == true) {
                    foreach ($msgs as $msg) {
                        echo "<p>$msg</p>";
                    }
                } ?>
                <div id="page-title" class="divider d-flex align-items-center my-4 ">
                    <p class="text-center mx-3 mb-0 ">Login</p>
                </div>

                <!-- LOGIN FORM -->
                <form autocomplete="on" id="login-form" class="<?php if (isset($_POST['btn-register'])) echo "hidden"; ?>" method="POST" action="">
                    <!-- id input -->
                    <div class="mb-3">
                        <label for="idNumber" class="form-label">ID number</label>
                        <input value="<?php echo $id ?>" type="number" class="form-control" id="idNumber" name="idNumber" aria-describedby="idHelp">
                        <div id="idHelp" class="form-text">Enter a valid ID</div>
                    </div>

                    <!-- password input -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input value="<?php echo $password ?>" type="password" class="form-control" id="password" name="password" aria-describedby="passHelp">
                        <div id="passHelp" class="form-text">Enter your password</div>
                    </div>

                    <!-- btns -->
                    <div class="text-center  mt-1 pt-2 ">
                        <button name="btn-login" type="submit" class="btn btn-primary w-100">Login
                        </button>
                    </div>
                </form>
                <!-- LOGIN FORM -->


            </div>
        </div>
    </div>



    <?php require_once("./partials/footer.php"); ?>
    <script>
        $(document).ready(function() {


        })
    </script>
</body>

</html>