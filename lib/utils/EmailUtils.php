<?php
/*
 * Created on Jun 6, 2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
class EmailUtils
{
    function EmailUtils()
    {
    }
    
    public static function ParseEmailName($text)
    {
        $tmp = array();
        $tmp['name'] = '';
        $tmp['address'] = '';
        $tmp['string'] = '';
        
        $fields = explode('<', $text);
        // var_dump($fields);
        if (sizeof($fields) < 2) {
            $tmp['address'] = trim($fields[0]);   
        } else {
            $tmp['name'] = trim($fields[0]);
            $tmp['address'] = trim(str_replace('>', '', $fields[1]));   
        }
        
        $tmp['string'] = $tmp['address'];
        if ($tmp['name'] != '') {
            $tmp['string'] = $tmp['name'] . ' <' . $tmp['address'] . '>';
        }
        
        // var_dump($tmp);
        return $tmp;
    }
    
    public static function GD_SMTPMail($recipients = array(), $subject, $body, $debug = true, $from = false, $attachmentFilePath = false)
    {
        $mail = new PHPMailer();        

        if (sfConfig::get('app_email_smtp_mode', false)) {
		//if (true){
            $mail->IsSMTP();
            $mail->Host = sfConfig::get('app_email_smtp_server');
            if ( sfConfig::get('app_email_smtp_username') ) {
                $mail->SMTPAuth = true;
                $mail->Username = sfConfig::get('app_email_smtp_username');
                $mail->Password = sfConfig::get('app_email_smtp_password');
            }
        } else {
            $email->IsMail();
            $email->Host = "localhost";
        }
        
        if ($from === false) {
            $mail->From = sfConfig::get('app_email_from_address_default');
            $mail->FromName = sfConfig::get('app_email_from_default');   

        } else if (is_array($from) && array_key_exists('address', $from)) {
            if (array_key_exists('name', $from)) {
                $mail->From = $from['address'];
                $mail->FromName = $from['name']; 
            } else {
                $mail->From = $from['address'];
            }
        } else {
            $mail->From = $from;
        }
        if ($attachmentFilePath !== false) {
        	if (is_array($attachmentFilePath)):
        		foreach($attachmentFilePath as $file):
        			$mail->AddAttachment($file);
        		endforeach;
        	else:
            	$mail->AddAttachment($attachmentFilePath);
            endif;
        }
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->WordWrap = 70;
        
        // $recipients = array('nyoman@micronclean.com.sg', 'development.address@gmail.com', 'test.address@yahoo.com', 'development.address@hotmail.com');

        
        $recipientsList = array();
        foreach ($recipients as $address) {
            $mail->ClearAddresses();
            if (is_array($address) && array_key_exists('address', $address)) {
                if (array_key_exists('name', $address)) {
                    $mail->AddAddress($address['address'], $address['name']);
                    $recipientsList[] = $address['address'] . ' ' . $address['name'];
                } else {
                    $mail->AddAddress($address['address']);
                    $recipientsList[] = $address['address'];
                }
            } else {
                $mail->AddAddress($address);
                $recipientsList[] = $address;
            }       
            $sent = $mail->Send();
//		echo 'just sent';
//		exit();
            
        }

         
        
        $debugBody = implode("\n", $recipientsList) . "\n\n" . $body;
        

        if ($debug) {
            if(!$sent)
            {
                //echo "Message was not sent";
                //echo "Mailer Error: " . $mail->ErrorInfo;
                $debugBody = $mail->ErrorInfo . "\n\n" . $debugBody;
                //mail (sfConfig::get('app_email_debug_address_local'), 'Email Failed: ' . $subject, $debugBody);
                $mail->Subject = 'Email Failed: ' . $subject;
                $mail->Body = $debugBody;
                $mail->ClearAddresses();
                $mail->AddAddress(sfConfig::get('app_email_debug_address'));
                $mail->Send();

            } else {
                // echo "Message has been sent";        
                //mail (sfConfig::get('app_email_debug_address_local'), 'Email Sent: ' . $subject, $debugBody);
                $mail->Subject = 'Email Sent: ' . $subject;
                $mail->Body = $debugBody;
                $mail->ClearAddresses();
                $mail->AddAddress(sfConfig::get('app_email_debug_address'));
                $mail->Send();
            }    
        }
        return $sent;
    }


}
?>
