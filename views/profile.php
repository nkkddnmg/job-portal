<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../views/sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "";

$user_id = "";
$imgSrc = "";
$fname = "";
$mname = "";
$lname = "";
$contact = "";
$email = "";
$address = "";

$userData = null;

if (isset($_GET["id"])) {
  $userData = $helpers->get_user_by_id($_GET["id"]);

  $user_id = $userData->id;
  $imgSrc = $helpers->get_avatar_link($userData->id);
  $fname = $userData->fname;
  $mname = $userData->mname;
  $lname = $userData->lname;
  $contact = $userData->contact;
  $email = $userData->email;
  $address = $userData->address;

  if ($userData->role == "employer") {
    $pageName = "Employer Profile";
  } else if ($userData->role == "applicant") {
    $pageName = "Applicant Profile";
  } else {
    $pageName = "Admin Profile";
  }
} else {
  $user_id = $LOGIN_USER->id;
  $imgSrc = $helpers->get_avatar_link($LOGIN_USER->id);
  $fname = $LOGIN_USER->fname;
  $mname = $LOGIN_USER->mname;
  $lname = $LOGIN_USER->lname;
  $contact = $LOGIN_USER->contact;
  $email = $LOGIN_USER->email;
  $address = $LOGIN_USER->address;

  $pageName = "My Profile";
}

