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


/*//---------------------LOGIN INCORRECTO--------------------//
src="//code.jquery.com/jquery-1.12.4.js";
src="//code.jquery.com/ui/1.12.1/jquery-ui.js";


// Get the modal
var login = document.getElementById("test");
var btn2 = document.getElementById("vibrar");
console.log(btn2);
// When the user clicks the button, open the modal 
btn2.onclick = function() {
  $( "#id2" ).effect( "shake" );
};*/
//-----------------FIN-LOGIN INCORRECTO--------------------//