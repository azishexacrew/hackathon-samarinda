function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#image-holder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#profileimg").change(function() {
  	readURL(this);
});

$( "#register-form" ).validate({
  rules: {
    username: {
      required: true
    },
    parent: {
      required: function(element) {
        return $("#age").val() < 13;
      }
    }
  }
});

