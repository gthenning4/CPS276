<?php
//* PHP encryption


$secretKey = 'CPS276';
$cipherMethod = 'AES-128-CBC';
$encryptedData = @openssl_encrypt ('5432gfed',$cipherMethod , $secretKey);
echo('<br><br>');
echo($encryptedData);

$originalText = @openssl_decrypt ($encryptedData,$cipherMethod , $secretKey);
echo('<br><br>');
echo($originalText);

echo('<br><br>');
echo("md5(doug)".md5("doug"));
