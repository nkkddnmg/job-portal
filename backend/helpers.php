<?php

class Helpers
{
  private $separator = "!I_I!";
  private $conn;

  public function __construct($conn)
  {
    $this->conn = $conn;

    if ($_SERVER['HTTP_HOST'] == "localhost") {
      define("SERVER_NAME", "http://$_SERVER[SERVER_NAME]/job-portal");
    } else {
      define("SERVER_NAME", "http://$_SERVER[SERVER_NAME]");
    }
  }

  public function get_sidebar_data($user)
  {
    $links = null;

    if ($user == "admin") {
      $links = array(
        array(
          "title" => "Dashboard",
          "config" => array(
            "icon" => "bx bx-home-circle",
            "url" => (SERVER_NAME . "/views/admin/dashboard"),
            "is_dropdown" => false
          )
        ),
        array(
          "title" => "Users",
          "config" => array(
            "icon" => "bx bx-group",
            "is_dropdown" => true,
            "dropdown_data" => array(
              array(
                "title" => "Admins",
                "url" => (SERVER_NAME . "/views/admin/admins")
              ),
              array(
                "title" => "Employers",
                "url" => (SERVER_NAME . "/views/admin/employers")
              ),
              array(
                "title" => "Applicants",
                "url" => (SERVER_NAME . "/views/admin/applicants")
              ),
            )
          )
        ),

      );
    }
    return $links;
  }

  /**  custom builder */

  public function upload_file($file, $path)
  {
    $res = array(
      "success" => false,
      "file_name" => ""
    );

    try {
      if (intval($file["error"]) == 0) {
        $uploadFile = uniqid() . '_' . $file['name'];

        if (!is_dir($path)) {
          mkdir($path, 0777, true);
        }

        if (move_uploaded_file($file['tmp_name'], "$path/$uploadFile")) {
          $res["success"] = true;
          $res["file_name"] = $uploadFile;
        }
      }
    } catch (Exception $e) {
      $err = $e->getMessage();
    }
    return (object) $res;
  }

