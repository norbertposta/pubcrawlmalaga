<?php
// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LeWdswZAAAAAKIYiTiowa2M8xJYm58cM-kzikn-',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
    } else {
        // If CAPTCHA is successfully completed...

        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $subject=$_POST['subject'];
            $mailFrom=$_POST['mail'];
            $message=$_POST['message'];
            
            $mailTo = "info@europalibreopinion.org";
            $headers = "From: ".$mailFrom;
            $txt ="You have received an e-mail from: ".$name.".\n\nEmail: ".$mailFrom."\nSubject: ".$subject."\nMessage: ".$message;
            
            if ($name != '' && $mailFrom != '') {
                if (mail ($mailTo, $subject, $message, $mailFrom)) {
                    echo '<p>Your message has been sent.</p>';
                } else { 
                    echo '<p>Something went wrong, go back and try again.</p>'; 
                }
            }  else {
                echo '<p>You need to fill in all required fields.</p>';
            }
            }
            
            mail($mailTo,$subject,$txt,$headers);
            header("Location:messagesent.php");
    }
} else { ?>
    
<!-- FORM GOES HERE -->
<form></form>

<?php } ?>




<?php




?>