<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<?= head("Login") ?>

<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <h4 class="mb-2">Login to Your Account</h4>
              <p class="mb-4">Enter your email & password to login</p>
            </div>

            <form id="form-sign-in" class="mb-3" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a class="d-none" href="<?= SERVER_NAME . "/forgot-password" ?>">
                    <small>Forgot Password?</small>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mt-2">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
                <div class="col-md-6 mt-2">
                  <button type="button" class="btn btn-secondary d-grid w-100" onclick="handleGoBackToPublicPage()">Cancel</button>
                </div>
              </div>
            </form>

            <p class="text-center">
              <span>New on our platform?</span>
              <a href="javascript:void(0)" onclick="navigateSIgnUp()">
                <span>Create an account</span>
              </a>
            </p>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>


</body>
<?php include("../components/footer.php") ?>

<script>
  const handleGoBackToPublicPage = () => {
    window.location.href = '<?= SERVER_NAME . "/public/views/home" ?>'
  }

  $("#form-sign-in").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()
    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=login" ?>",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        const resp = $.parseJSON(data)
        if (resp.success) {
          if (resp.role == "admin") {
            if (resp.is_password_change) {
              window.location.href = "<?= SERVER_NAME . "/views/profile" ?>";
            } else {
              swal.fire({
                  title: "Successfully Login",
                  html: "Looks like your account is newly added.<br>Would you like to change your password?",
                  icon: "success",
                  confirmButtonText: "Yes",
                  cancelButtonText: "No",
                  confirmButtonColor: "#696cff",
                  cancelButtonColor: "#dc3545",
                  showCancelButton: true,
                })
                .then((d) => {
                  if (d.isConfirmed) {
                    window.location.href = "<?= SERVER_NAME . "/views/profile" ?>";
                  } else {
                    window.location.href = "<?= SERVER_NAME . "/views/admin/dashboard" ?>";
                  }
                });
            }
          } else if (resp.role == "applicant") {
            if (sessionStorage.getItem("referer")) {
              window.location.href = decodeURIComponent(sessionStorage.getItem("referer"))
            } else {
              window.location.href = `${resp.location}`;
            }
          } else if (resp.role == "employer") {
            if (resp.token) {
              window.location.href = `<?= SERVER_NAME . "/views/company-details?t=" ?>${resp.token}`;
            } else {
              window.location.href = "<?= SERVER_NAME . "/views/profile" ?>";
            }

          }
        } else {
          swal.fire({
            title: "Error",
            html: resp.message,
            icon: "error",
          })
        }
      },
      error: function(data) {
        swal.fire({
          title: 'Oops...',
          html: 'Something went wrong.',
          icon: 'error',
        })
      }
    });

  })
</script>

</html>