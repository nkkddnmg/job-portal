<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?= head("Verify account") ?>

<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">

            <div class="text-center">
              <h4 class="mb-2">Confirm your Identity</h4>
              <p class="mb-4">Verify account!</p>
            </div>

            <form id="form-sign-up" class="mb-3" method="POST">

              <div class="mb-3 form-group">
                <label for="selfie" class="form-label">Selfie</label>
                <input class="form-control" type="file" id="selfie" name="selfie" required>
              </div>
              <div class="mb-3 form-group">
                <label for="validId" class="form-label">Valid ID</label>
                <input class="form-control" type="file" id="validId" name="validId" required>
              </div>

              <button class="btn btn-primary d-grid w-100">Submit</button>
            </form>


          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>

</body>
<?php include("../components/footer.php") ?>
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
              window.location.href = "../views/admin";
            } else {
              window.location.href = "../views/verify-account.php";
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