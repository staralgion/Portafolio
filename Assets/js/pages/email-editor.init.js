/*
Template Name: Admin & Dashboard Template
Author: Themesdesign
Website: https://Themesdesign.com/
Contact: Themesdesign@gmail.com
File: Email Js File
*/

document.addEventListener("DOMContentLoaded", function () {

  // plugins: [
  //     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
  //     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
  //     "save table contextmenu directionality emoticons template paste textcolor"
  // ],
  // toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",


  if ($("#email-editor").length > 0) {
    tinymce.init({
      selector: "textarea#email-editor",
      language: 'es',
      height: 500,
      plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview fullpage | forecolor backcolor emoticons",
      /* enable title field in the Image dialog*/
      browser_spellcheck: true,
      image_title: true,
      /* enable automatic uploads of images represented by blob or data URIs*/
      automatic_uploads: true, 
      contextmenu: false,
      /*
        URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
        images_upload_url: 'postAcceptor.php',
        here we add custom filepicker only to Image dialog
      */
      file_picker_types: 'image',
      setup: function (editor) {
        editor.on('paste', function (e) {
          var clipboardData = e.clipboardData || window.clipboardData;
          if (clipboardData && clipboardData.items) {
            for (var i = 0; i < clipboardData.items.length; i++) {
              var item = clipboardData.items[i];
              if (item.type.indexOf("image") !== -1) {
                e.preventDefault(); // Evitar que la imagen se pegue directamente

                var file = item.getAsFile();
                var reader = new FileReader();

                reader.onload = function (event) {
                  var imgDataUrl = event.target.result;
                  var imgElement = new Image();
                  imgElement.src = imgDataUrl;

                  // Redimensiona la imagen según tus necesidades
                  imgElement.style.maxWidth = '100%'; // Establece el ancho máximo
                  imgElement.style.height = 'auto'; // Ajusta la altura automáticamente

                  // Inserta la imagen en el editor
                  editor.insertContent(imgElement.outerHTML);
                };

                reader.readAsDataURL(file);
              }
            }
          }
        });
      },
      content_css: baseurl + "/Assets/css/solicitudes.css",
      /* and here's our custom image picker*/
      file_picker_callback: (cb, value, meta) => {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        input.addEventListener('change', (e) => {
          const file = e.target.files[0];

          const reader = new FileReader();
          reader.addEventListener('load', () => {
            /*
              Note: Now we need to register the blob in TinyMCEs image blob
              registry. In the next release this part hopefully won't be
              necessary, as we are looking to handle it internally.
            */
            const id = 'blobid' + (new Date()).getTime();
            const blobCache = tinymce.activeEditor.editorUpload.blobCache;
            const base64 = reader.result.split(',')[1];
            const blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            /* call the callback and populate the Title field with the file name */
            cb(blobInfo.blobUri(), { title: file.name });
          });
          reader.readAsDataURL(file);
        });

        input.click();
      }

    });
  }
});