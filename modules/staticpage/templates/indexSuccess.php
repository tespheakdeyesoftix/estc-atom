<?php $menu = get_component('menu', 'staticPagesMenu'); ?>
<?php $layout = 'layout_1col'; ?>
<?php if (!empty($menu)) { ?>
  <?php $layout = 'layout_2col'; ?>
  <?php slot('sidebar'); ?>
    <?php echo $menu; ?>
  <?php end_slot(); ?>
<?php } ?>
<?php decorate_with($layout); ?>

<?php slot('title'); ?>
  <h1><?php echo render_title($resource->getTitle(['cultureFallback' => true])); ?></h1>
<?php end_slot(); ?>

<div class="page">
  <div>
        <!-- =======================================================Send Email======================================================== -->
        <?php
    if ($_POST["txt_email"]){
// Variable Get From Default Contact Form

        $smtp_host      = 'mail.estccomputer.com';
        $smtp_username  = 'no-reply@estccomputer.com';
        $smtp_password  = 'fe2?-[X9h;u?fe2?-[X9h;u?';

        $emailto    = $_POST["emailto"];
        $emailcc    = $_POST['emailcc'];
        $sitename   = $_POST['sitename'];
        $root_url   = $_POST['rooturl'];
        $address    = $_POST['address'];
        $logos      = $_POST['logo'];
        $color      = $_POST['color'];

        // Variable Mailer
        $lname      = $_POST['txt_lname'];
        $fname      = $_POST['txt_fname'];
        $email      = $_POST['txt_email'];
        $phone        = $_POST['txt_phonenumber'];
        $msg      = $_POST['txt_message'];
        // $numbere_of_day = strtotime("$enddate") - strtotime("$startdate");

        $earlier = new DateTime("$enddate");
        $later = new DateTime("$startdate ");
        $numbere_of_day  = $later->diff($earlier)->format("%a");

        date_default_timezone_set('Asia/Phnom_Penh');
        $date = date('l, F d, Y - h:i:s a');
        // ==========================================
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => '6LdAjzwoAAAAAP4jPL0xcBfWdOkqk9IcSZx79TNf',
            'response' => $_POST["g-recaptcha-response"]
        );
        $query = http_build_query($data);

        $options = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                    "Content-Length: " . strlen($query) . "\r\n" .
                    "User-Agent:MyAgent/1.0\r\n",
                'method'  => "POST",
                'content' => $query
            ),
        );

        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);


        if ($captcha_success->success == false) {
            echo "<p style='font-family: arial;font-size: 22px;text-align: center;padding: 30px;background: #eee;position: absolute;color: #3e3e3e;top: 40%;left: 50%;-webkit-transform: translate(-50%,-50%);transform: translate(-50%,-50%);'>
            Please verify that you are not a robot.<br><br> Please go <a href='javascript:history.go(-1)'>back</a> and try again.</p>";
            exit;
        } else {
            require 'phpmailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;

            // Owner Mail
            $HTML = "
                <div style='margin: auto; max-width: 100%;'>
                <table style='width: 100%; border-collapse: collapse; border: 1px solid #ccc; font-size: 14px;'>
                    <thead style='background-color: $color;'>
                        <tr>
                            <td style='text-align: center;' colspan='2'>
                                <a href='$root_url' target='_blank'>
                                    <h1 style='color: #fff;'>$sitename</h1>
                                </a>
                            </td>
                        </tr>
                    </thead>
                    <tbody style='vertical-align: text-top; line-height: 18px;'>

                    <!--    Field Data Mailler     -->

                    <tr>
                    <td style='padding: 10px 20px;' width='150px'>Last Name</td>
                        <td style='padding: 10px 20px;'>$title $lname</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px 20px;' width='150px'>First Name</td>
                        <td style='padding: 10px 20px;'>$title $fname</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px 20px;' width='150px'>Email</td>
                        <td style='padding: 10px 20px;'>$email</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px 20px;' width='150px'>Phone Number</td>
                        <td style='padding: 10px 20px;'>$phone</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px 20px;' width='150px'>Message</td>
                        <td style='padding: 10px 20px;'>$msg</td>
                    </tr

                    <!--    Field Data Mailler     -->

                    </tbody>
                </table>
                </div>
                ";

            $mail->IsSMTP();                                     // Set mailer to use SMTP
            $mail->Host = $smtp_host;           // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $smtp_username;                 // SMTP username
            $mail->Password = $smtp_password;                           // SMTP password
            $mail->SMTPSecure = 'ssl';                             // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;

            $mail->setFrom($smtp_username);
            $mail->addAddress($emailto);
            $mail->addReplyTo($email);        // Add a recipient
            $mail->addCC($emailcc);

            $mail->isHTML(true); // Set email format to HTML

            $mail->Subject = 'Inquiry from ' . $sitename;
            $mail->Body    = $HTML;
            
            if (!$mail->send()) {
                echo "Message could not be sent1.";
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                // Auto Respond // Customer
                $mail = new PHPMailer;
                $HTML = "
                <div style='margin: auto; max-width: 100%;'>
                    <p>Dear <b>$title $name</b></p>
                    <p>This is an automatic message sent by our website to view your information that you have sent to us.</p>
                    <table style='width: 100%; border-collapse: collapse; border: 1px solid #ccc; font-size: 14px;'>
                        <thead style='background-color: $color;'>
                            <tr>
                                <td style='text-align: center;' colspan='2'>
                                    <a href='$root_url' target='_blank'>
                                        <h1 style='color: #fff;'>$sitename</h1>
                                    </a>
                                </td>
                            </tr>
                        </thead>
                        <tbody style='vertical-align: text-top; line-height: 18px;'>
                            
                        <!--    Field Data Mailler     -->

                        <tr>
                        <td style='padding: 10px 20px;' width='150px'>Last Name</td>
                            <td style='padding: 10px 20px;'>$title $lname</td>
                        </tr>
                        <tr>
                            <td style='padding: 10px 20px;' width='150px'>First Name</td>
                            <td style='padding: 10px 20px;'>$title $fname</td>
                        </tr>
                        <tr>
                            <td style='padding: 10px 20px;' width='150px'>Email</td>
                            <td style='padding: 10px 20px;'>$email</td>
                        </tr>
                        <tr>
                            <td style='padding: 10px 20px;' width='150px'>Phone Number</td>
                            <td style='padding: 10px 20px;'>$phone</td>
                        </tr>
                        <tr>
                            <td style='padding: 10px 20px;' width='150px'>Message</td>
                            <td style='padding: 10px 20px;'>$msg</td>
                        </tr

                        <!--    Field Data Mailler     -->

                        </tbody>
                        <tfoot style='vertical-align: text-top; line-height: 18px; color: $color;'>
                            <tr>
                                <td colspan='2' style='height: 2rem;'></td>
                            </tr>
                            <tr>
                                <td style='padding: 5px 20px;' colspan='2'>We'll manually review your message and reply you as soon as possible.</td>
                            </tr>
                            <tr>
                                <td style='padding: 5px 20px;' colspan='2'>Best Regards,</td>
                            </tr>
                            <tr>
                                <td style='padding: 5px 20px; font-weight: 700; font-size: 16px;' colspan='2'>$sitename</td>
                            </tr>
                            <tr>
                                <td colspan='2' style='height: 2rem;'></td>
                            </tr>
                        </tfoot>
                    </table>
                    <footer style=' font-size: 14px;'>
                        <p>Inquiry Date : $date</p>
                        <p>Address : $address</p>
                    </footer>
                </div>
                ";
                $mail->IsSMTP();                                     // Set mailer to use SMTP
                $mail->Host = $smtp_host;           // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = $smtp_username;                 // SMTP username
                $mail->Password = $smtp_password;                            // SMTP password
                $mail->SMTPSecure = 'ssl';                             // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;

                $mail->setFrom($smtp_username);
                $mail->addAddress($email);    // Add a recipient
                $mail->addReplyTo($emailto);


                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = 'Your Inquiry';
                $mail->Body    = $HTML;

                if (!$mail->Send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    header('location: thankyou');
                }
            }
        }
    }  else {
    }
  ?>
<!-- ========================================================================================================================= -->
    <?php echo render_value_html($sf_data->getRaw('content')); ?>
  </div>
</div>

<?php if (QubitAcl::check($resource, 'update')) { ?>
  <?php slot('after-content'); ?>
      <section class="actions">
        <ul>
          <li><?php echo link_to(__('Edit'), [$resource, 'module' => 'staticpage', 'action' => 'edit'], ['class' => 'c-btn c-btn-submit', 'title' => __('Edit this page')]); ?></li>
          <?php if (QubitAcl::check($resource, 'delete')) { ?>
            <li><?php echo link_to(__('Delete'), [$resource, 'module' => 'staticpage', 'action' => 'delete'], ['class' => 'c-btn c-btn-delete']); ?></li>
          <?php } ?>
        </ul>
      </section>
  <?php end_slot(); ?>
<?php } ?>
