<?php
$action = $_POST['action'];
$number = $_POST['number'];

if (!is_numeric($number)) {
  echo "Error: Input harus berupa angka!";
  exit;
}

if ($action === 'generateTriangle') {
  $triangle = '';
  $digits = str_split($number);
  $rowCount = count($digits);
  
  for ($i = 0; $i < $rowCount; $i++) {
    $row = '';
    for ($j = 0; $j <= $i; $j++) {
      $row .= $digits[$i];
    }
    $triangle .= $row . "<br>";
  }
  
  echo $triangle;
} elseif ($action === 'generateOddNumbers') {
  $oddNumbers = '';
  for ($i = 1; $i <= $number; $i++) {
    if ($i % 2 !== 0) {
      $oddNumbers .= $i . ' ';
    }
  }
  echo $oddNumbers;
} elseif ($action === 'generatePrimeNumbers') {
  $primeNumbers = '';
  
  for ($i = 2; $i <= $number; $i++) {
    if (isPrime($i)) {
      $primeNumbers .= $i . ' ';
    }
  }
  
  echo $primeNumbers;
} else {
  echo "Error: Action tidak valid!";
  exit;
}

function isPrime($num) {
  if ($num <= 1) {
    return false;
  }
  
  for ($i = 2; $i * $i <= $num; $i++) {
    if ($num % $i === 0) {
      return false;
    }
  }
  
  return true;
}
