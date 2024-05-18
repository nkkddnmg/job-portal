<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<?= head("Login") ?>
<style>
  .card {
    width: 400px;
    border: none;
    height: 300px;
    box-shadow: 0px 5px 20px 0px #d2dae3;
    z-index: 1;
    display: flex;
    justify-content: center;
    align-items: center
  }

  .card h6 {
    font-size: 20px
  }

  .inputs input {
    width: 40px;
    height: 40px
  }

  input[type=number]::-webkit-inner-spin-button,
  input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0
  }

  .card-2 {
    background-color: #fff;
    padding: 10px;
    width: 350px;
    height: 100px;
    bottom: -50px;
    left: 20px;
    position: absolute;
    border-radius: 5px
  }

  .card-2 .content {
    margin-top: 50px
  }

  .card-2 .content a {
    color: red
  }

  .form-control:focus {
    box-shadow: none;
    border: 2px solid red
  }
</style>

<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="container height-100 d-flex justify-content-center align-items-center">
          <div class="position-relative">
            <div class="card p-2 text-center">
              <?php
              $id = $helpers->decrypt($_GET["t"]);
              $userData = $helpers->select_all_individual("users", "id='$id'");

              $explodedEmail = explode("@", $userData->email);

              $maskEmail = "";
              for ($i = 0; $i < strlen($explodedEmail[0]); $i++) {
                if ($i === 0) {
                  $maskEmail .= $explodedEmail[0][$i];
                } else {
                  $maskEmail .= "*";
                }
              }
              $email = ($maskEmail . "@" . $explodedEmail[1]);
              ?>
              <h6>Please enter the one time password <br> to verify your account</h6>
              <div> <span>A code has been sent to</span> <small><?= $email ?></small> </div>
              <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                <input class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" />
                <input class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" />
                <input class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" />
                <input class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" />
                <input class="m-2 text-center form-control rounded" type="text" id="fifth" maxlength="1" />
                <input class="m-2 text-center form-control rounded" type="text" id="sixth" maxlength="1" />
              </div>

              <div class="row mt-4">
                <div class="col-md-6 mt-2">
                  <button class="btn btn-primary px-4" id="btnValidate">
                    Validate
                  </button>
                </div>
                <div class="col-md-6 mt-2">
                  <button type="button" class="btn btn-danger d-grid w-100" onclick="handleCancel()">
                    Cancel
                  </button>
                </div>
              </div>
              <!-- <div class="mt-4">
                <span>
                  Didn't get the code
                  <a href="#" class="text-decoration-none ms-3">
                    Resend
                  </a>
                </span>
              </div> -->
            </div>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>


</body>
<?php include("../components/footer.php") ?>

<script>
  const handleCancel = () => window.location.href = "<?= SERVER_NAME . "/backend/nodes?action=logout" ?>";

  window.onload = function() {
    OTPInput();
  }

  function OTPInput() {
    const inputs = document.querySelectorAll('#otp > *[id]');
    for (let i = 0; i < inputs.length; i++) {
      inputs[i].addEventListener('keydown', function(event) {
        if (event.key === "Backspace") {
          inputs[i].value = '';
          if (i !== 0) inputs[i - 1].focus();
        } else {
          if (i === inputs.length - 1 && inputs[i].value !== '') {
            return true;
          } else if (event.keyCode > 47 && event.keyCode < 58) {
            inputs[i].value = event.key;
            if (i !== inputs.length - 1) inputs[i + 1].focus();
            event.preventDefault();
          } else if (event.keyCode > 64 && event.keyCode < 91) {
            inputs[i].value = String.fromCharCode(event.keyCode);
            if (i !== inputs.length - 1) inputs[i + 1].focus();
            event.preventDefault();
          }
        }
      });
    }
  }

  $("#btnValidate").on("click", function() {
    let otp = "";
    $("#otp").find("input").each((i, el) => otp += $(el).val())

    swal.showLoading()
    $.post("<?= SERVER_NAME . "/backend/nodes?action=validate_otp" ?>", {
      otp: otp,
      token: "<?= $_GET['t'] ?>"
    }, (data, status) => {
      const resp = $.parseJSON(data)
      swal.fire({
        title: resp.success ? "Success" : "Error",
        html: resp.message,
        icon: resp.success ? "success" : "error",
      }).then(() => resp.success ? window.location.href = `<?= SERVER_NAME . "/views/add-education?t=$_GET[t]" ?>` : undefined)
    })
  })
</script>

</html>