<?php include("./backend/nodes.php"); ?>
<?php include("./components/function_components.php"); ?>
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template-free">

<?= head("Registration") ?>

<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">

            <div class="text-center">
              <h4 class="mb-2">Adventure starts here 🚀</h4>
              <p class="mb-4">Create your account!</p>
            </div>

            <form id="form-sign-up" class="mb-3" method="POST">

              <div class="mb-3">
                <label for="fname" class="form-label">First name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your First name" required />
              </div>
              <div class="mb-3">
                <label for="mname" class="form-label">Middle name</label>
                <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter your Middle name" />
              </div>
              <div class="mb-3">
                <label for="lname" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your Last name" />
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter your Address" />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" />
              </div>

              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>

              <button class="btn btn-primary d-grid w-100">Sign up</button>
            </form>

            <p class="text-center">
              <span>Already have an account?</span>
              <a href="<?= SERVER_NAME . "/sign-in" ?>">
                <span>Sign in instead</span>
              </a>
            </p>
          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>

</body>
<?php include("./components/footer.php") ?>
<script>
  $("#form-sign-up").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()
    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=register" ?>",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        const resp = $.parseJSON(data)
        swal.fire({
          title: resp.success ? "Success" : "Error",
          html: resp.message,
          icon: resp.success ? "success" : "error",
        }).then(() => {
          if (resp.success) {
            if (resp.role == "admin") {
              window.location.href = "./views/admin";
            } else {
              window.location.href = "./views/dashboard";
            }
          }
        })
      },
      error: function(data) {
        swal.fire({
          title: 'Oops...',
          text: 'Something went wrong.',
          icon: 'error',
        })
      }
    });

  })
</script>

</html>