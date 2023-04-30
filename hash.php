<?php
session_start();

function applyCipher($phoneNumber, $cipher) {
    $result = "";
    for ($i = 0; $i < strlen($phoneNumber); $i++) {
        $num = (int)$phoneNumber[$i];
        $new_num = ($num + $cipher[$i % count($cipher)]) % 10;
        $result .= strval($new_num);
    }
    return $result;
}

function encryptPhoneNumber($phoneNumber) {
    $cipher = array(1, 3, 7, 9, 2, 5, 8);
    return applyCipher($phoneNumber, $cipher);
}

function decryptPhoneNumber($encryptedPhoneNumber) {
    $cipher = array(-1, -3, -7, -9, -2, -5, -8);
    return applyCipher($encryptedPhoneNumber, $cipher);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["phoneNumber"])) {
    $phoneNumber = $_POST["phoneNumber"];
    $start = substr($phoneNumber, 0, 5);
    $end = substr($phoneNumber, 5);

    $encryptedPhoneNumber = $start . encryptPhoneNumber($end);

    $_SESSION['phoneNumber'] = $phoneNumber;
    $_SESSION['encryptedPhoneNumber'] = $encryptedPhoneNumber;

    header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["code"])) {
    $code = $_POST["code"];
    $start = substr($code, 0, 5);
    $end = substr($code, 5);

    $decryptedNumber = $start . decryptPhoneNumber($end);

    $_SESSION['code'] = $code;
    $_SESSION['decryptedNumber'] = $decryptedNumber;

    header("Location: index.php");
}
?>
