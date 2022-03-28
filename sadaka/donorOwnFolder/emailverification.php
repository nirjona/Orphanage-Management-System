<?php

$subject='Verify Your Account!';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: sadaka9393@gmail.com" . "\r\n" .
"Reply-To: sadaka9393@gmail.com" . "\r\n" .
"X-Mailer: PHP/" . phpversion();

//echo $sender;
if(mail($receiver,$subject,$message,$headers))
 {
    echo '<script>alert("Check Your email to verify the profile!")</script>';
 }
else
{ echo "Something Went Wrong!";
}
$home_redirect = 'http://localhost:4000/index.php';
      echo '<script>window.location="'.$home_redirect.'"</script>';
?>
