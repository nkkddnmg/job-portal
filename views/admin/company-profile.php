<?php include("../../backend/nodes.php"); ?>
<?php include("../../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../../views/sign-in");
}
$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);

$pageName = "Preview Company";
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
                <div class="card">
                  <h5 class="card-header">Company Details</h5>

                  <?php
                  $company = $helpers->select_all_individual("company", "id='$_GET[id]'");
                  $companyImgLink = $helpers->get_company_logo_link($company->id);
                  $verificationData = $helpers->select_all_individual("verification", "id='$company->verification_id'");
                  ?>

                  <?= $helpers->generate_company_logo(false, $companyImgLink, $company->id); ?>

                  <div class="card-body">
                    <form id="form-verify-company" method="POST">
                      <input type="text" name="company_id" value="<?= $companyID ?>" readonly hidden>
                      <div class="row">
                        <div class="form-group mb-3 col-md-4">
                          <label for="name" class="form-label">Name</label>
                          <input class="form-control" type="text" id="name" name="name" value="<?= $company->name ?>" required readonly />
                        </div>
                        <div class="form-group mb-3 col-md-4">
                          <label for="companyAddress" class="form-label">Address</label>
                          <?php
                          foreach ($helpers->addressList as $add) :
                            if ($add == $company->address) :
                          ?>
                              <input class="form-control" type="text" id="companyAddress" name="companyAddress" value="<?= $company->address ?>" required readonly />
                            <?php endif; ?>
                          <?php endforeach; ?>

                        </div>
                        <div class="form-group mb-3 col-md-4">
                          <label for="industry" class="form-label">Industry</label>
                          <?php
                          $industries = $helpers->select_all("industries");
                          foreach ($industries as $industry) :
                            if ($industry->id == $company->industry_id) :
                          ?>
                              <input class="form-control" type="text" id="industry" name="industry" value="<?= $industry->name ?>" required readonly />
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label for="description" class="form-label">Description</label>
                          <textarea class="form-control" id="description" name="description" rows="3" readonly><?= nl2br($company->description) ?></textarea>
                        </div>

                        <div class="form-group mb-3 col-md-12">

                          <div id="inputLink">
                            <label for="inputBusinessPermit" class="form-label">Business Permit</label>
                            <div class="input-group ">
                              <input type="text" class="form-control text-primary" id="inputBusinessPermit" value="<?= $verificationData->business_permit ?>" required readonly>

                              <button class="btn btn-outline-primary" onclick='handleOpenModalImg(undefined, `divModalBusinessPermit`, `businessPermitImg`, `businessPermitCaption`, `<?= $verificationData->business_permit ?>`)' type="button">
                                Preview
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="mt-2 text-end">
                          <?php if (isset($_GET["verify"])) : ?>
                            <button type="button" class="btn btn-primary me-2" onclick="handleSubmit('approved', '<?= $verificationData->id ?>')">Approve</button>
                            <button type="button" class="btn btn-danger me-2" onclick="handleSubmit('denied', '<?= $verificationData->id ?>')">Deny</button>
                          <?php endif; ?>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="divider">
                    <div class="divider-text">Employers</div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <?php
                      $employers = $helpers->select_all_with_params("users", "company_id='$_GET[id]'");

                      if (count($employers) > 0) :
                        foreach ($employers as $employer) :
                      ?>
                          <div class="col-md-4">
                            <div class="card" style="box-shadow: 0 20px 27px 0 rgb(0 0 0 / 20%)">
                              <div class="card-body p-4 d-flex align-items-center gap-3">
                                <img src="<?= $helpers->get_avatar_link($employer->id) ?>" alt="" class="rounded-circle" width="40" height="40">
                                <div>
                                  <h5 class="mb-0" style="font-weight: 600 !important;">
                                    <?= $helpers->get_full_name($employer->id) ?>
                                  </h5>
                                  <span class="d-flex align-items-center" style="font-size: .75rem !important;">
                                    <?= $employer->address ?>
                                  </span>
                                </div>
                                <button onclick='window.location.href = `<?= SERVER_NAME . "/views/profile?id=$employer->id" ?>`' class="btn btn-primary btn-sm py-1 px-2 ms-auto">
                                  View
                                </button>
                              </div>
                            </div>
                          </div>
                      <?php
                        endforeach;
                      endif;
                      ?>
                    </div>
                  </div>
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
    <?= $helpers->generate_modal_img("divModalBusinessPermit", "businessPermitImg", "businessPermitCaption") ?>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

</body>
<?php include("../../components/footer.php") ?>

<script>
  const handleSubmit = (action, id) => {
    if (action == "denied") {
      swal.fire({
        input: "textarea",
        inputLabel: "Deny Reason",
        icon: "question",
        showCancelButton: true,
        inputValidator: (value) => {
          if (!value) {
            return "State your reason";
          }
        }
      }).then((res) => {
        if (res.isConfirmed) {
          save(action, `Denied reason: ${res.value}`, id)
        }
      })
    } else if (action == "approved") {
      save(action, "Company's fully verified.<br>You can start posting your job.", id)
    }
  }

  function save(action, message, id) {
    swal.showLoading()
    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=verify_company" ?>",
      type: "POST",
      data: {
        id: id,
        action: action,
        msg: message
      },
      cache: true,
      processData: true,
      success: function(data) {
        const resp = $.parseJSON(data)
        swal.fire({
          title: resp.success ? "Success" : "Error",
          html: resp.message,
          icon: resp.success ? "success" : "error",
        }).then(() => resp.success ? window.location.replace("<?= SERVER_NAME . "/views/admin/company-verification" ?>") : undefined)
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
</script>

</html>