<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Hired";
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<?= head($pageName) ?>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include("../components/sidebar.php") ?>

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php include("../components/navbar.php") ?>
        <!-- / Navbar -->

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
              <div class="col-6">
                <h4 class="fw-bold py-3 mb-4">
                  <span class="text-muted fw-light"><?= $pageName ?></span>
                </h4>
              </div>
            </div>

            <div class="card">
              <div class="card-body">

                <table id="hired-table" class="table table-striped nowrap">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Job Type</th>
                      <th>Applicant Name</th>
                      <th class="text-start">Date Applied</th>
                      <th class="text-start">Hired Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $jobs = $helpers->select_all_with_params("job", "company_id='$LOGIN_USER->company_id'");
                    if (count($jobs) > 0) :
                      foreach ($jobs as $job) :
                        $applicants = $helpers->select_all_with_params("candidates", "job_id='$job->id' AND status='Hired'");

                        if (count($applicants) == 0) continue;

                        foreach ($applicants as $applicant) :
                          $btnDropDownId = "btn-dropdown-$job->id";
                          $post_interview_time = explode(" - ", $applicant->interview_time);

                          $time_from = date("h:i A", strtotime($post_interview_time[0]));
                          $time_to = date("h:i A", strtotime($post_interview_time[1]));
                    ?>
                          <tr>
                            <td><?= $job->title ?></td>
                            <td><?= $job->type ?></td>
                            <td><?= $helpers->get_full_name($applicant->user_id); ?></td>
                            <td class="text-start"><?= date("Y-m-d H:i:s", strtotime($applicant->date_applied)) ?></td>
                            <td class="text-start"><?= date("Y-m-d H:i:s", strtotime($applicant->date_modified)) ?></td>
                            <td>
                              <div class="dropdown">

                                <button class="btn btn-default rounded-circle" type="button" id="<?= $btnDropDownId ?>" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class='bx bx-dots-vertical-rounded' data-bs-toggle="tooltip" data-placement="top" title="More"></i>
                                </button>

                                <div class="dropdown-menu" aria-labelledby="<?= $btnDropDownId ?>" data-bs-popper="none">
                                  <button type="button" class="dropdown-item" onclick='handleOpenModal(`<?= SERVER_NAME . "/public/views/preview-job?id=$job->id" ?>`)'>
                                    Preview Job
                                  </button>

                                  <button type="button" class="dropdown-item" onclick='handleOpenModal(`<?= SERVER_NAME . "/public/views/preview-profile?id=$applicant->user_id" ?>`)'>
                                    Preview Applicant Profile
                                  </button>

                                  <button type="button" class="dropdown-item" onclick='handleRate(`<?= $applicant->user_id ?>`, `<?= $helpers->get_full_name($applicant->user_id) ?>`)'>
                                    Rate
                                  </button>
                                </div>
                              </div>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>

                </table>
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

  <div class="modal fade" id="modalPreview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content" style="height:90vh">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3" style="height: 100%">
              <iframe src="" id="previewIframe" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px" height="100%" width="100%"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

</body>

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

      let btnStars = "";

      for (let i = 1; i <= 5; i++) {
        let btnWarning = "";

        if (rateData && Number(rateData.stars) >= i) {
          btnWarning = "btn-warning";
        }

        btnStars += `
                <button type="button" class="btn-rating-${id} btn btn-outline-secondary btn-lg mx-2 ${btnWarning}" data-attr="${i}" id="${id}-rating-star-${i}">
                  <i class="bx bxs-star" aria-hidden="true"></i>
                </button>`
      }

      const rateHtml = `
            <input type="text" id="applicant_id_${id}" value="${id}" readonly hidden>
            <div class="row">
              <div class="form-group text-center mb-3" id="rating-ability-wrapper">
                <input type="text" id="selected_rating_${id}" value="${rateData ? rateData.stars : ""}" name="rating" hidden>
                <h2 class="bold rating-header">
                  <span class="selected-rating-${id}">${rateData ? rateData.stars : "0"}</span><small> / 5</small>
                </h2>
                ${btnStars}
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
        preConfirm: () => {
          if (!$(`#selected_rating_${id}`).val()) {
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
          const applicantId = $(`#applicant_id_${id}`).val()
          const rating = $(`#selected_rating_${id}`).val()
          const feedback = $(`#feedback_${id}`).val()

          $.post(
            "<?= SERVER_NAME . "/backend/nodes?action=add_rating" ?>", {
              applicantId: applicantId,
              rating: rating,
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

      $(`.btn-rating-${id}`).on('click', (function(e) {

        var previous_value = $(`#selected_rating_${id}`).val();

        var selected_value = $(this).attr("data-attr");
        $(`#selected_rating_${id}`).val(selected_value);

        $(`.selected-rating-${id}`).empty();
        $(`.selected-rating-${id}`).html(selected_value);

        for (i = 1; i <= selected_value; ++i) {
          $(`#${id}-rating-star-${i}`).toggleClass('btn-warning');
        }

        for (ix = 1; ix <= previous_value; ++ix) {
          $(`#${id}-rating-star-${ix}`).toggleClass('btn-warning');
        }
      }));
    })
  }

  async function getRateData(applicantId) {
    return await $.post(
      "<?= SERVER_NAME . "/backend/nodes?action=get_rating" ?>", {
        applicantId: applicantId
      },
      (data, status) => {
        return $.parseJSON(data)
      }
    )
  }

  function handleOpenModal(src) {
    $("#previewIframe").attr("src", src)
    $("#modalPreview").modal("show")
  }

  const hiredTableCols = [0, 1, 2, 3];
  const hiredTable = $("#hired-table").DataTable({
    paging: true,
    lengthChange: true,
    ordering: false,
    info: true,
    autoWidth: false,
    responsive: true,
    language: {
      searchBuilder: {
        button: 'Filter',
      }
    },
    buttons: [{
        extend: 'print',
        title: '',
        exportOptions: {
          columns: hiredTableCols
        },
        customize: function(win) {
          $(win.document.body)
            .css('font-size', '10pt')

          $(win.document.body)
            .find('table')
            .addClass('compact')
            .css('font-size', 'inherit');
        }
      },
      {
        extend: 'colvis',
        text: "Columns",
        columns: hiredTableCols
      },
      {
        extend: 'searchBuilder',
        config: {
          columns: hiredTableCols
        }
      }
    ],
    dom: `
      <'row'
      <'col-md-4 d-flex my-2 justify-content-start'B>
      <'col-md-4 d-flex my-2 justify-content-center'l>
      <'col-md-4 d-flex my-2 justify-content-md-end justify-content-sm-center'f>
      >
      <'row'<'col-12'tr>>
      <'row'
      <'col-md-6 col-sm-12'i>
      <'col-md-6 col-sm-12 d-flex justify-content-end'p>
      >
      `,
  });
</script>

</html>