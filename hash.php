<?php
session_start();

function encryptPhoneNumber($phoneNumber) {
    $replacements = array(
        '5'=>'0',
        '7'=>'1',
        '9'=>'2',
        '1'=>'3',
        '6'=>'4',
        '8'=>'5',
        '2'=>'6',
        '4'=>'7',
        '3'=>'8',
        '0'=>'9',
      );
    
      $encrypted = strtr($phoneNumber, $replacements);
    return $encrypted;
}


// function decryptPhoneNumber($code) {
//     $decrypted = str_replace(
//         array(6, 2, 7, 5, 9, 1, 4, 2, 3, 8),
//         array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9), $code);
//     return $decrypted;
// }


function decryptPhoneNumber($encryptedPhoneNumber) {
    $replacements = array(
      '0' => '5',
      '1' => '7',
      '2' => '9',
      '3' => '1',
      '4' => '6',
      '5' => '8',
      '6' => '2',
      '7' => '4',
      '8' => '3',
      '9' => '0',
    );
  
    $decrypted = strtr($encryptedPhoneNumber, $replacements);
    return $decrypted;
  }
  



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["phoneNumber"])) { 
    
    $phoneNumber=$_POST["phoneNumber"];

    $start=substr($phoneNumber,0,5);
    
    $end=substr($phoneNumber, 5);

    $encryptedPhoneNumber = $start.encryptPhoneNumber($end); 
    
    $_SESSION['phoneNumber']=$phoneNumber;

    $_SESSION['encryptedPhoneNumber']=$encryptedPhoneNumber;
   
    header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["code"])) { 
    
    $code=$_POST["code"];

    $start=substr($code,0,5);
    //var_dump($start);
    
    $end=substr($code, 5);
    //var_dump($end);
    
    $decryptedNumber = $start.decryptPhoneNumber($end); 
    //echo $decryptedNumber;
    //return;
   
    $_SESSION['code']=$code;

    $_SESSION['decryptedNumber']=$decryptedNumber;
   
    header("Location: index.php");
}


// $decryptedPhoneNumber = decryptPhoneNumber($encryptedPhoneNumber);
// echo "Дешифрованный номер телефона: " . $decryptedPhoneNumber;
?>

                    