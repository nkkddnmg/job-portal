<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>

<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?= head("Certificate") ?>

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
                <h4 class="mb-2">Certificate</h4>
              </div>
              <hr>
              <form id="form-certificate" class="mb-3" method="POST" enctype="multipart/form-data">
                <input type="text" name="token" value="<?= $_GET["t"] ?>" hidden readonly>

                <div class="mb-3 form-group">
                  <label for="contact" class="form-label">Title</label>
                  <input class="form-control" type="text" id="title" name="title" required>
                </div>

                <div class="mb-3 form-group">
                  <label for="contact" class="form-label">Date Acquired</label>
                  <input class="form-control" type="text" id="acquired" name="acquired" required>
                </div>

                <div class="mb-3 form-group">
                  <?= $helpers->generate_image_upload(
                    "divCert",
                    "<label class='form-label'>Certificate</label>",
                    "input_cert",
                    "url_cert"
                  ) ?>
                </div>

                <div class="row">
                  <div class="col-md-6 mt-2">
                    <button type="submit" class="btn btn-primary d-grid w-100">Submit</button>
                  </div>
                  <div class="col-md-6 mt-2">
                    <button type="button" class="btn btn-danger d-grid w-100" onclick="handleCancel()">Cancel</button>
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
  const handleCancel = () => {
    const searchParams = new URLSearchParams(window.location.search);

    let location = "<?= SERVER_NAME . "/backend/nodes?action=logout" ?>";

    if (searchParams.has("ref")) {
      location = searchParams.get("ref")
    }

    window.location.href = location
  };


  $("#divCert").imageupload()

  $("#form-certificate").on("submit", function(e) {
    e.preventDefault()

    const input_cert = $("input[name='input_cert']").val()

    if (!input_cert) {
      swal.fire({
        title: "Error",
        html: "Certificate is required",
        icon: "error"
      })
    } else {
      swal.showLoading()

      $.ajax({
        url: "<?= SERVER_NAME . "/backend/nodes?action=add_certificate" ?>",
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
              window.location.replace("<?= SERVER_NAME . "/public/views/profile" ?>");
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
    }

  })
</script>

</html>