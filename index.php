<!DOCTYPE html>
<html>
<head>
  <title>Generate Segitiga</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
   <table>
  <form id="generateForm">
   
    <tr>
      <td> <input type="text" id="numberInput" placeholder="Input Angka"/></td>
    </tr>
    <tr>
    <td><button type="button" onclick="executeAction('generateTriangle')">Generate Segitiga</button></td>
    <td><button type="button" onclick="executeAction('generateOddNumbers')">Generate Bilangan Ganjil</button></td>
   <td> <button type="button" onclick="executeAction('generatePrimeNumbers')">Generate Bilangan Prima</button></td>
    </tr>
    
  </form>
 </table>
  <div id="result"></div>

  <script>
    function validateNumber() {
  var input = document.getElementById("numberInput").value;
  if (isNaN(input)) {
    alert("Input harus berupa angka!");
    return false;
  }
  return true;
}

function executeAction(action) {
  var number = document.getElementById("numberInput").value;
  
  if (!validateNumber()) {
    return;
  }
  
  $.ajax({
    url: "backend.php",
    type: "POST",
    data: { action: action, number: number },
    success: function(response) {
      $("#result").html(response);
    },
    error: function(xhr, status, error) {
      console.error(error);
    }
  });
}
  </script>
</body>
</html>
