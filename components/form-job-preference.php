<?php
$id = null;
if (isset($_GET["t"])) {
  $id = $helpers->decrypt($_GET["t"]);
} else if (isset($userData)) {
  $id = $userData->id;
} else {
  $id = $LOGIN_USER->id;
}
$job_preference = $helpers->select_all_individual("job_preference", "user_id='$id'");
?>
<div class="row">
  <div class="col-1">
    <i class='bx bxs-user'></i>
  </div>
  <div class="col-9">Job title</div>
  <?php if (isset($_GET["t"])) : ?>
    <div class="col-2">
      <a href="javascript:void(0)">
        <i class='bx bxs-edit-alt' style="font-size: 25px;" data-bs-toggle="modal" data-bs-target="#modalTitle"></i>
      </a>
    </div>
  <?php endif; ?>
</div>
<?php if ($job_preference && $job_preference->job_title) : ?>
  <div class="container mt-2">
    <ul>
      <?php
      foreach (json_decode($job_preference->job_title, true) as $title) {
        echo "<li>$title</li>";
      }
      ?>
    </ul>
  </div>
<?php endif; ?>
<hr>
<div class="row">
  <div class="col-1">
    <i class='bx bxs-briefcase'></i>
  </div>
  <div class="col-9">Work Setup</div>
  <?php if (isset($_GET["t"])) : ?>
    <div class="col-2">
      <a href="javascript:void(0)">
        <i class='bx bxs-edit-alt' style="font-size: 25px;" data-bs-toggle="modal" data-bs-target="#modalJobType"></i>
      </a>
    </div>
  <?php endif; ?>
</div>
<?php if ($job_preference && $job_preference->job_types) : ?>
  <div class="container mt-2">
    <ul>
      <?php
      foreach (json_decode($job_preference->job_types, true) as $job_type) {
        echo "<li>$job_type</li>";
      }
      ?>
    </ul>
  </div>
<?php endif; ?>
<hr>
<div class="row">
  <div class="col-1">
    <i class='bx bxs-time-five'></i>
  </div>
  <div class="col-9">Work schedules</div>
  <?php if (isset($_GET["t"])) : ?>
    <div class="col-2">
      <a href="javascript:void(0)">
        <i class='bx bxs-edit-alt' style="font-size: 25px;" data-bs-toggle="modal" data-bs-target="#modalWorkSchedules"></i>
      </a>
    </div>
  <?php endif; ?>
</div>
<?php if ($job_preference && $job_preference->work_schedules) : ?>
  <div class="container mt-2">
    <?php foreach (json_decode($job_preference->work_schedules, true) as $header => $work_schedules) : ?>
      <span class="h6" style="padding-left: 1rem;"><?= ucfirst($header) ?></span>
      <ul>
        <?php
        foreach ($work_schedules as $schedule) {
          echo "<li>$schedule</li>";
        } ?>
      </ul>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
<hr>
<div class="row">
  <div class="col-1">
    <i class='bx bx-money'></i>
  </div>
  <div class="col-9">Base pay</div>
  <?php if (isset($_GET["t"])) : ?>
    <div class="col-2">
      <a href="javascript:void(0)">
        <i class='bx bxs-edit-alt' style="font-size: 25px;" data-bs-toggle="modal" data-bs-target="#modalBasePay"></i>
      </a>
    </div>
  <?php endif; ?>
</div>
<?php if ($job_preference && $job_preference->base_pay) : ?>
  <div class="container mt-2">
    <ul>
      <li><?= $job_preference->base_pay ?></li>
    </ul>
  </div>
<?php endif; ?>
<hr>
<div class="row">
  <div class="col-1">
    <i class='bx bxs-home'></i>
  </div>
  <div class="col-9">Location types</div>
  <?php if (isset($_GET["t"])) : ?>
    <div class="col-2">
      <a href="javascript:void(0)">
        <i class='bx bxs-edit-alt' style="font-size: 25px;" data-bs-toggle="modal" data-bs-target="#modalLocationType"></i>
      </a>
    </div>
  <?php endif; ?>
</div>
<?php if ($job_preference && $job_preference->location_type) : ?>
  <div class="container mt-2">
    <ul>
      <?php
      foreach (json_decode($job_preference->location_type, true) as $location_type) {
        echo "<li>$location_type</li>";
      }
      ?>
    </ul>
  </div>
<?php endif; ?>
<?php if (isset($_GET["t"])) : ?>
  <hr>
  <a href="<?= SERVER_NAME . "/public/views/profile" ?>" class="btn btn-secondary float-end mt-4">
    Go back
  </a>
<?php endif; ?>