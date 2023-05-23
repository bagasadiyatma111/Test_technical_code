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
      <td> <input type="number" id="inputNumber" name="inputNumber" min="1" placeholder="Input Angka"></td>
    </tr>
    <tr>
      <td> <button type="submit" id="generateTriangle">Generate Segitiga</button></td>
      <td><button type="submit" id="generateOddNumbers">Generate Bilangan Ganjil</button></td>
      <td> <button type="submit" id="generatePrimeNumbers">Generate Bilangan Prima</button></td>
    </tr>
   
    
   
   
  </form>
 </table>
  <div id="result"></div>

  <script>
    $(document).ready(function() {
      $('#generateForm').submit(function(event) {
        event.preventDefault();

        var inputNumber = $('#inputNumber').val();
        var action = $(event.target.activeElement).attr('id');

       
        if (!inputNumber || inputNumber <= 0 || !Number.isInteger(Number(inputNumber))) {
          $('#result').text('Masukkan angka positif yang valid.');
          return;
        }

      
        $.ajax({
          url: 'backend.php',
          type: 'POST',
          data: {
            action: action,
            inputNumber: inputNumber
          },
          success: function(response) {
            
            $('#result').html(response);
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
            $('#result').text('Terjadi kesalahan. Silakan coba lagi.');
          }
        });
      });
    });
  </script>
</body>
</html>