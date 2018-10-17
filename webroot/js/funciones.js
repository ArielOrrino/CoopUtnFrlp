function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
    x.type = "password";
    }
}


function guardarMonto() {
    var montoDonacion = document.getElementById("monto").value;
    redirigirMp(montoDonacion);
}

function redirigirMp(MD) {
	    window.location = "confirm/"+MD;
	}

//---------------------LOGIN ANIMADO--------------------//
// Get the modal
var modal = document.getElementById("mymodal");

// Get the button that opens the modal
var btn = document.getElementById("mybtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
  span.onclick = function() {
  modal.style.display = "none";
 }

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
//-----------------FIN-LOGIN ANIMADO--------------------//


//---------------------LOGIN INCORRECTO--------------------//

src="code.jquery.com/jquery-1.12.4.js";
src="code.jquery.com/ui/1.12.1/jquery-ui.js";
$(document).ready(function(){
 $('#login').click(function(){
  var usuario = $('#usuario').val();
  var password = $('#password').val();
  if($.trim(usuario).length > 0 && $.trim(password).length > 0)
  {
   $.ajax({
    url:"usuarios/login",
    method:"POST",
    data:{usuario:usuario, password:password},
    cache:false,
    beforeSend:function(){
     $('#login').val("connecting...");
    },
    success:function(data)
    {
     if(data)
     {
      $("body").load("home.php").hide().fadeIn(1500);
     }
     else
     {
      var options = {
       distance: '40',
       direction:'left',
       times:'3'
      }
      $("#test").effect("shake", options, 800);
      $('#login').val("Login");
      $('#error').html("<span class='text-danger'>Invalid username or Password</span>");
     }
    }
   });
  }
  else
  {

  }
 });
});
//-----------------FIN-LOGIN INCORRECTO--------------------//
