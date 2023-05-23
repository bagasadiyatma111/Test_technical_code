<?php
$action = $_POST['action'];
$inputNumber = $_POST['inputNumber'];

if ($action === 'generateTriangle') {
  
  if (!is_numeric($inputNumber) || $inputNumber <= 0 || !is_int((int)$inputNumber)) {
    http_response_code(400);
    echo json_encode(array('error' => 'Masukkan angka positif yang valid.'));
    return;
  }

  
  $triangle = generateTriangle($inputNumber);

  
  echo $triangle;
} elseif ($action === 'generateOddNumbers') {
  
  if (!is_numeric($inputNumber) || $inputNumber <= 0 || !is_int((int)$inputNumber)) {
    http_response_code(400);
    echo json_encode(array('error' => 'Masukkan angka positif yang valid.'));
    return;
  }

  
  $oddNumbers = generateOddNumbers($inputNumber);

 
  echo $oddNumbers;
} elseif ($action === 'generatePrimeNumbers') {
  
  if (!is_numeric($inputNumber) || $inputNumber <= 0 || !is_int((int)$inputNumber)) {
    http_response_code(400);
    echo json_encode(array('error' => 'Masukkan angka positif yang valid.'));
    return;
  }

  
  $primeNumbers = generatePrimeNumbers($inputNumber);

  
  echo $primeNumbers;
}


function generateTriangle($inputNumber) {
  $triangle = '';
  $number = 10;

  for ($i = 1; $i <= $inputNumber; $i++) {
    $triangle .= str_pad($number, $i, '0') . '<br>';
    $number *= 10;
  }

  return $triangle;
}


function generateOddNumbers($inputNumber) {
  $oddNumbers = '';

  for ($i = 1; $i <= $inputNumber; $i++) {
    if ($i % 2 !== 0) {
      $oddNumbers .= $i . ', ';
    }
  }

  $oddNumbers = rtrim($oddNumbers, ', ');

  return $oddNumbers;
}


function generatePrimeNumbers($inputNumber) {
  $primeNumbers = '';

  for ($i = 2; $i <= $inputNumber; $i++) {
    if (isPrime($i)) {
      $primeNumbers .= $i . ', ';
    }
  }


  $primeNumbers = rtrim($primeNumbers, ', ');

  return $primeNumbers;
}


function isPrime($number) {
  if ($number < 2) {
    return false;
  }

  for ($i = 2; $i <= sqrt($number); $i++) {
    if ($number % $i === 0) {
      return false;
    }
  }

  return true;
}