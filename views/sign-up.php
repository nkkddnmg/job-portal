<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
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

            <form id="form-sign-up" class="mb-3" method="POST" enctype="multipart/form-data" novalidate>

              <div class="mb-3 form-group">
                <label for="fname" class="form-label">First name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your First name" required />
              </div>
              <div class="mb-3 form-group">
                <label for="mname" class="form-label">Middle name</label>
                <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter your Middle name" />
              </div>
              <div class="mb-3 form-group">
                <label for="lname" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your Last name" required />
              </div>
              <div class="mb-3 form-group">
                <label for="address" class="form-label">Address</label>

                <select class="form-select" name="address" id="address" required>
                  <option value="">-- select address --</option>
                  <?php foreach ($helpers->addressList as $add) : ?>
                    <option value="<?= $add ?>"><?= $add ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3 form-group">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your Contact" required />
              </div>
              <div class="mb-3 form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required />
              </div>

              <div class="mb-3 form-password-toggle form-group">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" aria-describedby="password" required />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>

              <input type="text" name="role" id="inputRole" hidden>
              <div class="row">
                <div class="col-md-6 mt-2">
                  <button class="btn btn-primary d-grid w-100" type="button" onclick="handleSubmit('applicant')">
                    Applicant
                  </button>
                </div>
                <div class="col-md-6 mt-2">
                  <button class="btn btn-outline-primary d-grid w-100" type="button" onclick="handleSubmit('employer')">
                    Employer
                  </button>
                </div>
                <div class="col-md-12 mt-2">
                  <button type="button" class="btn btn-secondary d-grid w-100" onclick="handleGoBackToPublicPage()">
                    Cancel
                  </button>
                </div>
              </div>
            </form>

            <p class="text-center">
              <span>Already have an account?</span>
              <a href="<?= SERVER_NAME . "/views/sign-in" ?>">
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
<?php include("../components/footer.php") ?>

<script>
  const handleGoBackToPublicPage = () => {
    window.location.href = '<?= SERVER_NAME . "/public/views/home" ?>'
  }

  function handleSubmit(role) {
    $("#inputRole").val(role)

    $("#form-sign-up").submit();
  }

  $("#form-sign-up").validate({
    submitHandler: function() {
      swal.showLoading()
      $.ajax({
        url: "<?= SERVER_NAME . "/backend/nodes?action=register" ?>",
        type: "POST",
        data: new FormData($("#form-sign-up").get(0)),
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
              let location = "<?= SERVER_NAME . "/views/admin/dashboard" ?>";

              if (resp.role == "employer") {
                location = `<?= SERVER_NAME . "/views/company-details?t=" ?>${resp.token}`;
              } else if (resp.role == "applicant") {
                location = `<?= SERVER_NAME . "/views/create-resume?t=" ?>${resp.token}`;
              }

              window.location.href = location
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
    },
    errorElement: "span",
    errorPlacement: function(error, element) {
      error.addClass("invalid-feedback").insertAfter(element.closest(".form-group").children().get(0))
    },
    rules: {
      pdfFile: {
        pdfFileOnly: true
      }
    },
    highlight: function(element) {
      $(element).removeClass('is-valid').addClass('is-invalid');
    },
    unhighlight: function(element) {
      $(element).removeClass('is-invalid');
    }
  });

  $("#form-sign-up").on("submit", function(e) {
    e.preventDefault()


  })
</script>

</html>