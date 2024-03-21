<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?= head("Verify account") ?>

<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y row">
      <div class="col-sm-12 col-md-5 col-5">
        <div class="authentication-inner" style="max-width: 100%;">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">

              <div class="text-center">
                <h4 class="mb-2">Confirm your Identity</h4>
                <p class="mb-4">Verify account!</p>
              </div>

              <form id="form-verification" class="mb-3" method="POST" enctype="multipart/form-data">
                <input type="text" name="token" value="<?= $_GET["t"] ?>" hidden readonly>
                <div class="mb-3 form-group">
                  <!-- <label for="selfie" class="form-label">Selfie</label> -->
                  <!-- <input class="form-control" type="file" id="selfie" name="selfie" accept="image/*" required> -->
                  <?= $helpers->generate_image_upload(
                    "divSelfie",
                    "Selfie <span class='text-danger'>*</span>",
                    "selfie_input",
                    "selfie_url"
                  ) ?>
                </div>
                <div class="mb-3 form-group">
                  <!-- <label for="validId" class="form-label">Valid ID</label>
                    <input class="form-control" type="file" id="validId" name="validId" accept="image/*" required> -->
                  <?= $helpers->generate_image_upload(
                    "divValidID",
                    "Valid ID <span class='text-danger'>*</span>",
                    "valid_id_input",
                    "valid_id_url"
                  ) ?>
                </div>

                <div class="row">
                  <div class="col-md-6 mt-2">
                    <button type="submit" class="btn btn-primary d-grid w-100">Submit</button>
                  </div>
                  <div class="col-md-6 mt-2">
                    <button type="button" class="btn btn-danger d-grid w-100" onclick="window.history.back()">Cancel</button>
                  </div>
                </div>
              </form>


            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>
  </div>
</body>
<?php include("../components/footer.php") ?>
<script>
  $("#divSelfie").imageupload()
  $("#divValidID").imageupload()

  $("#form-verification").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()

    const selfie_input = $("input[name='selfie_input']").val()
    const selfie_url = $("input[name='selfie_url']").val()
    const valid_id_input = $("input[name='valid_id_input']").val()
    const valid_id_url = $("input[name='valid_id_url']").val()

    if ((selfie_input || selfie_url) && (valid_id_input || valid_id_url)) {
      $.ajax({
        url: "<?= SERVER_NAME . "/backend/nodes?action=verify_account" ?>",
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
              window.location.href = "<?= SERVER_NAME . "/public/views/home" ?>";
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
    } else {
      swal.fire({
        title: "Warning",
        html: "Looks like your <strong>Selfie</strong> or <strong>Valid ID</strong> is not recognized.<br>Please upload again.",
        icon: "warning",
      })
    }

  })
</script>

</html>