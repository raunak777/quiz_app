<?php include_once 'header.php'; 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
  }
  include_once 'Users.php';
  $usr = new Users();
  if (isset($_GET['val'])) {
    $val = $_GET['val'];
    $data = $usr->get_ques_ans($val);
  }
  ?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

/*input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}*/

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: red;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<body oncontextmenu = "return false;">

<form id="regForm" method="POST" action="resultpage.php">
  <h1 class="bg-success text-white ">Online Quiz<span class="float-right" id="time">10:00</span></h1>
  <?php
  $htmldata='<input type="text" hidden name="subname" value="'.$_GET['val'].'" >';
  for ($i=0; $i <count($data) ; $i++) {
  $htmldata.='<div class="tab">
    
      <h2 >Que:'.($i+1). ' <span id="que"> '. $data[$i]['questions'].'</span></h2>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="'.$data[$i]['q_id'].'" value="1" id="option1">
        <label class="form-check-label" for="flexRadioDefault1">
          <span id="opt1">'. $data[$i]['opt1'].'</span>
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="'.$data[$i]['q_id'].'" value="2" id="option2">
        <label class="form-check-label" for="flexRadioDefault2">
          <span id="opt2">'. $data[$i]['opt2'].'</span>
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="'.$data[$i]['q_id'].'" value="3" id="option3">
        <label class="form-check-label" for="flexRadioDefault1">
          <span id="opt3">'. $data[$i]['opt3'].'</span>
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="'.$data[$i]['q_id'].'" value="4" id="option4">
        <label class="form-check-label" for="flexRadioDefault2">
          <span id="opt4">'. $data[$i]['opt4'].'</span>
        </label>
      </div>
      <div class="form-check">
        <input hidden class="form-check-input" type="radio" name="'.$data[$i]['q_id'].'" value="" id="option4" checked>
        <label class="form-check-label" for="flexRadioDefault2">
          <span id="opt4"></span>
        </label>
      </div>
      </div>
      ';
}
  print_r($htmldata);
?>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      <button type="submit" hidden id="sub"></button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
   <?php
   $htm='';
   for ($i=0; $i <count($data) ; $i++) {
    $htm.='<span class="step"></span>';
  }
  print_r($htm);
    ?>
  </div>
</form>

<script>

function restriction()
{
function disableSelection(e) {
if (typeof e.onselectstart != "undefined") e.onselectstart = function() {
return false
};
else if (typeof e.style.MozUserSelect != "undefined") e.style.MozUserSelect = "none";
else e.onmousedown = function() {
return false
};
e.style.cursor = "default"
}
window.onload = function() {
disableSelection(document.body)
};

window.addEventListener("keydown", function(e) {
if (e.ctrlKey && (e.which == 65 || e.which == 66 || e.which == 67 || e.which == 70 || e.which == 73 || e.which == 80 || e.which == 83 || e.which == 85 || e.which == 86)) {
e.preventDefault()
}
});
document.keypress = function(e) {
if (e.ctrlKey && (e.which == 65 || e.which == 66 || e.which == 70 || e.which == 67 || e.which == 73 || e.which == 80 || e.which == 83 || e.which == 85 || e.which == 86)) {}
return false
};

document.onkeydown = function(e) {
e = e || window.event;
if (e.keyCode == 123 || e.keyCode == 18) {
return false
}
};

document.oncontextmenu = function(e) {
var t = e || window.event;
var n = t.target || t.srcElement;
if (n.nodeName != "A") return false
};
document.ondragstart = function() {
return false
};
}
restriction();


var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = true;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
        if (timer==0) {
          document.getElementById("sub").click();
        }
        
    }, 1000);
}

function countdown() {
    var fiveMinutes = 600;
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
}
countdown();


</script>
<?php include_once 'footer.php'; ?>
</body>
</html>
