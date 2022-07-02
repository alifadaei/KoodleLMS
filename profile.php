<? include_once './partials/head.php'; ?>
<? include_once './authorization.php' ?>

<body>

  <? require_once './partials/header.php'; ?>

  <? require_once './partials/sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="cp.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2><? echo ucwords($_SESSION['user']['name']); ?></h2>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <div class="row mt-2">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><? echo $_SESSION['user']['name'];  ?></div>
                  </div>

                  <? if ($level == 2) : ?>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Title</div>
                      <div class="col-lg-9 col-md-8"> <? echo $_SESSION['user']['title']; ?> </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Department</div>
                      <div class="col-lg-9 col-md-8">
                        <?
                        echo $_SESSION['user']['department']
                        ?>
                      </div>
                    </div>
                  <? endif; ?>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"> <? echo $_SESSION['user']['mobile']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><? echo $_SESSION['user']['email']; ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->

                  <form class="needs-validation" id="profile-edt" action="" enctype="multipart/form-data" novalidate>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/profile-img.jpg" alt="Profile">
                        <div class="pt-2">
                          <button type="button" id="btn-upload" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></button>
                          <button type="button" id="btn-delete" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></button>
                          <div class="my-2" id="upload-url"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="<? echo $_SESSION['user']['name']; ?>" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mobile" type="text" class="form-control" id="Phone" value="<? echo $_SESSION['user']['mobile']; ?>" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<? echo $_SESSION['user']['email']; ?>" required>
                      </div>
                    </div>
                    <!-- <div class="row mb-3 d-none">
                      <label for="file" class="col-md-4 col-lg-3 col-form-label">File</label>
                      <div class="col-md-8 col-lg-9 ">
                        <input name="file" type="file" class="form-control" id="file" accept=".jpg, .JPEG" required>
                      </div>
                    </div> -->
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">
                        <span>Save changes</span>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      </button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form class="needs-validation" id="pswd-rst" novalidate>
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword" required>
                        <div class="invalid-feedback">
                          Please Choose an strong password like abcdEF123
                        </div>
                      </div>

                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword" required>
                        <div class="invalid-feedback">
                          Renewpasword is not equal!
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">
                        <span>Change password</span>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      </button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <? require_once 'partials/footer.php'; ?>

  <? include_once 'partials/scripts.php' ?>

  <script>
    var input;
    $(document).ready(function() {
      hideSpinners();

      $('#profile-edt').submit(function(e) {
        e.preventDefault();
        email = $('#Email').val();
        name = $('#fullName').val();
        mobile = $('#Phone').val();
        if (!(email && name && mobile)) return;
        disableButtons();
        showSpinner(this);


        $.ajax({
          url: "engine.php",
          type: "POST",
          data: {
            email: email,
            name: name,
            mobile: mobile,
            token: 'uu',
          },
          // data: new FormData(this),
          success: function(dataResult) {
            try {
              console.log(dataResult);
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {
                showToast('s', 'Profile updated successfully!');
              } //if status 200
              else {
                showToast('f', 'An error occured!');
              }
            } catch (err) {
              showToast('f', 'An error occured!');
              console.log(err);
            } finally {
              enableButtons();
              hideSpinners();
            }
          }
        });
      });
      $('#pswd-rst').submit(function(e) {
        e.preventDefault();
        cur_pass = $('#currentPassword').val();
        newPassword = $('#newPassword').val();
        renewPassword = $('#renewPassword').val();
        if (!(cur_pass && newPassword && renewPassword)) return;
        const reg = /^[a-zA-Z0-9\-_@!#]{8,64}$/;
        if (!reg.test(newPassword)) {
          $('#newPassword').addClass('is-invalid');
          $(this).removeClass('was-validated');
          return;

        }
        if (newPassword != renewPassword) {
          $('#renewPassword').addClass('is-invalid');
          $(this).removeClass('was-validated');
          return;
        }
        $('#renewPassword').removeClass('is-invalid');
        $('#newPassword').removeClass('is-invalid');
        disableButtons();
        showSpinner(this);
        $.ajax({
          url: "engine.php",
          type: "POST",
          data: {
            cur_pass: cur_pass,
            newPassword: newPassword,
            token: 'pr',
          },
          cache: false,
          success: function(dataResult) {
            console.log(dataResult);
            try {
              // console.log(dataResult);
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {
                showToast('s', 'Password reset successful!');
              } //if status 200
              else {
                showToast('f', dataResult.error);
              }
            } catch (err) {
              showToast('f', 'An error occured!');
              console.log(err);
            } finally {
              enableButtons();
              hideSpinners();
            }
          }
        });

      });



    });
  </script>
  <? include_once './components/toast.php' ?>

</body>

</html>