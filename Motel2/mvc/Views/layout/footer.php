<script src="./public/vendor/jquery-3.5.1.min.js"></script>
<script src="./public/vendor/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="./public/js/script.js"></script>
<script>
  $('button.delete').click(function(e) {
    var dataHref = $(this).attr('data-href');
    $('#exampleModal a').attr('href', dataHref);
  });
  $('form').validate({
    rules: {
      name: 'required',
      date: 'required',
      address: 'required',
      password: {
        minlength: 5,
        required: true
      },


    }
  });
  // const filesUpload = $(".uploadfile");
  // const input = $("#uploadfile")
  // $(".uploadfile").addEventListener("click", function() {
  //   input.click();
  // });
</script>
</body>

</html>