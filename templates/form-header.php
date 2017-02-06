<?php
    if($_POST) :
    	$email = $_POST['email'];
    	$name = $_POST['sender'];
    	$sender = $name;
        $message = $_POST['message'];
        //$pTo = array('hello@bspkn.it');
        $pTo = array('e.grandinetti@bspkn.it');
        $obj = $_POST['obj'];
        $pSubject = $obj.' da ' . $sender;
        $rSubject = $obj. ', risposta automatica da Bespoken';
    if(empty($_POST['email'])) $fields_not_set[] = "email";
    if(empty($_POST['tel'])) $fields_not_set[] = "tel";
    $name_row = (!empty($_POST['sender'])) ? '<tr style="border-bottom: 1px solid #e1e1e1;"><td style="text-align:center;padding:20px;"><em style="color:#7d7d7d;font-size:18px;font-style:italic">Da</em><br />'.$sender.'</td></tr>' : "";
    $email_row = (!empty($_POST['email'])) ? '<tr style="border-bottom: 1px solid #e1e1e1;"><td style="text-align:center;padding:20px;"><em style="color:#7d7d7d;font-size:18px;font-style:italic">Email</em><br />'.$email.'</td></tr>' : "";
    $tel_row = (!empty($_POST['tel'])) ? '<tr style="border-bottom: 1px solid #e1e1e1;"><td style="text-align:center;padding:20px;"><em style="color:#7d7d7d;font-size:18px;font-style:italic">Numero di telefono</em><br />'.$tel.'</td></tr>' : "";
    $message_row = (!empty($_POST['tel'])) ? '<tr style="border-bottom: 1px solid #e1e1e1;"><td style="text-align:center;padding:20px;"><em style="color:#7d7d7d;font-size:18px;font-style:italic">Messaggio</em><br />'.$message.'</td></tr>' : "";
    $body = $name_row.$email_row.$tel_row.$message_row;
    $resp = '<tr style="border-bottom: 1px solid #e1e1e1;"><td style="text-align:center;padding:20px;"><p style="line-height:1.35">Grazie per averci contattato.<br/>Ti risponderemo prima possibile.</p></td></tr>';
    function template($body) {
        $html = '<html><head><meta charset="utf-8" /></head><body style="background-color:#f4f4f4"><div style="background-color:#fff;font-family:\'Helvetica Neue\', Helvetica, Arial, san-serif;font-size:18px;color:#464646;max-width:500px;margin:0 auto;"><table style="width:100%;border-collapse:collapse;"><thead><tr><td style="padding: 20px;text-align:center; background-color:#f4f4f4"><a href="http://www.bspkn.it/" style="text-decoration:none"><img src="http://www.bspkn.it/assets/img/logo-mail.png" style="border:0;width:100%;max-width:200px;height:auto"/></a></td></tr></thead><tfoot><tr><td style="padding:20px; text-align:center;color:#7d7d7d;font-size:11px">&copy;BSPKNStudio, Via Giorgio e Guido Paglia 1414, 24122 Bergamo (BG)<br /><a href="http://www.bspkn.it/" style="text-decoration:none;font-weight:bold;color:#80217e">wwww.bspkn.it</a></td></tr></tfoot><tbody>'.$body.'</tbody></table></div></body></html>';
        return $html;
    }
    if(empty($fields_not_set)) {
            $transport = Swift_MailTransport::newInstance();
            $mMailer = Swift_Mailer::newInstance($transport);
            $rEmail = Swift_Message::newInstance();
            $mEmail = Swift_Message::newInstance();
            $mEmail->setSubject($pSubject);
            $mEmail->setTo($pTo);
            //$mEmail->setBcc(array('e.grandinetti@bspkn.it','a.trussardi@bspkn.it', 'a.mangilli@bspkn.it', 'a.biffi@bspkn.it'));
            $mEmail->setFrom(array($email => $name));
            $mEmail->setReplyTo(array($email));
            $mEmail->setBody(template($body), 'text/html');
            $rEmail->setSubject($rSubject);
            $rEmail->setFrom(array('e.grandinetti@bspkn.it' => 'Bespoken - Digitale su misura'));
            $rEmail->setTo(array($email));
            $rEmail->setBody(template($resp), 'text/html');

            if(!empty($_FILES['filecv'])) {
                $attachment = Swift_Attachment::fromPath($_FILES['filecv']['tmp_name'])->setFilename($_FILES['filecv']['name']);
                $mEmail->attach( $attachment );
            }
            if( $mMailer->send($mEmail) && $mMailer->send($rEmail)){
                echo "sent";
            } else {
                echo "error";
            }
        }
    endif; 
?>
