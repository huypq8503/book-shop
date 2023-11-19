// $(function () {
//     $(document).on("click", ".iitBtn", function () {
//         //     $.post("/photo", function (data) {
//         //         $(".imgEdit").html(data);
//         //     });

//         $(".imgEdit").html(
//             '<div class="modal-header">' +
//                 '<h5 class="modal-title" id="exampleModalLabel">Comment</h5>' +
//                 '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  </div>' +
//                 ' <div class="modal-body">' +
//                 '<input class="comment-text" type="text" placeholder="Add Comment.." />' +
//                 "</div>" +
//                 '<div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>' +
//                 '<button type="button" class="btn btn-primary getcomment" data-tweet=>Comment</button>' +
//                 "</div>"
//         );
//     });
// });

  $("body").on("change", "#browse_image", function(e) {
        var files = e.target.files;
        var done = function(url) {
          $('#display_image_div').html('');
          $("#display_image_div").html('<img name="display_image_data" id="display_image_data" src="'+url+'" alt="Uploaded Picture" class="img-fluid">');
          // $("#display_image_div").html('<h1>12</h1> ');
          };
          if (files && files.length > 0) {
            file = files[0];
            if (URL) {
              done(URL.createObjectURL(file));
            } else if (FileReader) {
              reader = new FileReader();
              reader.onload = function(e) {
                done(reader.result);
              };
              reader.readAsDataURL(file);
            }
          }
          var image = document.getElementById('display_image_data');
          var button = document.getElementById('crop_button');
          var result = document.getElementById('cropped_image_result');
          var croppable = false;
          var cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 1,
            ready: function() {
              croppable = true;
            },
          });
          button.onclick = function() {
            var croppedCanvas;
            var roundedCanvas;
            var roundedImage;
            if (!croppable) {
              return;
            }
            // Crop
            croppedCanvas = cropper.getCroppedCanvas();
            // Round
            roundedCanvas = getRoundedCanvas(croppedCanvas);
            // Show
            roundedImage = document.createElement('img');
            roundedImage.src = roundedCanvas.toDataURL()
            result.innerHTML = '';
            result.appendChild(roundedImage);
          };
        });

      function getRoundedCanvas(sourceCanvas) {
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        var width = sourceCanvas.width;
        var height = sourceCanvas.height;
        canvas.width = width;
        canvas.height = height;
        context.imageSmoothingEnabled = true;
        context.drawImage(sourceCanvas, 0, 0, width, height);
        context.globalCompositeOperation = 'destination-in';
        context.beginPath();
        context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
        context.fill();
        return canvas;
      }
    
      function upload() {
        var base64data = $('#cropped_image_result img').attr('src');
        //alert(base64data);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/profileUpload",
            data: {
                image: base64data
            },
            success: function(response) {
                if (response.status == true) {
                    alert(response.msg);
                } else {
                    alert("Image not uploaded.");
                }
            }
        });
    }