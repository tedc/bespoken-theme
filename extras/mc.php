<?php
    require("vendor/autoload.php");
    use \DrewM\MailChimp\MailChimp;
    $list = "52ef3e0e70";
    $email = $_POST['email'];
    $MailChimp = new MailChimp('68b4b1bde24a44007c954f67dfbe3fe4-us13');
    $result = $MailChimp->post("lists/$list/members", [
                'email_address' => $email,
                'status'        => 'subscribed',
            ]);
    echo $result["status"];
?>