  public function generate_profile_avatar($isButtonVisible, $src, $user_id)
  {
    $backendUrl = (SERVER_NAME . "/backend/nodes");
    $resetBtnVisibility = !$src ? "d-none" : "";

    return ("
        <div class='card-body'>
            <div class='d-flex align-items-start align-items-sm-center gap-4'>
              <img src='$src' alt='user-avatar' class='d-block rounded' height='100' width='100' style='object-fit: cover' id='uploadedAvatar' />
              " . ($isButtonVisible ? "
              <div class='button-wrapper'>
                <label for='img_upload' class='btn btn-primary me-2 mb-4' tabindex='0'>
                  <span class='d-none d-sm-block'>Upload new photo</span>
                  <i class='bx bx-upload d-block d-sm-none'></i>
                  <input type='file' id='img_upload' class='account-file-input' onclick='handleInputClick()' onchange='handleChangeImage($(this), `uploadedAvatar`, `$backendUrl`, `upload`, `$user_id`)' accept='image/png, image/jpeg' name='img_upload' hidden />
                </label>
                <button type='button' class='btn btn-outline-danger account-image-reset mb-4 $resetBtnVisibility' id='btnReset' onclick='handleChangeImage($(this), `uploadedAvatar`, `$backendUrl`, `reset`, `$user_id`)'>
                  <i class='bx bx-reset d-block d-sm-none'></i>
                  <span class='d-none d-sm-block'>Reset</span>
                </button>

                <p class='text-muted mb-0'>Allowed JPG or PNG</p>
              </div>
              " : "") . "
            </div>
        </div>
        <hr class='my-0' />
    ");
  }

  public function generate_td_avatar($src, $modal_id, $img_id, $caption_id)
  {
    $explodedSrc = explode("/", $src);
    $alt = count($explodedSrc) > 0 ? $explodedSrc[count($explodedSrc) - 1] : "image.jpg";

    return "
        <img src='$src' onclick='handleOpenModalImg($(this), `$modal_id`, `$img_id`, `$caption_id`)' class='avatar avatar-md rounded-circle me-2' alt='$alt'>
  ";
  }

  public function generate_modal_img($modal_id, $img_id, $caption_id)
  {
    return "
    <div id='$modal_id' class='div-modal pt-5'>
      <span class='modal-close' onclick='handleCloseModalImg(`$modal_id`, `$img_id`, `$caption_id`)'>&times;</span>
      <img class='modal-img' id='$img_id'>
      <div id='$caption_id' class='modal-img-caption'></div>
    </div>
  ";
  }

  public function is_self_in_dropdown($self, array $configs)
  {
    $explodedSelf = explode("/", str_replace(".php", "", $self));
    $newSelf = $explodedSelf[count($explodedSelf) - 1];

    foreach ($configs as $config) {
      $explodedUrl = explode("/", $config["url"]);
      $newUrl =  $explodedUrl[count($explodedUrl) - 1];
      if ($newUrl == $newSelf) {
        return true;
      }
    }

    return false;
  }
  public function is_active_menu($url, $self)
  {
    $explodedUrl = explode("/", $url);
    $newUrl =  $explodedUrl[count($explodedUrl) - 1];

    $explodedSelf = explode("/", str_replace(".php", "", $self));
    $newSelf = $explodedSelf[count($explodedSelf) - 1];

    return $newUrl == $newSelf ? "active" : "";
  }

  public function insert($table, $data)
  {
    $columns = array();
    $values = array();

    try {
      if (count($data) > 0) {
        foreach ($data as $column => $value) {
          if ($value) {
            if ($value == "set_null") {
              array_push($columns, "`$column`");
              array_push($values, "NULL");
            } else if ($value == "set_zero") {
              array_push($columns, "`$column`");
              array_push($values, "0");
            } else {
              array_push($columns, "`$column`");
              array_push($values, "'" .   $this->conn->escape_string($value) . "'");
            }
          }
        }

        if (count($values) == count($columns)) {
          $queryStr = "INSERT INTO `$table` (" . implode(",", $columns) . ") VALUES (" . implode(",", $values) . ")";

          $query = $this->conn->query($queryStr);

          if ($query) {
            return $this->conn->insert_id;
          } else {
            $error =  $this->con->error;
          }
        }

        return null;
      }
    } catch (Exception $e) {
      $error = $e->getMessage();
    }

    return null;
  }

  public function select_all($table)
  {
    $query = $this->conn->query("SELECT * FROM $table");

    $data = array();

    while ($row = $query->fetch_object()) {
      array_push($data, $row);
    }

    return $data;
  }

  public function select_all_with_params($table, $params)
  {
    $query = $this->conn->query("SELECT * FROM $table WHERE $params");

    $data = array();

    while ($row = $query->fetch_object()) {
      array_push($data, $row);
    }

    return $data;
  }

  public function select_custom_fields($table, array $fields)
  {
    $customFields = implode(",", $fields);

    $query = $this->conn->query("SELECT $customFields FROM $table");

    $data = array();

    while ($row = $query->fetch_object()) {
      array_push($data, $row);
    }

    return $data;
  }

  public function select_custom_fields_with_params($table, array $fields, $params)
  {
    $customFields = implode(",", $fields);

    $query = $this->conn->query("SELECT $customFields FROM $table WHERE $params");

    $data = array();

    while ($row = $query->fetch_object()) {
      array_push($data, $row);
    }

    return $data;
  }

  public function select_custom_query($query)
  {
    $query = $this->conn->query($query);

    $data = array();

    while ($row = $query->fetch_object()) {
      array_push($data, $row);
    }

    return $data;
  }

  function update($table, $data, $column_where, $column_val)
  {
    $set = array();

    try {
      if (count($data) > 0) {
        foreach ($data as $column => $value) {
          if ($value) {
            if ($value == "set_null") {
              array_push($set, "$column = NULL");
            } else if ($value == "set_zero") {
              array_push($set, "$column = '0'");
            } else {
              array_push($set, "$column = '" . $this->conn->escape_string($value) . "'");
            }
          }
        }

        if (count($set) > 0) {
          $queryStr = "UPDATE `$table` SET " . (implode(', ', $set)) . " WHERE $column_where='$column_val'";

          return $this->conn->query($queryStr);
        }

        return null;
      }
    } catch (Exception $e) {
      $error = $e->getMessage();
    }

    return null;
  }

  function delete($table, $column, $value)
  {
    try {
      $queryStr = "DELETE FROM `$table` WHERE `$column`='$value'";

      return $this->conn->query($queryStr);
    } catch (Exception $e) {
      $error = $e->getMessage();
    }

    return null;
  }

  public function is_selected($value, $to_check)
  {
    if ($value && $to_check) {
      if ($value == $to_check) {
        return "selected";
      } else {
        return "";
      }
    }
    return "";
  }

  public function get_user_by_email($email, $id = null)
  {
    $params = $id ? "AND id <> $id" : "";
    $query = $this->conn->query("SELECT * FROM users WHERE email='$email' $params");

    return $query->num_rows > 0 ? $query->fetch_object() : null;
  }

  public function get_user_by_id($user_id)
  {
    $query = $this->conn->query("SELECT * FROM users WHERE id='$user_id'");

    return $query->num_rows > 0 ? $query->fetch_object() : null;
  }

  public function get_full_name($user_id, $format = "") // format = with_middle
  {
    $user = $this->get_user_by_id($user_id);
    $fullName = "";

    if ($user->mname == "") {
      $fullName = ucwords("$user->fname $user->lname");
    } else {
      if ($format) {
        $fullName = ucwords("$user->fname $user->mname $user->lname");
      } else {
        $middle = $user->mname[0];
        $fullName = ucwords("$user->fname " . $middle . ". $user->lname");
      }
    }

    return $fullName;
  }

  public function get_avatar_link($user_id)
  {
    $user = $this->get_user_by_id($user_id);

    if ($user->avatar) {
      return SERVER_NAME . "/uploads/avatars/$user->avatar";
    }

    return SERVER_NAME . "/custom-assets/images/default.png";
  }

  function user_logout($path)
  {
    global $_SESSION;

    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
      );
    }

    session_destroy();
    header("location: $path");
  }

  function return_response($params)
  {
    print_r(
      json_encode($params)
    );
    exit;
  }
}
