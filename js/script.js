// DISPLAY IMAGE FILENAME in add article page
$('#article-image').on('change', function () {
    var fileName = $(this).val();
    var path = "C:\\fakepath\\" + fileName;
    var file = path.replace(/^.*\\/, "");
    $(this).next('.custom-file-label').html(file);
})

//call texteditor function for article text area
$(function() {
    $('textarea#froala-editor').froalaEditor()
  });