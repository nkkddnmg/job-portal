<?php
session_start();
date_default_timezone_set("Asia/Manila");

include(__DIR__ . "/helpers.php");
include(__DIR__ . "/ClassSendEmail.php");

try {
  $host = "localhost";
  $user = "root";
  $password = "";
  $db = "job_portal";

  $conn = new mysqli($host, $user, $password, $db);
  $helpers = new Helpers($conn, $_SESSION);

  if (isset($_GET["action"])) {

    switch ($_GET["action"]) {
      case "add_admin":
        add_admin();
        break;
      case "change_password":
        change_password();
        break;
      case "delete_profile":
        delete_profile();
        break;
      case "delete_data":
        delete_data();
        break;
      case "profile_save":
        profile_save();
        break;
      case "save_profile_image":
        save_profile_image();
        break;
      case "logout":
        logout();
        break;
      case "register":
        registration();
        break;
      case "login":
        login();
        break;
      case "verify_account":
        verify_account();
        break;
      case "check_verification_status":
        check_verification_status();
        break;
      case "get_all_companies":
        get_all_companies();
        break;
      case "register_company":
        register_company();
        break;
      case "save_company_image":
        save_company_image();
        break;
      case "company_save":
        company_save();
        break;
      case "verify_company":
        verify_company();
        break;
      case "save_industry":
        save_industry();
        break;
      case "add_education":
        add_education();
        break;
      case "edit_education":
        edit_education();
        break;
      case "add_work_experience":
        add_work_experience();
        break;
      case "edit_work_experience":
        edit_work_experience();
        break;
      case "add_skills":
        add_skills();
        break;
      case "get_all_skills":
        get_all_skills();
        break;
      case "add_job":
        add_job();
        break;
      case "job_status_save":
        job_status_save();
        break;
      case "update_job":
        update_job();
        break;
      case "applicant_apply":
        applicant_apply();
        break;
      case "set_interview":
        set_interview();
        break;
      case "application_status_save":
        application_status_save();
        break;
      case "add_search_keyword":
        add_search_keyword();
        break;
      case "add_title":
        add_title();
        break;
      case "add_job_type":
        add_job_type();
        break;
      case "add_work_schedules":
        add_work_schedules();
        break;
      case "add_base_pay":
        add_base_pay();
        break;
      case "add_location_type":
        add_location_type();
        break;
      case "add_rating":
        add_rating();
        break;
      case "get_rating":
        get_rating();
        break;
      case "get_all_ratings":
        get_all_ratings();
        break;
      case "validate_otp":
        validate_otp();
        break;
      default:
        $response["success"] = false;
        $response["message"] = "Case action not found!";

        null;
        $helpers->return_response($response);
    }
  }
} catch (Exception $e) {
  $response["success"] = false;
  $response["message"] = $e->getMessage();
  $helpers->return_response($response);
}

function sendEmail($email, $body, $name, $subject)
{
  $sendSmtp = new SendEmail($email, $body, $name, $subject);

  $success = $sendSmtp->response["success"];
  $message = $sendSmtp->response["message"];
}

function validate_otp()
{
  global $helpers, $_POST, $conn;

  $otp = $_POST["otp"];
  $id = $helpers->decrypt($_POST["token"]);

  $checkOtp = $helpers->select_all_with_params("otp", "otp='$otp'");

  if (count($checkOtp) > 0) {
    $comm = $conn->query("DELETE FROM otp WHERE user_id='$id'");

    if ($comm) {
      $response["success"] = true;
      $response["message"] = "Email verified successfully.";
    } else {
      $response["success"] = false;
      $response["message"] = $conn->error;
    }
  } else {
    $response["success"] = false;
    $response["message"] = "One time password (OTP) not match";
  }

  $helpers->return_response($response);
}

function get_all_ratings()
{
  global $helpers, $_POST;

  $user_id = $_POST["user_id"];

  $rateRes = $helpers->select_all_with_params("ratings", "user_id='$user_id'");

  $helpers->return_response($rateRes);
}

function get_rating()
{
  global $helpers, $_SESSION, $_POST;

  $rated_by = $_SESSION["id"];
  $applicantId = $_POST["applicantId"];

  $rateRes = $helpers->select_all_individual("ratings", "user_id='$applicantId' AND rated_by='$rated_by'");

  $helpers->return_response($rateRes ?  $rateRes : null);
}

function add_rating()
{
  global $helpers, $_SESSION, $_POST, $conn;

  $rated_by = $_SESSION["id"];
  $applicantId = $_POST["applicantId"];
  $rating = $_POST["rating"];
  $feedback = $_POST["feedback"];

  $comm = null;
  $action = "added";

  $rateRes = $helpers->select_all_individual("ratings", "user_id='$applicantId' AND rated_by='$rated_by'");

  if ($rateRes) {
    $comm = $conn->query("UPDATE ratings SET stars='$rating', feedback='$feedback' WHERE user_id='$applicantId' AND rated_by='$rated_by'");
    $action = "updated";
  } else {
    $rateData = array(
      "user_id" =>  $applicantId,
      "rated_by" => $rated_by,
      "stars" => $rating,
      "feedback" => $feedback,
    );
    $comm = $helpers->insert("ratings", $rateData);
    $action = "added";
  }

  if ($comm) {
    $response["success"] = true;
    $response["message"] = "Ratings successfully $action";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);

  $helpers->return_response($_POST);
}

