jQuery(document).ready(function($) {
  /* Time */
  var myVar = setInterval(function () {
    myTimer();
  }, 100);

  function myTimer() {
    // Check if the element with ID "time" exists
    var timeElement = document.getElementById("time");
    
    if (timeElement) {
      var d = new Date();
      timeElement.innerHTML = d.toLocaleTimeString();
    }
  }
});