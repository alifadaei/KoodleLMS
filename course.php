<?
include_once './authorization.php';
include_once './application/utils.php';;

include_once './partials/head.php';
?>

<body>

  <? require_once './partials/header.php'; ?>

  <? require_once './partials/sidebar.php'; ?>
  <? require_once './partials/scripts.php'; ?>


  <? require_once 'log_inf.php';
  //course info
  $course_id = $_GET['id'];
  $SQL = "SELECT * from courses where course_id=$course_id";
  $result_course = mysqli_query($conn, $SQL);
  $row = $result_course->fetch_array();
  $course_name = $row['course_name'];

  //students
  $SQL = "SELECT * from students where student_no in (SELECT student_id from takes where course_id=$course_id)";
  $result_students = mysqli_query($conn, $SQL);


  ?>
  <style>
    .dataTable-input {
      display: none;
    }
  </style>
  <script>
    $(document).ready(() => {
      hideSpinners();
      $("#deadline").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true
      });
    })
  </script>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Course <? echo $course_name ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="cp.php">Home</a></li>
          <li class="breadcrumb-item">Courses</li>
          <li class="breadcrumb-item active">Course</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">


        <div class="col-md-8">
          <div class="card ">
            <div class="card-body mt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#students-overview">Students</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#exercises-overview">Exercises</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#exams-overview">Exams</button>
                </li>


              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active students-overview" id="students-overview">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">student id</th>
                        <th scope="col">student name</th>
                        <th scope="col">Grade</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                      $index = 1;
                      while ($row = $result_students->fetch_array()) : ?>
                        <tr>
                          <th scope="row"><? echo $index++ ?></th>
                          <td><? echo $row['student_no'] ?></td>
                          <td><? echo $row['name'] ?></td>
                          <td><? echo random_int(10, 20) ?></td>
                        </tr>
                      <? endwhile ?>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane fade exercises-overview pt-3" id="exercises-overview">
                  <button class="btn btn-primary">New Exercise</button>
                  <form action=""></form>
                  <table class="table">
                    <? include_once 'get-exercises.php' ?>
                  </table>
                </div>
              </div><!-- End Bordered Tabs -->

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body mt-3">
              <form id="form-exercise">
                <div id="form-name">
                  New Exercise
                </div>
                <div class="mb-3">
                  <label class="form-label" for="">Exercise name</label>
                  <input class="form-control" type="text" class="form-control" placeholder="Assignment 1" id="exercise_name">
                </div>
                <div class="mb-3">
                  <label class="form-label" for="deadline">Deadline</label>
                  <input class="form-control" type="text" class="form-control" placeholder="2022/04/03" id="deadline">
                </div>

                <button class="btn btn-primary" type="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <? require_once 'partials/footer.php'; ?>
  <!-- End Footer -->

  <script>
    let form_mode = 'new';
    let temp_id;


    function attachHandlers() {

      $('.btn-del').on('click', function() {
        disableButtons();
        showSpinner(this);
        const id = this.attributes["ex-id"].value;
        $.ajax({
          type: 'POST',
          url: 'engine.php',
          data: {
            token: 'delete_stock',
            id: id
          },
          success: function(dataRequest) {
            try {
              const data = JSON.parse(dataRequest);
              if (data.statusCode == 200)
                showToast('s', 'Record deleted Successfully !');
              else {
                throw Error('failure!');
              }

            } catch (err) {
              showToast('f', 'An error occured!');
              console.log(err)
            } finally {
              enableButtons();
              hideSpinners();
              get_table();
            }
          } //success ajax
        });
      })

      $('.btn-edit').on('click', function() {
        const id = this.attributes["pr-id"].value;
        disableButtons();
        showSpinner(this);
        $.ajax({
          type: 'GET',
          url: 'engine3.php',
          data: {
            token: 'get_sale',
            id: id
          },
          success: function(dataRequest) {
            try {
              console.log(dataRequest);
              const data = JSON.parse(dataRequest).data1[0];
              $('#validationCustom01').val(data["product"]);
              $('#validationCustom02').val(data["quantity"]);
              var today = new Date();
              var dd = String(today.getDate()).padStart(2, '0');
              var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
              var yyyy = today.getFullYear();
              today = yyyy + '-' + mm + '-' + dd;
              $('#validationCustom03').val(today);
              temp_id = data["id"];
            } catch (err) {
              showToast('f', "An Error Occured!");
              console.log(err);
            } finally {
              form_mode = "edit";
              enableButtons();
              hideSpinners();
              get_table();
            }
          }
        });
      });
    }
    $(document).ready(function() {
      hideSpinners();
      $('#fupForm').submit(function(e) {
        e.preventDefault();
        const formElem = this;
        var product = $('#validationCustom01').val().split('-')[2];
        var quantity = $('#validationCustom02').val();
        var date = $('#validationCustom03').val();
        if (!(product && quantity && date)) return;
        disableButtons();
        showSpinner($(this).find('.btn'));
        $.ajax({
          url: "engine3.php",
          type: "POST",
          data: {
            product: product,
            quantity: quantity,
            date: date,
            token: 'add_stock',
            id: (form_mode == "edit" ? temp_id : ""),
          },
          cache: false,

          success: function(dataResult) {
            try {
              console.log(dataResult)
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {
                resetForm(formElem);
                showToast('s', form_mode == 'edit' ? 'Record updated successfully !' : 'Data added Successfully!');
                // getTable('sales');
                form_mode = 'new';
              } //if status 200
              else {
                showToast('f', 'An error occured!');
              }
            } catch (e) {
              showToast('f', 'something bad happend!');
            } finally {
              enableButtons();
              hideSpinners();
              get_table();
            }

          } //success function
        }); //ajax

      });

      attachHandlers();
      $("#validationCustom01").autocomplete({
        delay: 1000,
        source: get_products,
      });


    });

    function get_products(request, response) {
      const str = request.term;
      $.ajax({
        url: "engine.php",
        type: "GET",
        data: {
          str: str,
          token: 'gps'
        },
        cache: false,
        success: function(dataResult) {
          // console.log(dataResult);
          const names = JSON.parse(dataResult).data;
          let namesArr = [];
          // console.log(names);
          names.forEach(elem => {
            namesArr.push(elem.name + " - " + elem.model + ' - ' + elem.id);
          });
          // console.log(namesArr);
          response(namesArr);
        }
      });

    }

    function get_table() {
      $.ajax({
        url: "get-stock.php",
        type: "GET",
        cache: false,
        success: function(data) {
          $("table").html($.parseHTML(data));
          attachHandlers();
          hideSpinners();
        }
      });

    }
  </script>
  <? include_once './components/toast.php' ?>


</body>

</html>