function add_location_type()
{
  global $helpers, $_POST, $conn;

  $id = $helpers->decrypt($_POST["token"]);
  $location_type = isset($_POST["location_type"]) ? $helpers->array_unique_custom($_POST["location_type"]) : null;

  $preference = array(
    "user_id" => $id,
    "location_type" => $location_type ? json_encode($location_type) : "set_null"
  );

  $comm = null;
  $action = "added";

  $preferenceData = $helpers->select_all_individual("job_preference", "user_id='$id'");

  if ($preferenceData) {
    if ($preferenceData->location_type) {
      $action = "updated";
    } else {
      $action = "added";
    }
    $comm = $helpers->update("job_preference", $preference, "user_id", $id);
  } else {
    $comm = $helpers->insert("job_preference", $preference);
    $action = "added";
  }

  if ($comm) {
    $response["success"] = true;
    $response["message"] = "Job types successfully $action";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function add_base_pay()
{
  global $helpers, $_POST, $conn;

  $id = $helpers->decrypt($_POST["token"]);
  $min = isset($_POST["min"]) ? doubleval(str_replace(",", "", $_POST["min"])) : null;
  $range = isset($_POST["range"]) ? $_POST["range"] : null;

  $basePay =  $min && $range ? (number_format($min, 0, "", ",") . " $range") : null;

  $preference = array(
    "user_id" => $id,
    "base_pay" => $basePay ? $basePay : "set_null"
  );

  $comm = null;
  $action = "added";

  $preferenceData = $helpers->select_all_individual("job_preference", "user_id='$id'");

  if ($preferenceData) {
    if ($preferenceData->base_pay) {
      $action = "updated";
    } else {
      $action = "added";
    }
    $comm = $helpers->update("job_preference", $preference, "user_id", $id);
  } else {
    $comm = $helpers->insert("job_preference", $preference);
    $action = "added";
  }

  if ($comm) {
    $response["success"] = true;
    $response["message"] = "Base pay successfully $action";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function add_work_schedules()
{
  global $helpers, $_POST, $conn;

  $id = $helpers->decrypt($_POST["token"]);

  $days = isset($_POST["days"]) ? $_POST["days"] : null;
  $shifts = isset($_POST["shifts"]) ? $_POST["shifts"] : null;
  $schedules = isset($_POST["schedules"]) ? $_POST["schedules"] : null;

  $work_schedules = array();

  if ($days) $work_schedules["days"] = $days;
  if ($shifts) $work_schedules["shifts"] = $shifts;
  if ($schedules) $work_schedules["schedules"] = $schedules;

  $preference = array(
    "user_id" => $id,
    "work_schedules" => count($work_schedules) > 0 ? json_encode($work_schedules) : "set_null"
  );

  $comm = null;
  $action = "added";

  $preferenceData = $helpers->select_all_individual("job_preference", "user_id='$id'");

  if ($preferenceData) {
    if ($preferenceData->work_schedules) {
      $action = "updated";
    } else {
      $action = "added";
    }
    $comm = $helpers->update("job_preference", $preference, "user_id", $id);
  } else {
    $comm = $helpers->insert("job_preference", $preference);
    $action = "added";
  }

  if ($comm) {
    $response["success"] = true;
    $response["message"] = "Work schedules successfully $action";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function add_job_type()
{
  global $helpers, $_POST, $conn;

  $id = $helpers->decrypt($_POST["token"]);
  $job_type = isset($_POST["job_type"]) ? $helpers->array_unique_custom($_POST["job_type"]) : null;

  $preference = array(
    "user_id" => $id,
    "job_types" => $job_type ? json_encode($job_type) : "set_null"
  );

  $comm = null;
  $action = "added";

  $preferenceData = $helpers->select_all_individual("job_preference", "user_id='$id'");

  if ($preferenceData) {
    if ($preferenceData->job_types) {
      $action = "updated";
    } else {
      $action = "added";
    }
    $comm = $helpers->update("job_preference", $preference, "user_id", $id);
  } else {
    $comm = $helpers->insert("job_preference", $preference);
    $action = "added";
  }

  if ($comm) {
    $response["success"] = true;
    $response["message"] = "Job types successfully $action";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function add_title()
{
  global $helpers, $_POST, $conn;

  $id = $helpers->decrypt($_POST["token"]);
  $titles = $helpers->array_unique_custom($_POST["title"]);

  $preference = array(
    "user_id" => $id,
    "job_title" => json_encode($titles)
  );

  $comm = null;
  $action = "added";
  $preferenceData = $helpers->select_all_individual("job_preference", "user_id='$id'");

  if ($preferenceData) {
    if ($preferenceData->job_title) {
      $action = "updated";
    } else {
      $action = "added";
    }
    $comm = $helpers->update("job_preference", $preference, "user_id", $id);
  } else {
    $comm = $helpers->insert("job_preference", $preference);
    $action = "added";
  }

  if ($comm) {
    $response["success"] = true;
    $response["message"] = "Job titles successfully $action";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function add_search_keyword()
{
  global $helpers, $_POST, $conn;

  $keyword = $_POST["keyword"];
  $job_type = $_POST["job_type"];

  $keywordData = array(
    "keywords" => $keyword
  );

  $inData = $helpers->insert("search_keywords", $keywordData);

  $response["link"] = SERVER_NAME . "/public/views/job-listing?k=$keyword" . ($job_type ? "&&j=$job_type" : "");

  $helpers->return_response($response);
}

function application_status_save()
{
  global $helpers, $_POST, $conn;

  $candidate_id = $_POST["candidate_id"];
  $action = $_POST["action"];

  $data = array("status" => $action);

  if ($action == "Hired") {
    $data["date_hired"] = date("Y-m-d H:i:s");
  }

  if ($action == "Terminated" || $action == "Resigned") {
    $data["date_separated"] = date("Y-m-d H:i:s");
  }

  $updateJobStatus = $helpers->update("candidates", $data, "id", $candidate_id);

  if ($updateJobStatus) {
    $response["success"] = true;

    if ($action == "Hired") {
      $response["message"] = "Applicant successfully hired";
    } else if ($action == "Not selected by employer") {
      $response["message"] = "Applicant successfully set to Not Selected";
    } else if ($action == "Withdrawn") {
      $response["message"] = "Application successfully withdrawn";
    } else if ($action == "Terminated") {
      $response["message"] = "Employee successfully terminated";
    } else if ($action == "Resigned") {
      $response["message"] = "Employee successfully resigned";
    }
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function set_interview()
{
  global $helpers, $_POST, $conn;

  $candidate_id = $_POST["candidate_id"];

  $interview_date = $_POST["interview_date"];
  $time_from = $_POST["time_from"];
  $time_to = $_POST["time_to"];

  $candidateData = array(
    "status" => "Interviewing",
    "interview_date" => "$interview_date",
    "interview_time" => "$time_from - $time_to"
  );

  $candidate_id = $helpers->update("candidates", $candidateData, "id", $candidate_id);

  if ($candidate_id) {
    $response["success"] = true;
    $response["message"] = "Interview date set successfully";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function applicant_apply()
{
  global $helpers, $_POST, $conn;

  $job_id = $_POST["job_id"];
  $user_id = $_POST["user_id"];

  $candidateData = array(
    "user_id" => $user_id,
    "job_id" => $job_id,
    "status" => "Applied"
  );

  $candidate_id = $helpers->insert("candidates", $candidateData);

  if ($candidate_id) {
    $response["success"] = true;
    $response["message"] = "Applied Successfully";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function update_job()
{
  global $helpers, $_POST, $conn;

  $job_id = $_POST["job_id"];

  $title = $_POST["title"];
  $job_type = $_POST["job_type"];
  $experience_level = $_POST["experience_level"];
  $location_type = $_POST["location_type"];
  $schedule = $_POST["schedule"];

  $min = doubleval(str_replace(",", "", $_POST["min"]));
  $max = doubleval(str_replace(",", "", $_POST["max"]));
  $range = $_POST["range"];
  $benefits = $_POST["benefits"];

  $post_qualifications = $_POST["qualifications"];
  $post_experience = isset($_POST["experience"]) ? $_POST["experience"] : null;

  $pay = (number_format($min, 2, ".", ",") . " - " . number_format($max, 2, ".", ",") . " $range");

  $description = $_POST["description"];

  for ($i = 0; $i < count($post_qualifications); $i++) {
    $qualification = $post_qualifications[$i];

    if (!is_numeric($qualification)) {
      $skillData = $helpers->select_all_individual("skills_list", "LOWER(name)=LOWER('$qualification')");

      if (!$skillData) {
        $skill_id = $helpers->insert("skills_list", array("name" => ucwords($qualification)));

        $post_qualifications[$i] = $skill_id;
      }
    } else {
      $post_qualifications[$i] = intval($qualification);
    }
  }

  if ($post_experience) {
    for ($i = 0; $i < count($post_experience); $i++) {
      $experience = $post_experience[$i];

      if (!is_numeric($experience)) {
        $experienceData = $helpers->select_all_individual("experience_list", "LOWER(name)=LOWER('$experience')");

        if (!$experienceData) {
          $experience_id = $helpers->insert("experience_list", array("name" => ucwords($experience)));

          $post_experience[$i] = $experience_id;
        } else {
          $post_experience[$i] = intval($experienceData->id);
        }
      } else {
        $post_experience[$i] = intval($experience);
      }
    }
  }

  $jobPostData = array(
    "title" => ucwords($title),
    "type" => $job_type,
    "experience_level" => $experience_level,
    "location_type" => $location_type,
    "schedule" => json_encode($schedule),
    "description" => nl2br($description),
    "pay" => $pay,
    "benefits" => json_encode($benefits),
    "qualifications" => json_encode($post_qualifications),
    "experience" => json_encode($post_experience),
    "status" => "active"
  );

  $job_id = $helpers->update("job", $jobPostData, "id", $job_id);

  if ($job_id) {
    $response["success"] = true;
    $response["message"] = "Job Updated Successfully";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function job_status_save()
{
  global $helpers, $_POST, $conn;

  $job_id = $_POST["job_id"];
  $action = $_POST["action"];

  $updateJobStatus = $helpers->update("job", array("status" => $action), "id", $job_id);

  if ($updateJobStatus) {
    $response["success"] = true;
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function add_job()
{
  global $helpers, $_POST, $conn;

  $company_id = $_POST["company_id"];

  $title = $_POST["title"];
  $job_type = $_POST["job_type"];
  $experience_level = $_POST["experience_level"];
  $location_type = $_POST["location_type"];
  $schedule = $_POST["schedule"];

  $min = doubleval(str_replace(",", "", $_POST["min"]));
  $max = doubleval(str_replace(",", "", $_POST["max"]));
  $range = $_POST["range"];
  $benefits = $_POST["benefits"];

  $post_qualifications = $_POST["qualifications"];
  $post_experience = isset($_POST["experience"]) ? $_POST["experience"] : null;

  $pay = (number_format($min, 2, ".", ",") . " - " . number_format($max, 2, ".", ",") . " $range");

  $description = $_POST["description"];

  for ($i = 0; $i < count($post_qualifications); $i++) {
    $qualification = $post_qualifications[$i];

    if (!is_numeric($qualification)) {
      $skillData = $helpers->select_all_individual("skills_list", "LOWER(name)=LOWER('$qualification')");

      if (!$skillData) {
        $skill_id = $helpers->insert("skills_list", array("name" => ucwords($qualification)));

        $post_qualifications[$i] = $skill_id;
      }
    } else {
      $post_qualifications[$i] = intval($qualification);
    }
  }

  if ($post_experience) {
    for ($i = 0; $i < count($post_experience); $i++) {
      $experience = $post_experience[$i];

      if (!is_numeric($experience)) {
        $experienceData = $helpers->select_all_individual("experience_list", "LOWER(name)=LOWER('$experience')");

        if (!$experienceData) {
          $experience_id = $helpers->insert("experience_list", array("name" => ucwords($experience)));

          $post_experience[$i] = $experience_id;
        } else {
          $post_experience[$i] = intval($experienceData->id);
        }
      } else {
        $post_experience[$i] = intval($experience);
      }
    }
  }

  $jobPostData = array(
    "company_id" => $company_id,
    "title" => ucwords($title),
    "type" => $job_type,
    "experience_level" => $experience_level,
    "location_type" => $location_type,
    "schedule" => json_encode($schedule),
    "description" => nl2br($description),
    "pay" => $pay,
    "benefits" => json_encode($benefits),
    "qualifications" => json_encode($post_qualifications),
    "experience" => json_encode($post_experience),
    "status" => "active"
  );

  $job_id = $helpers->insert("job", $jobPostData);

  if ($job_id) {
    $response["success"] = true;
    $response["message"] = "Job Posted Successfully";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function get_all_skills()
{
  global $helpers, $_GET;

  $params = isset($_GET["s"]) ? "LOWER(name) LIKE LOWER('%$_GET[s]%') " : "";

  $skills_list = $helpers->select_all_with_params("skills_list", "$params ");

  $data = array();

  if (count($skills_list) > 0) {
    foreach ($skills_list as $skill) {
      array_push(
        $data,
        array(
          "id" => $skill->id,
          "name" => $skill->name,
        )
      );
    }
  }

  $helpers->return_response($data);
}

function add_skills()
{
  global $helpers, $_POST, $conn;

  $skill_id = isset($_POST["skill_id"]) ? $_POST["skill_id"] : null;
  $token = $_POST["token"];
  $skill = isset($_POST["skill_name"]) ? $_POST["skill_name"] : null;

  if (!$skill_id) {
    $skillData = $helpers->select_all_individual("skills_list", "LOWER(name)=LOWER('$skill')");

    if (!$skillData) {
      $skill_id = $helpers->insert("skills_list", array("name" => ucwords($skill)));
    }
  }

  $applicantSkillData = array(
    "user_id" => $helpers->decrypt($token),
    "skill_id" => $skill_id
  );

  $applicationId = $helpers->insert("applicant_skills", $applicantSkillData);

  if ($applicationId) {
    $response["success"] = true;
    $response["message"] = "Skill successfully added";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function edit_work_experience()
{
  global $helpers, $_POST, $conn;

  $user_id = $helpers->decrypt($_POST["token"]);
  $company_id = $_POST["company_id"];
  $industry_id = $_POST["industry_id"];
  $work_experience_id = $_POST["work_experience_id"];

  $job_title = $_POST["job_title"];

  $company_name = $_POST["company_name"];

  $currently_working = isset($_POST["currently_working"]) ? $_POST["currently_working"] : null;

  $work_from_month = $_POST["work_from_month"];
  $work_from_year = $_POST["work_from_year"];

  $work_to_month = isset($_POST["work_to_month"]) ? $_POST["work_to_month"] : null;
  $work_to_year = isset($_POST["work_to_year"]) ? $_POST["work_to_year"] : null;

  $work_from = "$work_from_month $work_from_year";
  $work_to = $currently_working ? $currently_working : "$work_to_month $work_to_year";

  if (empty($company_id)) {
    $companyData = array(
      "name" => $company_name
    );

    $company_id = $helpers->insert("company", $companyData);
  }

  $workExpData = array(
    "user_id" => $user_id,
    "job_title" => ucwords($job_title),
    "company_id" => $company_id,
    "industry_id" => $industry_id,
    "work_from" => $work_from,
    "work_to" => $work_to
  );

  $updateWorkExp = $helpers->update("work_experience", $workExpData, "id", $work_experience_id);

  if ($updateWorkExp) {
    $response["success"] = true;
    $response["message"] = "Work Experience successfully updated";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function add_work_experience()
{
  global $helpers, $_POST, $conn;

  $id = $helpers->decrypt($_POST["token"]);

  $job_title = $_POST["job_title"];

  $company_id = $_POST["company_id"];
  $industry_id = $_POST["industry_id"];
  $company_name = $_POST["company_name"];

  $currently_working = isset($_POST["currently_working"]) ? $_POST["currently_working"] : null;

  $work_from_month = $_POST["work_from_month"];
  $work_from_year = $_POST["work_from_year"];

  $work_to_month = isset($_POST["work_to_month"]) ? $_POST["work_to_month"] : null;
  $work_to_year = isset($_POST["work_to_year"]) ? $_POST["work_to_year"] : null;

  $work_from = "$work_from_month $work_from_year";
  $work_to = $currently_working ? $currently_working : "$work_to_month $work_to_year";

  if (empty($company_id)) {
    $companyData = array(
      "name" => $company_name
    );

    $company_id = $helpers->insert("company", $companyData);
  }

  $workExpData = array(
    "user_id" => $id,
    "job_title" => ucwords($job_title),
    "company_id" => $company_id,
    "industry_id" => $industry_id,
    "work_from" => $work_from,
    "work_to" => $work_to
  );

  $workExpID = $helpers->insert("work_experience", $workExpData);

  if ($workExpID) {
    $response["success"] = true;
    $response["message"] = "Work Experience successfully added";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function edit_education()
{
  global $helpers, $_POST, $conn;

  $id = $_POST['id'];

  $user_id = $helpers->decrypt($_POST["token"]);
  $attainment = $_POST["attainment"];
  $course = empty($_POST["course"]) ? "set_null" : ucwords($_POST["course"]);
  $school_name = ucwords($_POST["school_name"]);
  $school_year = $_POST["school_year"];

  $educationData = array(
    "user_id" => $user_id,
    "attainment_id" => $attainment,
    "course" => $course,
    "school_name" => $school_name,
    "sy" => $school_year
  );

  $education_id = $helpers->update("education", $educationData, "id", $id);

  if ($education_id) {
    $response["success"] = true;
    $response["message"] = "Education added updated";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function add_education()
{
  global $helpers, $_POST, $conn;

  $id = $helpers->decrypt($_POST["token"]);
  $attainment = $_POST["attainment"];
  $course = empty($_POST["course"]) ? "set_null" : ucwords($_POST["course"]);
  $school_name = ucwords($_POST["school_name"]);
  $school_year = $_POST["school_year"];

  $educationData = array(
    "user_id" => $id,
    "attainment_id" => $attainment,
    "course" => $course,
    "school_name" => $school_name,
    "sy" => $school_year
  );

  $education_id = $helpers->insert("education", $educationData);

  if ($education_id) {
    $response["success"] = true;
    $response["message"] = "Education added successfully";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function save_industry()
{
  global $helpers, $_POST, $conn;

  $action = $_POST["action"];
  $name = $_POST["name"];
  $params = isset($_POST["id"]) ? " AND id <> '$_POST[id]'" : "";

  $lowerName = strtolower($name);
  $getIndustry = $helpers->select_all_with_params("industries", "LOWER(name) = '$lowerName' $params");

  if (count($getIndustry) == 0) {
    $comm = null;
    $message = "";

    if ($action == "insert") {
      $insertData = array(
        "name" => ucwords($name)
      );

      $comm = $helpers->insert("industries", $insertData);
      $message = "Industry successfully added";
    } else if ($action == "update") {
      $updateData = array(
        "name" => ucwords($name)
      );

      $comm = $helpers->update("industries", $updateData, "id", $_POST['id']);
      $message = "Industry successfully updated";
    } else {
      $response["success"] = false;
      $response["message"] = "Action not found";
    }

    if ($comm) {
      $response["success"] = true;
      $response["message"] = $message;
    } else {
      $response["success"] = false;
      $response["message"] = $conn->error;
    }
  } else {
    $response["success"] = false;
    $response["message"] = "Industry <strong>$name</strong> already exist.";
  }

  $helpers->return_response($response);
}

function verify_company()
{
  global $helpers, $_POST, $conn;

  $id = $_POST["id"];
  $verification = $_POST["action"];
  $message = $_POST["msg"];

  $updateData = array(
    "status" => $verification,
    "message" => nl2br($message)
  );

  $update = $helpers->update("verification", $updateData, "id", $id);

  if ($update) {
    $response["success"] = true;
    $response["message"] = "Company verification successfully updated";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function company_save()
{
  global $helpers, $_POST, $conn;

  $company_id = $_POST["company_id"];
  $name = $_POST["name"];
  $companyAddress = $_POST["companyAddress"];
  $industry_id = $_POST["industry"];
  $description = $_POST["description"];
  $input_business_permit = $_FILES["input_business_permit"];
  $url_business_permit = $_POST["url_business_permit"];

  $updateData = array();
  $update = false;

  if (empty($input_business_permit["name"]) && empty($url_business_permit)) {

    $updateData = array(
      "name" => $name,
      "district" => $companyAddress,
      "description" => nl2br($description),
      "industry_id" => $industry_id
    );

    $update = $helpers->update("company", $updateData, "id", $company_id);
  } else {
    $companyData = $helpers->select_all_individual("company", "id='$company_id'");

    if ($companyData) {

      if (!$companyData->verification_id) {
        $path = "../uploads/company";
        $business_permit = $helpers->upload_file($input_business_permit, $path);

        $verificationData = array(
          "business_permit" => $business_permit->success ?  SERVER_NAME . "/uploads/company/$business_permit->file_name" : $url_business_permit,
          "status" => "pending",
          "message" => "Waiting for admin to validate the business permit."
        );

        $verification_id = $helpers->insert("verification", $verificationData);

        $updateData = array(
          "verification_id" => $verification_id,
          "name" => $name,
          "address" => $companyAddress,
          "description" => nl2br($description),
          "industry_id" => $industry_id
        );

        $update = $helpers->update("company", $updateData, "id", $company_id);
      } else {
        $path = "../uploads/company";
        $business_permit = $helpers->upload_file($input_business_permit, $path);

        $updateVerificationData = array(
          "business_permit" => $business_permit->success ?  SERVER_NAME . "/uploads/company/$business_permit->file_name" : $url_business_permit,
          "status" => "pending",
          "message" => "Waiting for admin to validate the business permit."
        );

        $helpers->update("verification", $updateVerificationData, "id", $companyData->verification_id);
      }

      $update = true;
    } else {
      $response["success"] = false;
      $response["message"] = "Error updating company details.<br>Please try again later";
    }
  }

  if ($update) {
    $response["success"] = true;
    $response["message"] = "Company Profile updated successfully";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }


  $helpers->return_response($response);
}

function save_company_image()
{
  global $helpers, $_FILES, $_POST;

  $action = $_POST["action"];
  $set_image_null = boolval($_POST["set_image_null"]);
  $id = $_POST["id"];

  $image_url = "";

  if ($action == "upload") {
    $file = $helpers->upload_file($_FILES["file"], "../uploads/company");

    if ($file->success) {
      $file_name = $file->file_name;

      $image_url = SERVER_NAME . "/uploads/company/$file_name";

      $uploadData = array(
        "company_logo" => $file_name
      );
    } else {
      $response["success"] = false;
      $response["message"] = "Error uploading image";
    }
  } else if ($action == "reset") {
    $image_url = SERVER_NAME . "/custom-assets/images/office.png";

    $uploadData = array(
      "company_logo" => $set_image_null ? "set_null" : null,
    );
  } else {
    $image_url = SERVER_NAME . "/custom-assets/images/office.png";

    $response["success"] = false;
    $response["message"] = "Error updating image";
  }

  $update = $helpers->update("company", $uploadData, "id", $id);

  if ($update) {
    $response["success"] = true;
    $response["image_url"] = $image_url;
  } else {
    $response["success"] = false;
    $response["message"] = "Error updating image";
  }

  $helpers->return_response($response);
}

function register_company()
{
  global $helpers, $_POST, $conn;

  $id = $helpers->decrypt($_POST["token"]);
  $input_company_id = $_POST["company_id"];

  $company_name = $_POST["company_name"];
  $address = $_POST["address"];
  $industry = $_POST["industry"];
  $description = nl2br($_POST["description"]);

  $input_company_logo = $_FILES["input_company_logo"];
  $url_company_logo = $_POST["url_company_logo"];

  $input_business_permit = $_FILES["input_business_permit"];
  $url_business_permit = $_POST["url_business_permit"];

  $company_id = null;

  if (!empty($input_company_id)) {
    $company_id = $input_company_id;
  } else {
    $path = "../uploads/company";

    $company_logo = $helpers->upload_file($input_company_logo, $path);
    $business_permit = $helpers->upload_file($input_business_permit, $path);

    $verificationData = array(
      "business_permit" => $business_permit->success ? SERVER_NAME . "/uploads/company/$business_permit->file_name" : $url_business_permit,
      "status" => "pending",
      "message" => "Waiting for admin to validate the business permit."
    );

    $verification_id = $helpers->insert("verification", $verificationData);

    if ($verification_id) {

      $companyData = array(
        "verification_id" => $verification_id,
        "industry_id" => $industry,
        "name" => $company_name,
        "company_logo" => $company_logo->success ? $company_logo->file_name : $url_company_logo,
        "address" => $address,
        "description" => $description,
      );

      $insertCompany = $helpers->insert("company", $companyData);

      if ($insertCompany) {
        $company_id = $insertCompany;
      } else {
        $response["success"] = false;
        $response["message"] = "Adding Company Error<br>Please try again later";

        $helpers->return_response($response);
      }
    } else {
      $response["success"] = false;
      $response["message"] = "Verification Error<br>Please try again later";

      $helpers->return_response($response);
    }
  }

  $updateData = array(
    "company_id" => $company_id
  );

  $updateData = $helpers->update("users", $updateData, "id", $id);

  if ($updateData) {
    $response["success"] = true;
    $response["message"] = "Company added successfully";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function get_all_companies()
{
  global $helpers, $_GET;

  $params = isset($_GET["s"]) ? "name LIKE '%$_GET[s]%' " : "";

  $companies = $helpers->select_all_with_params("company", "$params ");

  $data = array();

  if (count($companies) > 0) {
    foreach ($companies as $company) {
      array_push(
        $data,
        array(
          "address" => $company->district,
          "company_logo" => $helpers->get_company_logo_link($company->id),
          "description" => $company->description,
          "id" => $company->id,
          "industry_id" => $company->industry_id,
          "name" => $company->name
        )
      );
    }
  }

  $helpers->return_response($data);
}

function check_verification_status()
{
  global $helpers, $_GET;

  $verification_data = $helpers->select_all_with_params("verification", "id=$_GET[id]");

  $data = null;
  if (count($verification_data) > 0) {
    $data = $verification_data[0];
  }

  $helpers->return_response($data);
}
function verify_account()
{
  global $helpers, $_POST, $_FILES, $conn;

  $token = $_POST["token"];
  $selfie_input = $_FILES["selfie_input"];
  $selfie_url = $_POST["selfie_url"];
  $valid_id_input = $_FILES["valid_id_input"];
  $valid_id_url = $_POST["valid_id_url"];

  $path = "../uploads/verification";
  $selfie_image = $helpers->upload_file($selfie_input, $path);
  $valid_id_image = $helpers->upload_file($valid_id_input, $path);

  $user_id = $helpers->decrypt($token);

  $verificationData = array(
    "selfie" => $selfie_image->success ? $selfie_image->file_name : $selfie_url,
    "valid_id" => $valid_id_image->success ? $valid_id_image->file_name : $valid_id_url,
    "status" => "pending",
    "message" => "Waiting for admin to approved your account."
  );

  $insertVerification = $helpers->insert("verification", $verificationData);

  if ($insertVerification) {

    $updateUser = $helpers->update("users", array("verification_id" => $insertVerification), "id", $user_id);

    if ($updateUser) {
      $response["success"] = true;
      $response["message"] = "Selfie and Valid ID successfully uploaded<br>Please wait for admin approval.";
    } else {
      $response["success"] = false;
      $response["message"] = $conn->error;
    }
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function add_admin()
{
  global $helpers, $_POST, $conn;

  $fname = $_POST["fname"];
  $mname = $_POST["mname"];
  $lname = $_POST["lname"];
  $contact = $_POST["contact"];
  $email = $_POST["email"];
  $address = $_POST["address"];

  $user = $helpers->get_user_by_email($email);

  if (!$user) {
    $userData = array(
      "fname" => $fname,
      "mname" => $mname,
      "lname" => $lname,
      "address" => $address,
      "contact" => $contact,
      "email" => $email,
      "password" => password_hash($email, PASSWORD_ARGON2I),
      "role" => "admin",
      "is_password_changed" => "set_zero",
    );

    $insert = $helpers->insert("users", $userData);

    if ($insert) {
      $response["success"] = true;
      $response["message"] = "Successfully added new admin<br>The default password is the email <strong>$email</strong>";
    } else {
      $response["success"] = false;
      $response["message"] = ("Error adding new admin: " . $conn->error);
    }
  } else {
    $response["success"] = false;
    $response["message"] = "Email already exist!";
  }

  $helpers->return_response($response);
}

function change_password()
{
  global $helpers, $_POST, $conn;

  $user = $helpers->get_user_by_id($_POST["id"]);

  if ($user) {
    if (password_verify($_POST["current_password"], $user->password)) {
      $updateData = array(
        "password" => password_hash($_POST["new_password"], PASSWORD_ARGON2I),
        "is_password_changed" => "1",
      );

      $update = $helpers->update("users", $updateData, "id", $_POST["id"]);

      if ($update) {
        $response["success"] = true;
        $response["message"] = "Password successfully updated!";
      } else {
        $response["success"] = false;
        $response["message"] = ("Error updating password: " . $conn->error);
      }
    } else {
      $response["success"] = false;
      $response["message"] = "Current password not match!";
    }
  } else {
    $response["success"] = false;
    $response["message"] = "User not found!";
  }

  $helpers->return_response($response);
}
function delete_data()
{
  global $helpers, $_POST, $conn;

  $delete = $helpers->delete($_POST["table"], $_POST["column"], $_POST["val"]);

  if ($delete) {
    $response["success"] = true;
    $response["message"] = "Item successfully deleted";
  } else {
    $response["success"] = false;
    $response["message"] = $conn->error;
  }

  $helpers->return_response($response);
}

function delete_profile()
{
  global $helpers, $_POST, $conn;

  $delete = $helpers->delete($_POST["table"], $_POST["column"], $_POST["val"]);

  if ($delete) {
    if ($_POST["table"] == "users") {
      session_unset();
      session_destroy();
    }
    $response["success"] = true;
    $response["message"] = "Profile successfully deactivated!";
  } else {
    $response["success"] = false;
    $response["message"] = ("Error deactivating account: " . $conn->error);
  }

  $helpers->return_response($response);
}

function profile_save()
{
  global $helpers, $_POST, $conn;

  $id = $_POST["id"];
  $fname = $_POST["fname"];
  $mname = $_POST["mname"];
  $lname = $_POST["lname"];
  $contact = $_POST["contact"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $district = $_POST["district"];
  $position = isset($_POST["position"]) ? $_POST["position"] : null;

  $user = $helpers->get_user_by_email($email, $id);

  if (!$user) {
    $updateData = array(
      "fname" => $fname,
      "mname" => $mname,
      "lname" => $lname,
      "address" => $address,
      "district" => $district,
      "contact" => $contact,
      "email" => $email,
      "position" => $position
    );

    $update = $helpers->update("users", $updateData, "id", $id);

    if ($update) {
      $response["success"] = true;
      $response["message"] = "Profile successfully updated!";
    } else {
      $response["success"] = false;
      $response["message"] = ("Error updating data: " . $conn->error);
    }
  } else {
    $response["success"] = false;
    $response["message"] = "Email already registered!";
  }

  $helpers->return_response($response);
}

function save_profile_image()
{
  global $helpers, $_FILES, $_POST;

  $action = $_POST["action"];
  $set_image_null = boolval($_POST["set_image_null"]);
  $id = $_POST["id"];

  $image_url = "";

  if ($action == "upload") {
    $file = $helpers->upload_file($_FILES["file"], "../uploads/avatars");

    if ($file->success) {
      $file_name = $file->file_name;

      $image_url = SERVER_NAME . "/uploads/avatars/$file_name";

      $uploadData = array(
        "avatar" => $file_name
      );
    } else {
      $response["success"] = false;
      $response["message"] = "Error uploading image";
    }
  } else if ($action == "reset") {
    $image_url = SERVER_NAME . "/custom-assets/images/default.png";

    $uploadData = array(
      "avatar" => $set_image_null ? "set_null" : null,
    );
  } else {
    $image_url = SERVER_NAME . "/custom-assets/images/default.png";

    $response["success"] = false;
    $response["message"] = "Error updating image";
  }

  $update = $helpers->update("users", $uploadData, "id", $id);

  if ($update) {
    $response["success"] = true;
    $response["image_url"] = $image_url;
  } else {
    $response["success"] = false;
    $response["message"] = "Error updating image";
  }

  $helpers->return_response($response);
}

function logout()
{
  global $helpers;
  $user = $helpers->get_current_user();

  $path = "../views/sign-in";

  if ($user->role == "applicant") {
    $path = "../public/views/home";
  }

  $helpers->user_logout($path);
}

function registration()
{
  global $_POST, $helpers, $conn;

  $user = $helpers->get_user_by_email($_POST["email"]);

  if (!$user) {
    $registerData = array(
      "fname" => $_POST["fname"],
      "mname" => empty($_POST["mname"]) ? "set_null" : $_POST["mname"],
      "lname" => $_POST["lname"],
      "district" => $_POST["district"],
      "address" => $_POST["address"],
      "contact" => $_POST["contact"],
      "email" => $_POST["email"],
      "password" => password_hash($_POST["password"], PASSWORD_ARGON2I),
      "role" => $_POST['role']
    );

    $comm = $helpers->insert("users", $registerData);

    if ($comm) {
      $response["success"] = true;
      $response["message"] = "You are successfully registered!";
      $response["role"] = $_POST['role'];
      $response["token"] = $helpers->encrypt($comm);

      if ($_POST['role'] == "applicant") {
        $otp = $helpers->generateNumericOTP(6);
        addOtp($comm, $otp);
        $fullName = $helpers->get_full_name($comm);

        $html_body = file_get_contents("./otp-email-template.html");
        $html_body = str_replace('%name%', $fullName, $html_body);
        $html_body = str_replace('%otp%', $otp, $html_body);

        sendEmail($_POST["email"], $html_body, $fullName, "Email Verification");
      }

      $_SESSION["id"] = $comm;
    } else {
      $response["success"] = false;
      $response["message"] = $conn->error;
    }
  } else {
    $response["success"] = false;
    $response["message"] = "Email already registered<br>Please try again.";
  }

  $helpers->return_response($response);
}

function addOtp($user_id, $otp)
{
  global $helpers;

  $checkOtp = $helpers->select_all_individual("otp", "otp='$otp'");

  if ($checkOtp) {
    addOtp($user_id, $helpers->generateNumericOTP(6));
  } else {
    $helpers->insert("otp", array("user_id" => $user_id, "otp" => "$otp"));
  }
}

function login()
{
  global $_POST, $helpers;

  $email = $_POST["email"];
  $password = $_POST["password"];

  $user = $helpers->get_user_by_email($email);

  if ($user) {
    if (password_verify($password, $user->password)) {

      if ($user->role == "employer" && !$user->company_id) {
        $response["token"] = $helpers->encrypt($user->id);
      } else if ($user->role == "applicant") {

        $getOtp = $helpers->select_all_with_params("otp", "user_id='$user->id'");

        if (count($getOtp) > 0) {
          $otp = $helpers->generateNumericOTP(6);
          addOtp($user->id, $otp);
          $fullName = $helpers->get_full_name($user->id);

          $html_body = file_get_contents("./otp-email-template.html");
          $html_body = str_replace('%name%', $fullName, $html_body);
          $html_body = str_replace('%otp%', $otp, $html_body);

          sendEmail($_POST["email"], $html_body, $fullName, "Email Verification");

          $response["location"] = (SERVER_NAME . "/views/otp?t=" . $helpers->encrypt($user->id));
        } else {
          $education = $helpers->select_all_with_params("education", "user_id='$user->id'");

          if (count($education) == 0) {
            $response["location"] = (SERVER_NAME . "/views/add-education?t=" . $helpers->encrypt($user->id));
          } else {
            $response["location"] = (SERVER_NAME . "/public/views/home");
          }
        }
      } else {
        $response["is_password_change"] = $user->is_password_changed == "0" ? false : true;
      }
      $response["success"] = true;
      $response["role"] = $user->role;

      $_SESSION["id"] = $user->id;
    } else {
      $response["success"] = false;
      $response["message"] = "Password not match.";
    }
  } else {
    $response["success"] = false;
    $response["message"] = "User not found.";
  }

  $helpers->return_response($response);
}
