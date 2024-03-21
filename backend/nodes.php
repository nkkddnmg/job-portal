<?php
session_start();
include(__DIR__ . "/helpers.php");

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
      default:
        $response["success"] = false;
        $response["message"] = "Case action not found!";

        null;
        $helpers->return_response($response);
    }
  }
} catch (Exception $e) {
  echo "<script>console.log(`" . ($e->getMessage()) . "`)</script>";
}
function check_verification_status()
{
  global $helpers, $_GET;

  $user_data = $helpers->get_user_by_id($_GET["id"]);
  $verification_data = $helpers->select_all_with_params("verification", "id=$user_data->verification_id");

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

  $user = $helpers->get_user_by_email($email, $id);

  if (!$user) {
    $updateData = array(
      "fname" => $fname,
      "mname" => $mname,
      "lname" => $lname,
      "address" => $address,
      "contact" => $contact,
      "email" => $address
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
      "address" => $_POST["address"],
      "contact" => $_POST["contact"],
      "email" => $_POST["email"],
      "password" => password_hash($_POST["password"], PASSWORD_ARGON2I),
      "role" => "applicant"
    );

    $comm = $helpers->insert("users", $registerData);

    if ($comm) {
      $response["success"] = true;
      $response["message"] = "You are successfully registered!";
      $response["role"] = "applicant";

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

function login()
{
  global $_POST, $helpers;

  $email = $_POST["email"];
  $password = $_POST["password"];

  $user = $helpers->get_user_by_email($email);

  if ($user) {
    if (password_verify($password, $user->password)) {
      $response["success"] = true;
      $response["role"] = $user->role;
      $response["is_password_change"] = $user->is_password_changed == "0" ? false : true;

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
