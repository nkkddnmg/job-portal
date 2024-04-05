window.handleDelete = function (
  backendUrl,
  config = {
    title: "Are you sure you want to remove this item?",
    text: "You can't undo this action after successful deletion.",
    buttonText: "Delete",
    buttonColor: "#dc3545",
  },
  postData = {
    table: "",
    column: "",
    val: "",
  }
) {
  swal
    .fire({
      title: config.title,
      text: config.text,
      icon: "warning",
      confirmButtonText: config.buttonText,
      confirmButtonColor: config.buttonColor,
      showCancelButton: true,
    })
    .then((d) => {
      if (d.isConfirmed) {
        swal.showLoading();
        $.post(backendUrl, postData, (data, status) => {
          const resp = JSON.parse(data);
          if (!resp.success) {
            swal.fire({
              title: "Error!",
              html: resp.message,
              icon: "error",
            });
          } else {
            window.location.reload();
          }
        }).fail(function (e) {
          swal.fire({
            title: "Error!",
            html: e.statusText,
            icon: "error",
          });
        });
      }
    });
};

window.handleOpenModalImg = (
  el,
  modalId,
  modalImgId,
  captionId,
  src = null
) => {
  if (!src) {
    $(`#${modalImgId}`).attr("src", el[0].src);
    $(`#${captionId}`).html(el[0].alt);
  } else {
    const chunkedSrc = src.split("/");
    const fileName = chunkedSrc[chunkedSrc.length - 1];

    $(`#${modalImgId}`).attr("src", src);
    $(`#${captionId}`).html(fileName);
  }

  $("html").css({
    overflow: "hidden",
  });
  $(`#${modalId}`).show();
};

window.handleCloseModalImg = (modalId, modalImgId, captionId) => {
  $(`#${modalId}`).fadeOut("slow", function () {
    $(`#${modalImgId}`).attr("src", "");
    $(`#${captionId}`).html("");
    $("html").css({
      overflow: "visible",
    });
  });
};

function checkIt() {
  const file = document.getElementById("img_upload");

  if (file.value.length) {
    console.log("file loaded");
  } else {
    console.log("user canceled");
  }
  document.body.onfocus = null;
}

window.handleInputClick = () => {
  document.body.onfocus = checkIt;
  console.log("initializing");
};

window.handleChangeImage = (e, imageId, backendUrl, action, user_id) => {
  let formData = new FormData();
  formData.append("id", user_id);

  if (action == "upload") {
    formData.append("file", $(e).get(0).files[0]);
    formData.append("set_image_null", false);
    formData.append("action", action);
  } else if ("reset") {
    formData.append("set_image_null", true);
    formData.append("action", action);
  }

  $.ajax({
    url: `${backendUrl}?action=save_profile_image`,
    type: "POST",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      const resp = $.parseJSON(data);
      if (resp.success) {
        $(`#${imageId}`).attr("src", resp.image_url);
      }
    },
    error: function (data) {
      swal.fire({
        title: "Oops...",
        html: "Something went wrong.",
        icon: "error",
      });
    },
  });
};

window.handleResetImgUpload = (
  e,
  imageId,
  imgUpload,
  inputSetImageNull,
  defaultImgUrl
) => {
  $(`#${imgUpload}`).val("");
  $(`#${imageId}`).attr("src", defaultImgUrl);
  $(`#${inputSetImageNull}`).val("yes");

  $(`#${imgUpload}`).parent().addClass("inline-block").removeClass("d-none");
  $(e).addClass("d-none").removeClass("inline-block");
};

$("[required]")
  .parent()
  .each(function () {
    const asterisk = ` <span class="text-danger">*</span>`;
    $(this).closest(".form-group").find("label").append(asterisk);
  });

// $("#search_field").hideseek({
//   nodata: "No results found",
// });
