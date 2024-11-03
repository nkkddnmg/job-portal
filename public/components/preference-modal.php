<?php
$id = null;
if (isset($_GET["t"])) {
  $id = $helpers->decrypt($_GET["t"]);
} else if ($user) {
  $id = $user->id;
} else {
  $id = $LOGIN_USER->id;
}
$job_preference = $helpers->select_all_individual("job_preference", "user_id='$id'");
?>
<div class="modal fade" id="modalTitle" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" id="form-add-titles" method="POST">
      <input type="text" name="token" value="<?= $_GET["t"] ?>" hidden readonly>
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Job title</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6> What are your desired job titles? </h6>
        <p>
          Reminder: All duplicate values will be merge as one after submission.
        </p>
        <div class="mb-2" id="titles">
          <?php
          if ($job_preference && $job_preference->job_title) :
            $jobTitles = json_decode($job_preference->job_title, true);
            for ($i = 0; $i < count($jobTitles); $i++) :
              if ($i == 0) :
          ?>
                <div class="row mb-1">
                  <div class="col-10">
                    <input type="text" name="title[]" class="form-control" value="<?= $jobTitles[$i] ?>" required>
                  </div>
                </div>
              <?php else : ?>
                <div class="row mb-1">
                  <div class="col-10">
                    <input type="text" name="title[]" class="form-control" value="<?= $jobTitles[$i] ?>" required>
                  </div>
                  <div class="col-2 d-flex align-items-center">
                    <button type="button" class="btn rounded-pill btn-icon btn-sm btn-outline-secondary">
                      <span class="tf-icons bx bx-x" onclick="handleRemoveTitle($(this))"></span>
                    </button>
                  </div>
                </div>
              <?php endif; ?>
            <?php endfor; ?>
          <?php else : ?>
            <div class="row mb-1">
              <div class="col-10">
                <input type="text" name="title[]" class="form-control" required>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <button type="button" class="btn btn-outline-primary btn-sm" id="btnAddTitle">
          <i class="bx bx-plus"></i>
          Add Another
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
          Cancel
        </button>
        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  $("#form-add-titles").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()
    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=add_title" ?>",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        const resp = $.parseJSON(data);
        swal.fire({
          title: resp.success ? "Success" : "Error",
          html: resp.message,
          icon: resp.success ? "success" : "error",
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

  function handleRemoveTitle(btnX) {
    btnX.parents().get(2).remove()
  }

  $("#btnAddTitle").on("click", function() {
    const titleEl = `
    <div class="row mb-1">
      <div class="col-10">
        <input type="text" name="title[]" class="form-control" required>
      </div>
      <div class="col-2 d-flex align-items-center">
        <button type="button" class="btn rounded-pill btn-icon btn-sm btn-outline-secondary">
          <span class="tf-icons bx bx-x" onclick="handleRemoveTitle($(this))"></span>
        </button>
      </div>
    </div>
    `;

    $("#titles").append(titleEl)
  })
</script>

<div class="modal fade" id="modalJobType" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" id="form-job-types" method="POST">
      <input type="text" name="token" value="<?= $_GET["t"] ?>" hidden readonly>
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Work Type</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6> What are your desired work setup? </h6>

        <?php
        $jobTypeList = array(
          "Full time",
          "Part time",
          "Permanent",
          "Fixed term",
          "Temporary"
        );
        foreach ($jobTypeList as $jobType) :
          $checkValue = "";
          if ($job_preference && $job_preference->job_types) {
            if (in_array($jobType, json_decode($job_preference->job_types, true))) {
              $checkValue = "checked";
            }
          }
        ?>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="job_type[]" value="<?= $jobType ?>" id="<?= strtolower(str_replace(" ", "_", $jobType)) ?>" <?= $checkValue ?>>
            <label class="form-check-label" for="<?= strtolower(str_replace(" ", "_", $jobType)) ?>">
              <?= $jobType ?>
            </label>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
          Cancel
        </button>
        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  $("#form-job-types").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()
    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=add_job_type" ?>",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        const resp = $.parseJSON(data);
        swal.fire({
          title: resp.success ? "Success" : "Error",
          html: resp.message,
          icon: resp.success ? "success" : "error",
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

<div class="modal fade" id="modalWorkSchedules" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" id="form-work-schedules" method="POST">
      <input type="text" name="token" value="<?= $_GET["t"] ?>" hidden readonly>
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Work schedules</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6> What are your desired schedules? </h6>

        <?php
        $workSchedules = array(
          "days" => array("Monday to Friday", "Holidays", "Weekends"),
          "shifts" => array(
            "8 hour shift",
            "10 hour shift",
            "12 hour shift",
            "12 hour shift",
            "Early shift",
            "Day shift",
            "Afternoon shift",
            "Evening shift",
            "Late shift",
            "Night shift",
            "Rotational shift",
            "Fixed shift"
          ),
          "schedules" => array("Flextime", "Overtime", "On call")
        );
        foreach ($workSchedules as $id => $val) :
        ?>
          <div class="form-label mt-2"><?= $id ?></div>
          <?php
          foreach ($val as $key => $schedules) :
            $checkValue = "";
            if ($job_preference && $job_preference->work_schedules) {
              $work_schedules = json_decode($job_preference->work_schedules, true);
              if (array_key_exists($id, $work_schedules)) {
                if (in_array($schedules, $work_schedules[$id])) {
                  $checkValue = "checked";
                }
              }
            }
          ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="<?= $id ?>[]" value="<?= $schedules ?>" id="<?= $id . "_" . $key ?>" <?= $checkValue ?>>
              <label class="form-check-label" for="<?= $id . "_" . $key ?>">
                <?= $schedules ?>
              </label>
            </div>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
          Cancel
        </button>
        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  $("#form-work-schedules").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()
    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=add_work_schedules" ?>",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        const resp = $.parseJSON(data);
        swal.fire({
          title: resp.success ? "Success" : "Error",
          html: resp.message,
          icon: resp.success ? "success" : "error",
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

<div class="modal fade" id="modalBasePay" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" id="form-base-pay" method="POST">
      <input type="text" name="token" value="<?= $_GET["t"] ?>" hidden readonly>
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Base pay</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6> What is the minimum pay you'll consider in your search? </h6>

        <div class="mb-3">

          <?php
          $min = "";
          $range = "";
          if ($job_preference && $job_preference->base_pay) {
            $explodedVal = explode(" per ",  $job_preference->base_pay);

            $min = $explodedVal[0];
            $range = "per $explodedVal[1]";
          }
          ?>

          <div class="row">
            <div class="col-md-8 col-sm-6">
              <label class="form-label">Minimum</label>
              <input type="text" name="min" id="min" value="<?= $min ?>" class="form-control">
            </div>

            <div class="col-md-4 col-sm-12">
              <label class="form-label">Range</label>
              <select class="form-select" name="range" id="range">
                <option value="" selected disabled></option>
                <?php
                $rangeList = array(
                  "per hour",
                  "per day",
                  "per week",
                  "per month",
                  "per year"
                );
                foreach ($rangeList as $rangeVal) :
                ?>
                  <option value="<?= $rangeVal ?>" <?= $helpers->is_selected($range, $rangeVal) ?>><?= $rangeVal ?></option>
                <?php endforeach; ?>

              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
          Cancel
        </button>
        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  $("#min").on("input", function(e) {
    $(this).val(function(index, value) {
      return value
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
  })

  $("#form-base-pay").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()
    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=add_base_pay" ?>",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        const resp = $.parseJSON(data);
        swal.fire({
          title: resp.success ? "Success" : "Error",
          html: resp.message,
          icon: resp.success ? "success" : "error",
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

<div class="modal fade" id="modalLocationType" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" id="form-location-type" method="POST">
      <input type="text" name="token" value="<?= $_GET["t"] ?>" hidden readonly>
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Work Setup</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6> Desired work setting </h6>
        <?php
        $locationTypeList = array(
          "On Site",
          "Remote (WFH)",
          "Hybrid"
        );
        foreach ($locationTypeList as $locationTypeVal) :
          $checkValue = "";
          if ($job_preference && $job_preference->location_type) {
            if (in_array($locationTypeVal, json_decode($job_preference->location_type, true))) {
              $checkValue = "checked";
            }
          }
        ?>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="location_type[]" value="<?= $locationTypeVal ?>" id="<?= strtolower(str_replace(" ", "_", $locationTypeVal)) ?>" <?= $checkValue ?>>
            <label class="form-check-label" for="<?= strtolower(str_replace(" ", "_", $locationTypeVal)) ?>">
              <?= $locationTypeVal ?>
            </label>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
          Cancel
        </button>
        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  $("#form-location-type").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()
    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=add_location_type" ?>",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        const resp = $.parseJSON(data);
        swal.fire({
          title: resp.success ? "Success" : "Error",
          html: resp.message,
          icon: resp.success ? "success" : "error",
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