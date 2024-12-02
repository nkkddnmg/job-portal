<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Interviews";
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
                <table id="interview-table" class="table table-striped nowrap">
                  <thead>
                    <tr>
                      <th>Applicant Name</th>
                      <th>Title</th>
                      <th>Job Type</th>
                      <th>Setup</th>
                      <th>Confirmation</th>
                      <th class="text-start">Date Applied</th>
                      <th class="text-start">Interview Date</th>
                      <th class="text-start">Interview Time</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $jobs = $helpers->select_all_with_params("job", "company_id='$LOGIN_USER->company_id'");
                    if (count($jobs) > 0) :
                      foreach ($jobs as $job) :
                        $applicants = $helpers->select_all_with_params("candidates", "job_id='$job->id' AND status='Interviewing'");

                        if (count($applicants) == 0) continue;

                        foreach ($applicants as $applicant) :
                          $btnDropDownId = "btn-dropdown-$job->id";
                          $post_interview_time = explode(" - ", $applicant->interview_time);

                          $time_from = date("h:i A", strtotime($post_interview_time[0]));
                          $time_to = date("h:i A", strtotime($post_interview_time[1]));

                          $from = date("H:i", strtotime($post_interview_time[0]));
                          $to = date("H:i", strtotime($post_interview_time[1]));

                          $confirmation = "No response yet";
                          $confirmationBadge = "secondary";

                          if ($applicant->invitation_confirmation) {
                            $confirmation = $applicant->invitation_confirmation;
                            $confirmationBadge = "success";
                          }

                          if ($confirmation == "no") {
                            $confirmationBadge = "danger";
                          }
                    ?>
                          <tr>
                            <td><?= $helpers->get_full_name($applicant->user_id); ?></td>
                            <td><?= $job->title ?></td>
                            <td><?= $job->type ?></td>
                            <td><?= $applicant->setup ?></td>
                            <td>
                              <span class="badge rounded-pill bg-<?= $confirmationBadge ?> px-4">
                                <?= $confirmation ?>
                              </span>
                            </td>
                            <td class="text-start"><?= date("Y-m-d H:i:s", strtotime($applicant->date_applied)) ?></td>
                            <td class="text-start"><?= date("Y-m-d", strtotime($applicant->interview_date)) ?></td>
                            <td><?= "$time_from - $time_to" ?></td>
                            <td>
                              <div class="dropdown">

                                <button class="btn btn-primary btn-sm" type="button" id="<?= $btnDropDownId ?>" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  More
                                </button>

                                <div class="dropdown-menu" aria-labelledby="<?= $btnDropDownId ?>" data-bs-popper="none">
                                  <?php if ($confirmation != "yes") : ?>
                                    <button type="button" class="dropdown-item" onclick='handleSetInterviewDate(`<?= $applicant->id ?>`, `<?= $applicant->user_id ?>`, `<?= $applicant->job_id ?>`, `<?= $applicant->setup ?>`, `<?= $applicant->interview_date ?>`, `<?= $from ?>`, `<?= $to ?>`)'>
                                      Update Interview
                                    </button>
                                  <?php endif; ?>

                                  <button type="button" class="dropdown-item" onclick='handleOpenModal(`<?= SERVER_NAME . "/public/views/preview-job?id=$job->id" ?>`)'>
                                    Preview Job
                                  </button>

                                  <button type="button" class="dropdown-item" onclick='handleOpenModal(`<?= SERVER_NAME . "/public/views/preview-profile?id=$applicant->user_id" ?>`)'>
                                    Preview Applicant Profile
                                  </button>

                                  <button type="button" class="dropdown-item" onclick='handleCandidateStatusSave(`<?= $applicant->id ?>`, `Hired`)'>
                                    Set Hired
                                  </button>

                                  <button type="button" class="dropdown-item" onclick='handleCandidateStatusSave(`<?= $applicant->id ?>`, `Not selected by employer`)'>
                                    Set Rejected
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

  <div class="modal fade" id="modalSetInterviewDate" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <form id="form-set-interview" class="modal-content">
        <input type="text" name="candidate_id" readonly hidden>
        <input type="text" name="applicant_id" readonly hidden>
        <input type="text" name="job_id" readonly hidden>

        <div class="modal-header">
          <h5 class="modal-title">Set Interview Date</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="interview_setup" class="form-label">Setup</label>
              <input type="text" id="interview_setup" name="setup" class="form-control" readonly required />
            </div>
          </div>

          <div class="row">
            <div class="col mb-3">
              <label for="interview_date" class="form-label">Date</label>
              <input type="date" id="interview_date" name="interview_date" class="form-control" min="<?= date("Y-m-d") ?>" placeholder="dd/mm/yyyy" required />
            </div>
          </div>

          <div class="divider">
            <div class="divider-text">Time</div>
          </div>

          <div class="row g-2">
            <div class="col mb-0">
              <label for="time_from" class="form-label">From</label>
              <input type="time" id="time_from" name="time_from" class="form-control" placeholder="hh:mm" required />
            </div>
            <div class="col mb-0">
              <label for="time_to" class="form-label">To</label>
              <input type="time" id="time_to" name="time_to" class="form-control" placeholder="hh:mm" required />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

</body>

<?php include("../components/footer.php") ?>

<script>
  function handleSetInterviewDate(candidateID, applicantID, jobID, setup, date, from, to) {
    $("input[name='candidate_id']").val(candidateID)
    $("input[name='applicant_id']").val(applicantID)
    $("input[name='job_id']").val(jobID)

    $("input[name='setup']").val(setup)
    $("input[name='interview_date']").val(date)
    $("input[name='time_from']").val(from)
    $("input[name='time_to']").val(to)

    $("#modalSetInterviewDate").modal("show")
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

  $("#time_from").on("blur", function(e) {
    $("#time_to").attr("min", e.target.value)
  })

  $("#form-set-interview").on("submit", function(e) {
    e.preventDefault();

    swal.showLoading()

    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=set_interview" ?>",
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
        }).then(() => resp.success ? window.location.reload() : undefined)
      },
      error: function(data) {
        swal.fire({
          title: 'Oops...',
          html: 'Something went wrong.',
          icon: 'error',
        })
      }
    });
  })

  function handleOpenModal(src) {
    $("#previewIframe").attr("src", src)
    $("#modalPreview").modal("show")
  }

  const interviewTableCols = [0, 1, 2, 3];
  const interviewTable = $("#interview-table").DataTable({
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
          columns: interviewTableCols
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
        columns: interviewTableCols
      },
      {
        extend: 'searchBuilder',
        config: {
          columns: interviewTableCols
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