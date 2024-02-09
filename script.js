function isvalid()
{
    var user = document.form.user.value;
    var pass = document.form.pass.value;
    if(user.length=="" && pass.length=="")
    {
        alert("Username and password field is empty");
        return false;
    }
    else
    {
        if(user.length=="")
        {
            alert("Username is empty");
            return false;
        }
        if(pass.length=="")
        {
            alert("Password is empty");
            return false;
        }
    }
}

// Scroll back to top button
// Get the button:
let mybutton1 = document.getElementById("myBtn1");
// let mybutton2 = document.getElementById("myBtn2");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton1.style.display = "block";
    // mybutton2.style.display = "block";
  } else {
    mybutton1.style.display = "none";
    // mybutton2.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

function rocketOnHover(e) {
  e.src = "images/gifs/rocket.gif";
}

function rocketOffHover(e) {
  e.src = "images/rocket.png";
}


function backOnHover(x) {
  x.src = "../images/gifs/double-left.gif";
}

function backOffHover(x) {
  x.src = "../images/double-left.png";
}