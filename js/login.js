$(document).ready(function(){
  $('#loginForm').submit(function(event) {
    var action = $(this).attr('action');
    var datos = $(this).serialize();
    $.ajax({
      type: "POST",
      url: action,
      data: datos,
      dataType: 'json',
      success: function(data){
        if(data.success){
          window.location.href = "local.php";
        }else{
          alert(data.msg);
        }
      }
    });
    event.preventDefault();
  });
});
