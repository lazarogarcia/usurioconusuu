/* Toggle between adding and removing the "responsive" class
 to topnav when the user clicks on the icon 
 https://www.w3schools.com/howto/howto_js_responsive_navbar_dropdown.asp
 */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  } 