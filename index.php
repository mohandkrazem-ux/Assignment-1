<?php
$key = "12345678901234567890123456789012"; 
$iv = "1234567890123456"; 

$inputText = "";
$encryptedText = "";
$decryptedText = "";
if (isset($_POST["encrypt"])) {

    $inputText = $_POST["text"];
    $enc = openssl_encrypt($inputText, "AES-256-CBC", $key, 0, $iv);
    $encryptedText = base64_encode($enc);
}
if (isset($_POST["decrypt"])) {

    $inputText = $_POST["text"];
    $decoded = base64_decode($inputText);
    $decryptedText = openssl_decrypt($decoded, "AES-256-CBC", $key, 0, $iv);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>تشفير وفك التشفير</title>
</head>
<body>

<h2>باستخدام خوارزمية تشفير و فك تشفير AES-256-CBC</h2>
<form method="POST">

<textarea name="text" rows="6" cols="60"><?php echo $inputText; ?></textarea>
<br><br>
<button name="encrypt" type="submit">تشفير</button>
<button name="decrypt" type="submit">فك التشفير</button>
</form>
<?php if ($encryptedText != "") { ?>
    <h3>النص المشفر:</h3>
    <div><?php echo $encryptedText; ?></div>
<?php } ?>
<?php if ($decryptedText != "") { ?>
    <h3>النص بعد فك التشفير:</h3>
    <div><?php echo $decryptedText; ?></div>
<?php } ?>

</body>
</html>