$buttonVisibility = isset($_GET["id"]) ? false : true;
$user_avatar_link = $helpers->get_avatar_link(isset($_GET["id"]) ? $_GET["id"] : $user_id);
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<?= head($pageName) ?>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include("../components/sidebar.php") ?>

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php include("../components/navbar.php") ?>
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
              <?php if (isset($_GET["id"])) : ?>
                <div class="col-6 py-2">
                  <button type="button" class="btn btn-secondary float-end" onclick="return window.history.back()">
                    <i class='tf-icons bx bx-arrow-back'></i> Go Back
                  </button>
                </div>
              <?php endif; ?>
            </div>


            <div class="row">
              <div class="col-md-12">
                <ul class="nav nav-pills px-4" role="tablist">
                  <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#tab-profile" aria-controls="tab-profile" aria-selected="true">
                      <i class="bx bx-user me-1"></i>
                      Account
                    </button>
                  </li>
                  <?php if (!isset($_GET["id"])) : ?>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tab-change-password" aria-controls="tab-change-password" aria-selected="true">
                        <i class="bx bx-lock-alt me-1"></i>
                        Change Password
                      </button>

                    </li>
                  <?php endif; ?>

                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tab-profile" role="tabpanel">
                    <div class="card mb-4">
                      <h5 class="card-header">Profile Details</h5>

                      <!-- Account -->
                      <?= $helpers->generate_avatar($buttonVisibility, $user_avatar_link, $user_id, false); ?>

                      <div class="card-body">
                        <form id="form-update-profile" method="POST">
                          <input type="text" name="id" value="<?= $user_id ?>" readonly hidden>
                          <div class="row">
                            <div class="form-group mb-3 col-md-6">
                              <label for="fname" class="form-label">First Name</label>
                              <input class="form-control" type="text" id="fname" name="fname" value="<?= $fname ?>" required />
                            </div>
                            <div class="form-group mb-3 col-md-6">
                              <label for="mname" class="form-label">Middle Name</label>
                              <input class="form-control" type="text" name="mname" id="mname" value="<?= $mname ?>" />
                            </div>
                            <div class="form-group mb-3 col-md-6">
                              <label for="lname" class="form-label">Last Name</label>
                              <input class="form-control" type="text" name="lname" id="lname" value="<?= $lname ?>" required />
                            </div>
                            <div class="form-group mb-3 col-md-6">
                              <label for="contact" class="form-label">Contact</label>
                              <input class="form-control" type="text" name="contact" id="contact" value="<?= $contact ?>" required />
                            </div>
                            <div class="form-group mb-3 col-md-6">
                              <label for="email" class="form-label">E-mail</label>
                              <input class="form-control" type="text" id="email" name="email" value="<?= $email ?>" required />
                            </div>
                            <div class="form-group mb-3 col-md-6">
                              <label for="address" class="form-label">Address</label>

                              <select class="form-select" name="address" id="address" required>
                                <option value="">-- select address --</option>
                                <?php foreach ($helpers->addressList as $add) : ?>
                                  <option value="<?= $add ?>" <?= $helpers->is_selected($add, $address) ?>><?= $add ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <?php if (!isset($_GET["id"])) : ?>
                              <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="button" class="btn btn-outline-danger" onclick="return window.history.back()">Cancel</button>
                              </div>
                            <?php endif; ?>
                          </div>
                        </form>
                      </div>
                      <!-- /Account -->
                    </div>
                    <?php
                    if ($LOGIN_USER->role == "employer") :
                      $companyImgLink = "";
                      $companyID = "";
                      $companyName = "";
                      $companyAddress = "";
                      $industry = "";
                      $description = "";

                      $verification_id = "";
                      if ($LOGIN_USER->company_id) {
                        $getCompanyData = $helpers->select_all_individual("company", "id='$LOGIN_USER->company_id'");

                        if ($getCompanyData) {
                          $companyImgLink = $helpers->get_company_logo_link($getCompanyData->id);
                          $companyID = $getCompanyData->id;

                          $companyName = $getCompanyData->name;
                          $companyAddress = $getCompanyData->address;
                          $industryID = $getCompanyData->industry_id;
                          $description = nl2br($getCompanyData->description);

                          $verification_id = $getCompanyData->verification_id;
                        }
                      }

                    ?>
                      <div class="card">
                        <h5 class="card-header">Company Details</h5>

                        <?= $helpers->generate_company_logo($buttonVisibility, $companyImgLink, $companyID); ?>

                        <div class="card-body">
                          <?php
                          $verificationData = $helpers->select_custom_fields_individual("verification", array("status", "message", "business_permit"), "id='$verification_id'");

                          if ($verificationData->status == "pending") :
                          ?>
                            <div class="alert alert-warning mt-2">
                              <?= $verificationData->message ?>
                            </div>
                          <?php elseif ($verificationData->status == "denied") : ?>
                            <div class="alert alert-danger mt-2">
                              <?= $verificationData->message ?>
                            </div>
                          <?php elseif ($verificationData->status == "approved") : ?>
                            <div class="alert alert-success mt-2">
                              <?= $verificationData->message ?>
                            </div>
                          <?php endif; ?>

                          <form id="form-update-company" method="POST" enctype="multipart/form-data">
                            <input type="text" name="company_id" value="<?= $companyID ?>" readonly hidden>
                            <div class="row">
                              <div class="form-group mb-3 col-md-4">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" id="name" name="name" value="<?= $companyName ?>" required />
                              </div>
                              <div class="form-group mb-3 col-md-4">
                                <label for="companyAddress" class="form-label">Address</label>

                                <select class="form-select" name="companyAddress" id="companyAddress" required>
                                  <option value="">-- select address --</option>
                                  <?php foreach ($helpers->addressList as $add) : ?>
                                    <option value="<?= $add ?>" <?= $helpers->is_selected($add, $companyAddress) ?>><?= $add ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="form-group mb-3 col-md-4">
                                <label for="industry" class="form-label">Industry</label>
                                <select class="form-select" name="industry" id="industry" required>
                                  <option value="" selected disabled>Select an option</option>
                                  <?php
                                  $industries = $helpers->select_all("industries");

                                  foreach ($industries as $industry) :
                                  ?>
                                    <option value="<?= $industry->id ?>" <?= $helpers->is_selected($industry->id, $industryID) ?>><?= $industry->name ?></option>
                                  <?php
                                  endforeach;
                                  ?>
                                </select>
                              </div>
                              <div class="form-group mb-3 col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"><?= $description ?></textarea>
                              </div>

                              <div class="form-group mb-3 col-md-12">

                                <div id="inputLink">
                                  <label for="inputBusinessPermit" class="form-label">Business Permit</label>
                                  <div class="input-group ">
                                    <input type="text" class="form-control text-primary" id="inputBusinessPermit" value="<?= $verificationData->business_permit ?>" required readonly>

                                    <button class="btn btn-outline-warning" id="btnChangeBusinessPermit" type="button">
                                      Change
                                    </button>
                                    <button class="btn btn-outline-primary" onclick='handleOpenModalImg(undefined, `divModalBusinessPermit`, `businessPermitImg`, `businessPermitCaption`, `<?= $verificationData->business_permit ?>`)' type="button">
                                      Preview
                                    </button>
                                  </div>
                                </div>
                              </div>

                              <div class="mb-3 col-md-12 d-none" id="editBusinessPermit">
                                <?= $helpers->generate_image_upload(
                                  "divBusinessPermit",
                                  "<label class='form-label'>Business Permit  <span class='text-danger'>*</span></label> ",
                                  "input_business_permit",
                                  "url_business_permit",
                                  array(
                                    "show" => true,
                                    "onclick" => "handleHide()"
                                  )
                                ) ?>
                              </div>
                              <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Update Details</button>
                                <button type="button" class="btn btn-outline-danger" onclick="return window.history.back()">Cancel</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    <?php endif; ?>
                    <!-- <div class="card">
                      <h5 class="card-header">Delete Account</h5>
                      <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                          <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                          </div>
                        </div>
                        <form id="form-deactivate" method="POST">
                          <input type="text" name="id" value="<?= $user_id ?>" readonly hidden>
                          <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                          </div>
                          <button type="submit" class="btn btn-danger deactivate-account disabled" id="btnDeactivate">Deactivate Account</button>
                        </form>
                      </div>
                    </div> -->
                  </div>
                  <div class="tab-pane fade" id="tab-change-password" role="tabpanel">
                    <div class="row justify-content-center">
                      <div class="col-md-7">
                        <div class="card">
                          <h5 class="card-header">Change Password</h5>
                          <div class="card-body">

                            <form id="form-change-password" method="POST">
                              <input type="text" name="id" value="<?= $user_id ?>" readonly hidden>
                              <div class="row ">
                                <div class="form-group col-md-12 mb-3 form-password-toggle">
                                  <label for="address" class="form-label">Current Password</label>
                                  <div class="input-group input-group-merge">
                                    <input type="password" id="current_password" class="form-control" name="current_password" aria-describedby="current_password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                  </div>
                                </div>
                                <div class="form-group col-md-12 mb-3 form-password-toggle">
                                  <label for="address" class="form-label">New Password</label>
                                  <div class="input-group input-group-merge">
                                    <input type="password" id="new_password" class="form-control" name="new_password" aria-describedby="new_password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                  </div>
                                </div>
                                <div class="form-group col-md-12 mb-3 form-password-toggle">
                                  <label for="address" class="form-label">Confirm Password</label>
                                  <div class="input-group input-group-merge">
                                    <input type="password" id="confirm_password" class="form-control" name="confirm_password" aria-describedby="confirm_password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                  </div>
                                </div>
                              </div>

                              <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">
                                  Submit
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
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
<?php include("../components/footer.php") ?>
<script>
  $("#divBusinessPermit").imageupload()

  $("#btnChangeBusinessPermit").on("click", function() {
    $("#inputLink").addClass("d-none")
    $("#editBusinessPermit").removeClass("d-none")
  })

  function handleHide() {
    $("#inputLink").removeClass("d-none")
    $("#editBusinessPermit").addClass("d-none")
    $("#input_business_permit").val("")
    $("#url_business_permit").val("")

    $("#divBusinessPermit img").remove()
  }

  const handleCompanyChangeImage = (e, imageId, backendUrl, action, user_id) => {
    let formData = new FormData();
    formData.append("id", user_id);

    if (action == "upload") {
      formData.append("file", $(e).get(0).files[0]);
      formData.append("set_image_null", false);
      formData.append("action", action);
    } else if ("reset") {
      formData.append("set_image_null", true);
      formData.append("action", action);
    }

    $.ajax({
      url: `${backendUrl}?action=save_company_image`,
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        const resp = $.parseJSON(data);
        if (resp.success) {
          $(`#${imageId}`).attr("src", resp.image_url);
        }
      },
      error: function(data) {
        swal.fire({
          title: "Oops...",
          html: "Something went wrong.",
          icon: "error",
        });
      },
    });
  };

  $("#form-change-password").on("submit", function(e) {
    e.preventDefault();

    const current_password = $("#current_password").val();
    const new_password = $("#new_password").val();
    const confirm_password = $("#confirm_password").val();

    if (current_password && new_password && confirm_password) {
      if (current_password.toLowerCase() === new_password.toLowerCase()) {
        swal.fire({
          title: "Error",
          html: "Current password and New password should not match!",
          icon: "error",
        });
      } else if (new_password.toLowerCase() === confirm_password.toLowerCase()) {
        swal.showLoading();

        $.ajax({
          url: "<?= SERVER_NAME . "/backend/nodes?action=change_password" ?>",
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
            }).then((e) => resp.success ? window.location.reload() : undefined)
          },
          error: function(data) {
            swal.fire({
              title: "Oops...",
              html: "Something went wrong.",
              icon: "error",
            });
          },
        });
      } else {
        swal.fire({
          title: "Error",
          html: "New password and Confirm password not match",
          icon: "error",
        });
      }
    } else {
      swal.fire({
        title: "Error",
        html: "All fields are required",
        icon: "error",
      });
    }
  })

  $("#accountActivation").on("change", function(e) {
    if ($(this).is(":checked")) {
      $("#btnDeactivate").removeClass("disabled")
    } else {
      $("#btnDeactivate").addClass("disabled")
    }
  });

  $("#form-deactivate").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading();

    let user_id = "";

    if ($(this).serializeArray().some((e) => e.name === "id")) {
      const inputId = $(this).serializeArray().filter((d) => d.name === "id")
      user_id = inputId[0].value
    }

    if (user_id) {
      const confirmOptions = {
        title: "Are you sure you want to deactivate your account?",
        text: "You can't undo this action after successful deactivation.",
        buttonText: "Delete",
        buttonColor: "#dc3545",
      }

      const postData = {
        table: "users",
        column: "id",
        val: "<?= $user_id ?>",
      }

      handleDelete("<?= SERVER_NAME . "/backend/nodes?action=delete_profile" ?>", confirmOptions, postData);
    } else {
      swal.fire({
        title: "Error",
        html: "Error in deactivation account",
        icon: "error",
      });
    }

  })

  $("#form-update-profile").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()

    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=profile_save" ?>",
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
        }).then((e) => resp.success ? window.location.reload() : undefined)
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

  $("#form-update-company").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()
    console.log(!$("#editBusinessPermit").hasClass("d-none"))
    const input_business_permit = $("input[name='input_business_permit']").val()
    const url_business_permit = $("input[name='url_business_permit']").val()

    if (!$("#editBusinessPermit").hasClass("d-none")) {
      if (!input_business_permit && !url_business_permit) {
        swal.fire({
          title: "Error",
          html: "Business Permit is required",
          icon: "error"
        })
        return;
      }
    }

    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=company_save" ?>",
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
        }).then((e) => resp.success ? window.location.reload() : undefined)
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