<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<?= head("Interview Confirmation") ?>

<body>

  <input type="text" value="<?= $_GET["i"] ?>" id="id" readonly hidden>
  <input type="text" value="<?= $_GET["a"] ?>" id="action" readonly hidden>
</body>

<script src="<?= SERVER_NAME ?>/assets/vendor/libs/jquery/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(() => {
    swal.showLoading();

    const formData = new FormData();
    formData.append("id", $("#id").val())
    formData.append("action", $("#action").val())

    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=invitation_confirmation" ?>",
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        const resp = $.parseJSON(data)
        swal.fire({
          title: resp.success ? "Success" : "Error",
          html: resp.message,
          icon: resp.success ? "success" : "error",
        }).then(() => window.location.href = "<?= SERVER_NAME . "/public/views/home" ?>")
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
</script>

</html>