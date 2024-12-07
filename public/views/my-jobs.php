<?php include("../../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<?php
$LOGIN_USER = null;
if (isset($_SESSION["id"])) {
  $LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
}
?>
<!doctype html>
<html lang="en">

<?= head("Job Portal") ?>

<body id="top">

  <?= loadingEl() ?>

  <div class="site-wrap">
    <?php include("../components/navbar.php") ?>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?= SERVER_NAME . "/public/assets/images/hero_1.jpg" ?>'); height: 20vh !important" id="home-section">
      <div class="container">
        <div class="row pt-0">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">My Jobs</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section" id="jobPostings">
      <div class="container">

        <div class="row d-flex justify-content-center">
          <div class="col-md-10">
            <?php
            $my_jobs = $helpers->select_all_with_params("candidates", "user_id='$LOGIN_USER->id' ORDER BY id DESC");
            if (count($my_jobs) > 0) :
            ?>
              <ul class="job-listings mb-5" style="overflow: visible;">
                <?php
                foreach ($my_jobs as $my_job) :
                  $job = $helpers->select_all_individual("job", "id='$my_job->job_id'");
                  $company = $helpers->select_all_individual("company", "id='$job->company_id'");

                  $btnDropDownId = "btn-dropdown-$my_job->id";
                ?>
                  <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    <a href="<?= SERVER_NAME . "/public/views/job-details?id=$job->id" ?>"></a>
                    <div class="job-listing-logo">
                      <img src="<?= $helpers->get_company_logo_link($company->id) ?>" class="img-fluid">
                    </div>

                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                      <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                        <?php
                        $statusBadge = "";

                        if ($my_job->status == "Applied") {
                          $statusBadge = "badge-primary";
                        } else if ($my_job->status == "Withdrawn") {
                          $statusBadge = "badge-warning";
                        } else if ($my_job->status == "Hired") {
                          $statusBadge = "badge-success";
                        } else if ($my_job->status == "Not selected by employer" || $my_job->status == "Terminated" || $my_job->status == "Resigned") {
                          $statusBadge = "badge-danger";
                        } else if ($my_job->status == "Interviewing") {
                          $statusBadge = "badge-secondary";
                        }

                        ?>
                        <span class="badge <?= $statusBadge ?> mb-3"><?= $my_job->status ?></span>
                        <h2><?= $job->title ?></h2>
                        <strong><?= $company->name ?></strong>

                      </div>

                      <div class="job-listing-location mb-3 mb-sm-0 custom-width w-50" style="line-height: 90px;">
                        <span class="icon-room"></span> <?= $company->district . " - " . $job->location_type ?>
                      </div>

                      <div class="job-listing-meta">
                        <div class="dropdown">
                          <button class="btn btn-default rounded-circle" type="button" id="<?= $btnDropDownId ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class='bx bx-dots-vertical-rounded' data-toggle="tooltip" data-placement="top" title="More"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="<?= $btnDropDownId ?>">
                            <button class="dropdown-item" onclick='handleCandidateStatusSave(`<?= $my_job->id ?>`, `Withdrawn`)' <?= $my_job->status != "Applied" ? "disabled" : "" ?>>
                              Withdraw Application
                            </button>

                            <button class="dropdown-item" onclick='handleRate(`<?= $company->id ?>`, `<?= $company->name ?>`)'>
                              Rate
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </li>
                <?php endforeach; ?>
              </ul>

              <!-- <div class="row pagination-wrap justify-content-end">
            <div class="col-md-6 text-center text-md-right">
              <div class="custom-pagination ml-auto">
                <a href="#" class="prev">Prev</a>
                <div class="d-inline-block">
                  <a href="#" class="active">1</a>
                  <a href="#">2</a>
                  <a href="#">3</a>
                  <a href="#">4</a>
                </div>
                <a href="#" class="next">Next</a>
              </div>
            </div>
          </div> -->
            <?php else : ?>
              <h3 class="text-center">No Applied Yet</h3>
            <?php endif; ?>
          </div>
        </div>


      </div>
    </section>

    <?php if (!$LOGIN_USER) : ?>
      <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('<?= SERVER_NAME . "/public/assets/images/hero_1.jpg" ?>');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-8">
              <h2 class="text-white">Looking For A Job?</h2>
              <p class="mb-0 text-white lead">We Help To Get The Best Job And Find A Talent.</p>
            </div>
            <div class="col-md-3 ml-auto">
              <a href="javascript:void(0)" onclick="navigateSIgnUp()" class="btn btn-warning btn-block btn-lg">Sign Up</a>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>


  </div>

  <!-- SCRIPTS -->
  <?php include("../components/footer.php") ?>
  <script>
    function nl2br(str, is_xhtml) {
      var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
      return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }

    function handleRate(id, name) {
      swal.showLoading();

      getRateData(id).then((d) => {
        const rateData = $.parseJSON(d)

        let btnManagementStars = "";
        let btnWorkLifeStars = "";
        let btnSalaryStars = "";

        for (let i = 1; i <= 5; i++) {
          let managementWarning = rateData && Number(rateData.management) >= i ? "btn-warning" : "";
          let workLifeBalanceWarning = rateData && Number(rateData.work_life_balance) >= i ? "btn-warning" : "";
          let salaryWarning = rateData && Number(rateData.salary_benefits) >= i ? "btn-warning" : "";

          btnManagementStars += `
                <button type="button" class="btn-management-${id} btn btn-outline-secondary btn-lg mx-1 ${managementWarning}" data-attr="${i}" id="${id}-management-star-${i}">
                  <i class="bx bxs-star" aria-hidden="true"></i>
                </button>`;

          btnWorkLifeStars += `
                <button type="button" class="btn-work_life_balance-${id} btn btn-outline-secondary btn-lg mx-1 ${workLifeBalanceWarning}" data-attr="${i}" id="${id}-work_life_balance-star-${i}">
                  <i class="bx bxs-star" aria-hidden="true"></i>
                </button>`;

          btnSalaryStars += `
                <button type="button" class="btn-salary_benefits-${id} btn btn-outline-secondary btn-lg mx-1 ${salaryWarning}" data-attr="${i}" id="${id}-salary_benefits-star-${i}">
                  <i class="bx bxs-star" aria-hidden="true"></i>
                </button>`;

        }

        const rateHtml = `
            <input type="text" id="company_id_${id}" value="${id}" readonly hidden>
            <div class="row justify-content-center">
              <div class="form-group text-center mb-3" id="rating-ability-wrapper">
                <div class="text-start w-100">
                  <strong>Management</strong>

                  <div class="mt-2">
                    ${btnManagementStars}
                    <small class="bold rating-header">
                      <span class="management-rating-${id}">${rateData ? rateData.management : "0"}</span><small> / 5</small>
                    </small>
                  </div>
                </div>
                
                <input type="text" id="management${id}" value="${rateData ? rateData.management : ""}" name="management" hidden>
              </div>

              <div class="form-group text-center mb-3" id="rating-ability-wrapper">
                <div class="text-start w-100">
                  <strong>Work/ Life Balance</strong>

                  <div class="mt-2">
                    ${btnWorkLifeStars}
                    <small class="bold rating-header">
                      <span class="work_life_balance-rating-${id}">${rateData ? rateData.work_life_balance : "0"}</span><small> / 5</small>
                    </small>
                  </div>
                </div>
                
                <input type="text" id="work_life_balance${id}" value="${rateData ? rateData.work_life_balance : ""}" name="work_life_balance" hidden>
              </div>

              <div class="form-group text-center mb-3" id="rating-ability-wrapper">
                <div class="text-start w-100">
                  <strong>Salary/ Benefits</strong>

                  <div class="mt-2">
                    ${btnSalaryStars}
                    <small class="bold rating-header">
                      <span class="salary_benefits-rating-${id}">${rateData ? rateData.salary_benefits : "0"}</span><small> / 5</small>
                    </small>
                  </div>
                </div>
                
                <input type="text" id="salary_benefits${id}" value="${rateData ? rateData.salary_benefits : ""}" name="salary_benefits" hidden>
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="feedback" class="form-label">Feedback</label>
              <textarea class="form-control" id="feedback_${id}" name="feedback" rows="3" required>${rateData ? rateData.feedback : ""}</textarea>
            </div>`;

        swal.fire({
          title: `Rate ${name}`,
          html: rateHtml,
          confirmButtonText: "Submit",
          showDenyButton: true,
          denyButtonText: "Cancel",
          customClass: {
            htmlContainer: 'swal-custom-container',
          },
          allowOutsideClick: false,
          preConfirm: () => {
            if (!$(`#management${id}`).val() || !$(`#work_life_balance${id}`).val() || !$(`#salary_benefits${id}`).val()) {
              swal.showValidationMessage(`Please select rating`);
            } else if (!$(`#feedback_${id}`).val()) {
              swal.showValidationMessage(`Please add feedback`);
            } else {
              return true
            }
          }
        }).then((d) => {
          swal.close();
          swal.showLoading();

          if (d.isConfirmed) {
            const companyId = $(`#company_id_${id}`).val()
            const management = $(`#management${id}`).val()
            const work_life_balance = $(`#work_life_balance${id}`).val()
            const salary_benefits = $(`#salary_benefits${id}`).val()
            const feedback = $(`#feedback_${id}`).val()

            $.post(
              "<?= SERVER_NAME . "/backend/nodes?action=add_company_rating" ?>", {
                company_id: companyId,
                management: management,
                work_life_balance: work_life_balance,
                salary_benefits: salary_benefits,
                feedback: feedback
              },
              (data, status) => {
                const resp = $.parseJSON(data)

                swal.fire({
                  title: resp.success ? "Success" : "Error",
                  html: resp.message,
                  icon: resp.success ? "success" : "error",
                }).then(() => resp.success ? window.location.reload() : undefined)
              }
            )
          }
        })

        $(`.btn-management-${id}`).on('click', (function(e) {

          var previous_value = $(`#management${id}`).val();

          var selected_value = $(this).attr("data-attr");
          $(`#management${id}`).val(selected_value);

          $(`.management-rating-${id}`).empty();
          $(`.management-rating-${id}`).html(selected_value);

          for (i = 1; i <= selected_value; ++i) {
            $(`#${id}-management-star-${i}`).toggleClass('btn-warning');
          }

          for (ix = 1; ix <= previous_value; ++ix) {
            $(`#${id}-management-star-${ix}`).toggleClass('btn-warning');
          }
        }));

        $(`.btn-work_life_balance-${id}`).on('click', (function(e) {

          var previous_value = $(`#work_life_balance${id}`).val();

          var selected_value = $(this).attr("data-attr");
          $(`#work_life_balance${id}`).val(selected_value);

          $(`.work_life_balance-rating-${id}`).empty();
          $(`.work_life_balance-rating-${id}`).html(selected_value);

          for (i = 1; i <= selected_value; ++i) {
            $(`#${id}-work_life_balance-star-${i}`).toggleClass('btn-warning');
          }

          for (ix = 1; ix <= previous_value; ++ix) {
            $(`#${id}-work_life_balance-star-${ix}`).toggleClass('btn-warning');
          }
        }));

        $(`.btn-salary_benefits-${id}`).on('click', (function(e) {

          var previous_value = $(`#salary_benefits${id}`).val();

          var selected_value = $(this).attr("data-attr");
          $(`#salary_benefits${id}`).val(selected_value);

          $(`.salary_benefits-rating-${id}`).empty();
          $(`.salary_benefits-rating-${id}`).html(selected_value);

          for (i = 1; i <= selected_value; ++i) {
            $(`#${id}-salary_benefits-star-${i}`).toggleClass('btn-warning');
          }

          for (ix = 1; ix <= previous_value; ++ix) {
            $(`#${id}-salary_benefits-star-${ix}`).toggleClass('btn-warning');
          }
        }));
      })
    }

    async function getRateData(companyId) {
      return await $.post(
        "<?= SERVER_NAME . "/backend/nodes?action=get_company_rating" ?>", {
          company_id: companyId
        },
        (data, status) => {
          return $.parseJSON(data)
        }
      )
    }

    function handleCandidateStatusSave(candidateId, action) {
      swal.showLoading()
      $.post("<?= SERVER_NAME . "/backend/nodes?action=application_status_save" ?>", {
        candidate_id: candidateId,
        action: action
      }, (data, status) => {
        const resp = JSON.parse(data);

        swal.fire({
          title: resp.success ? "Success" : "Error",
          html: resp.message,
          icon: resp.success ? "success" : "error",
        }).then(() => resp.success ? window.location.reload() : undefined)

      });
    }
  </script>
</body>

</html>