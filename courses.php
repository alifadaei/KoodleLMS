<?
include_once './authorization.php';
include_once './application/utils.php';;

include_once './partials/head.php';
?>

<body>

  <? require_once './partials/header.php'; ?>

  <? require_once './partials/sidebar.php'; ?>
  <? require_once './partials/scripts.php'; ?>

  <style>
    .dataTable-input {
      display: none;
    }
  </style>
  <script>
    //global scripts
  </script>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Courses</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="cp.php">Home</a></li>
          <li class="breadcrumb-item active">Courses</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">

        <? require_once 'log_inf.php';
        $prof_id = $_SESSION['user']['id'];
        $SQL = "SELECT * from courses where prof_no=$prof_id;";
        $result = mysqli_query($conn, $SQL);
        $index = 1;
        while ($row = $result->fetch_array()) :
          $course_name = $row['course_name'];
          $course_id = $row['course_id'];
        ?>
          <a class="col-md-6" href="<? echo 'course.php' . "?id=$course_id" ?>">
            <div class="card color<? echo '-' . $index++ ?>">
              <div class="card-body text-center">
                <h5 class="card-title font-farsi"><? echo $course_name ?></h5>
              </div>
            </div>
          </a>

        <? endwhile ?>


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <? require_once 'partials/footer.php'; ?>
  <!-- End Footer -->

</body>

</html>