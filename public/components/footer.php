<footer class="site-footer p-4">

  <a href="#top" class="smoothscroll scroll-top">
    <span class="icon-keyboard_arrow_up"></span>
  </a>

  <div class="container">
    <div class="row text-center">
      <div class="col-12">
        <p class="copyright"><small>
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> All rights reserved
      </div>
    </div>
  </div>
</footer>

<script src="<?= SERVER_NAME . "/public/assets/js/jquery.min.js" ?>"></script>
<script src="<?= SERVER_NAME . "/public/assets/js/bootstrap.bundle.min.js" ?>"></script>
<script src="<?= SERVER_NAME . "/public/assets/js/isotope.pkgd.min.js" ?>"></script>
<script src="<?= SERVER_NAME . "/public/assets/js/stickyfill.min.js" ?>"></script>
<script src="<?= SERVER_NAME . "/public/assets/js/jquery.fancybox.min.js" ?>"></script>
<script src="<?= SERVER_NAME . "/public/assets/js/jquery.easing.1.3.js" ?>"></script>
<script src="<?= SERVER_NAME . "/public/assets/js/jquery.waypoints.min.js" ?>"></script>
<script src="<?= SERVER_NAME . "/public/assets/js/jquery.animateNumber.min.js" ?>"></script>
<script src="<?= SERVER_NAME . "/public/assets/js/owl.carousel.min.js" ?>"></script>
<script src="<?= SERVER_NAME . "/public/assets/js/bootstrap-select.min.js" ?>"></script>
<script src="<?= SERVER_NAME . "/public/assets/js/custom.js" ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  const loginUser = $.parseJSON('<?= json_encode($LOGIN_USER) ?>')

  const handleCheckStatus = (user_id) => {
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
        console.log(res)
      })
  }

  const verifyDialog = () => {
    swal.fire({
        title: "Verification",
        html: "Looks like your account is newly created.<br>Please verify your account to enjoy our full service",
        imageUrl: "<?= SERVER_NAME . "/public/assets/images/shield.png" ?>",
        imageWidth: "30%",
        confirmButtonText: "Verify",
        showCancelButton: true,
        cancelButtonText: "Later",
        cancelButtonColor: "#6c757d"
      })
      .then((d) => {
        if (d.isConfirmed) {
          window.location.href = "<?= SERVER_NAME . "/views/verify-account?t=" . $helpers->encrypt($LOGIN_USER ? $LOGIN_USER->id : null) ?>"
        }
      });
  }

  if (loginUser && !loginUser.verification_id) {
    setTimeout(verifyDialog, 2000);
  }
</script>