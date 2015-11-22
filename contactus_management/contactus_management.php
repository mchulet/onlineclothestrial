<?php
    session_start();
    include "../includes/connection.php";

    if(isset($_REQUEST['form_name']))
    {
        $form_name = $_REQUEST['form_name'];
    }

    switch ($form_name)
    {

        case "contactform" :
        {
            if (isset($_POST['submit'])) {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
                $status = '1';

                $insert = mysql_query("INSERT INTO contact_form_info (name, email, subject, message, status)
                            VALUES ('" . $name . "','" . $email . "','" . $subject . "','" . $message . "','" . $status . "')");

                $to      = $email;
                $subject = $subject;
                $message = $message;
                $headers = 'From: admin@onlineclothes.com' . "\r\n";

                mail($to, $subject, $message, $headers);

                $errorMsg = "Message Received successfully..!! We will contact you ASAP...!! ";
                header('Location: ../index.php');
            }
            else{
                $errorMsg = "User not registered successfully ";
            }
        }
        default:
        break;
    }

?>