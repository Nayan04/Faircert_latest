<?php $name = 'nayan';
      $c_id='CLIENT_1010';
$to = 'nayan.techjava@gmail.com';
$subject = 'Regarding confirmation of your application received';
$message = '<html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>Welcome To Faircert Certification Service Pvt. Ltd.</title>
                    </head>

                    <body>
                    <table width="550" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #999;" align="center">
                      <tr>
                        <td valign="top" style="background-color:#474747; width:550px;"><a href="http://www.faircert.com">
                        <img src="../../dist/img/logo.png" style="height: 100px;margin: 6px;width: 100px;" alt="logo"></a></td>
                      </tr>
                      <tr>
                        <td>
                        <table width="537" border="0" cellspacing="0" cellpadding="0" style="background-color:#fcfcfa; margin-top:10px; float:left; border:1px solid #d5d5d5; margin-left:3px; margin-bottom:10px;">
                      <tr>
                        <td style="margin:0px;font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#074e8c; border-bottom:1px dashed #d5d5d5; margin-bottom:5px; padding:10px 0 10px 10px;">Dear ' . $name . '</td>
                      </tr>
                      <tr>
                        <td style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#000; padding:10px 10px 10px 10px; line-height:20px;"> 
                          Greetings from FairCert!!!<br>
                          Thank you for selecting FairCert Certification Services Pvt. Ltd. as your certification body. We assure you the best of services
You have been allotted with Registration No:'.$c_id.'.<p>
    We request you to keep this letter safely as the Registration number allotted to you may be need it all the time you are associated with Organic certification with us.<br>  The omission of activity granted (if any) is Nil/ XXXXXXXXXXXXXXXX
<br>Your inspection / Audit dates once confirmed will be intimated to you.
<br>You are free to contact us for any further clarifications. 




                        </td>
                      </tr>
                      <td style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#000; padding:10px 10px 10px 10px; line-height:20px;">Best Regards<br />
                    Yours truly,<br/>
                    For <br/>  								  
                    FairCert Certification Services Pvt Ltd.<br/>
                    Khargone, '.date('d.m.Y').'<br/> 
                    If you want to leave feedback email us at <a href="#">info@faircert.com</a></td>
                      </tr>
                    </table>
                    </td>
                    </table>

                    </body>
                    </html>';


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@faircert.com>' . "\r\n";
$headers .= 'Cc: cert.fair@gmail.com' . "\r\n";

mail($to, $subject, $message, $headers);