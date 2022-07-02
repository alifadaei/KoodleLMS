<?
include_once './authorization.php';
include_once './application/utils.php';
include_once './partials/head.php';
?>

<body>

  <? require_once './partials/header.php'; ?>

  <? require_once './partials/sidebar.php'; ?>
  <? require_once './partials/scripts.php'; ?>

  <style>
  </style>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>FAQ</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="cp.php">Home</a></li>
          <li class="breadcrumb-item active">FAQ</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <div class="card">
              <div class="card-body mt-3">
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        How to register?
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptatibus. Expedita, fugit quia? Commodi, ullam autem corrupti voluptatum dolore architecto debitis saepe maiores tempore quia quo rerum hic eaque! Cupiditate.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        How to register?
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptatibus. Expedita, fugit quia? Commodi, ullam autem corrupti voluptatum dolore architecto debitis saepe maiores tempore quia quo rerum hic eaque! Cupiditate.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        How to register?
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptatibus. Expedita, fugit quia? Commodi, ullam autem corrupti voluptatum dolore architecto debitis saepe maiores tempore quia quo rerum hic eaque! Cupiditate.
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <? require_once 'partials/footer.php'; ?>
  <!-- End Footer -->

</body>

</html>