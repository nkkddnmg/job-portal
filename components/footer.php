<script src="<?= SERVER_NAME ?>/assets/js/config.js"></script>
<script src="<?= SERVER_NAME ?>/assets/vendor/js/helpers.js"></script>
<!-- Core JS -->
<script src="<?= SERVER_NAME ?>/assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= SERVER_NAME ?>/assets/vendor/libs/popper/popper.js"></script>
<script src="<?= SERVER_NAME ?>/assets/vendor/js/bootstrap.js"></script>
<script src="<?= SERVER_NAME ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="<?= SERVER_NAME ?>/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="<?= SERVER_NAME ?>/assets/js/main.js"></script>
<script src="<?= SERVER_NAME ?>/custom-assets/js/custom.js"></script>
<!-- Page JS -->

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Data tables -->
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>

<!-- data tables buttons -->
<script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.colVis.min.js"></script>

<!-- responsive data tables -->
<script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>

<!-- data tables search builder -->
<script src="https://cdn.datatables.net/searchbuilder/1.7.0/js/dataTables.searchBuilder.js"></script>
<script src="https://cdn.datatables.net/searchbuilder/1.7.0/js/searchBuilder.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.2/js/dataTables.dateTime.min.js"></script>

<!-- End Data tables -->

<script src="<?= SERVER_NAME . "/custom-assets/components/image-upload/js/bootstrap-imageupload.min.js" ?>"></script>
<script src="<?= SERVER_NAME . "/custom-assets/components/bootstrap-autocomplete/bootstrap-autocomplete.js" ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.2.24/jquery.autocomplete.min.js"></script>

<script src="<?= SERVER_NAME . "/assets/vendor/libs/editable-select/jquery-editable-select.js" ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  const handleCheckStatus = (user_id) => {

    if (user_id) {
      $.get(
        `<?= SERVER_NAME ?>/backend/nodes?action=check_verification_status&&id=${user_id}`,
        (data, status) => {
          const res = $.parseJSON(data);
          let imgUrl = "";
          if (res.status === "pending") {
            imgUrl = "<?= SERVER_NAME . "/public/assets/images/hourglass.gif" ?>"
          } else if (res.status === "denied") {
            imgUrl = "<?= SERVER_NAME . "/public/assets/images/denied.gif" ?>"
          } else if (res.status === "approved") {
            imgUrl = "<?= SERVER_NAME . "/public/assets/images/approval.gif" ?>"
          }

          swal.fire({
            html: `
          <div style='text-align:left;width:100%'>
            <strong>Status:</strong> <span style="text-transform:capitalize">${res.status}</span><br>
            <strong>Message:</strong> <span>${res.message}</span>
          </div>
          `,
            imageUrl: imgUrl,
            imageWidth: "40%",
            confirmButtonText: "Close"
          })
        })
    } else {
      swal.fire({
        html: "You don't have any <strong>Verification</strong>.<br>Please update your company with business permit attached.",
        icon: "warning",
        confirmButtonText: "Close"
      })
    }

  }
</script>