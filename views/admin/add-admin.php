<?php include("../../backend/nodes.php"); ?>
<?php include("../../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../../sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Add Admin";

?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<?= head($pageName) ?>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include("../../components/sidebar.php") ?>

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php include("../../components/navbar.php") ?>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-6">
                <h4 class="fw-bold py-3 mb-4">
                  <?= $pageName ?>
                </h4>
              </div>
              <div class="col-6 py-2">
                <button type="button" class="btn btn-secondary float-end" onclick="return window.history.back()">
                  <i class='tf-icons bx bx-arrow-back'></i> Go Back
                </button>
              </div>
            </div>


            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">

                  <div class="card-body">
                    <form id="form-add-admin" method="POST">
                      <div class="row">
                        <div class="form-group mb-3 col-md-6">
                          <label for="fname" class="form-label">First Name</label>
                          <input class="form-control" type="text" id="fname" name="fname" required />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                          <label for="mname" class="form-label">Middle Name</label>
                          <input class="form-control" type="text" name="mname" id="mname" />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                          <label for="lname" class="form-label">Last Name</label>
                          <input class="form-control" type="text" name="lname" id="lname" required />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                          <label for="contact" class="form-label">Contact</label>
                          <input class="form-control" type="text" name="contact" id="contact" required />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                          <label for="email" class="form-label">E-mail</label>
                          <input class="form-control" type="text" id="email" name="email" required />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" class="form-control" id="address" name="address" required />
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="button" class="btn btn-outline-danger" onclick="return window.history.back()">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /Account -->
              </div>
            </div>
          </div>
        </div>
        <!-- / Content -->
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

</body>
<?php include("../../components/footer.php") ?>
<script>
  $("#form-add-admin").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading();

    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=add_admin" ?>",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        const resp = $.parseJSON(data);
        swal.fire({
          title: resp.success ? "" : "",
          html: resp.message,
          icon: resp.success ? "success" : "error"
        }).then((e) => resp.success ? window.location.href = '<?= SERVER_NAME . "/views/admin/admins" ?>' : undefined)
      },
      error: function(data) {
        swal.fire({
          title: "Oops...",
          html: "Something went wrong.",
          icon: "error",
        });
      },
    });
  })
</script>

</html>