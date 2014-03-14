<?php
/**
 * Created by PhpStorm.
 * User: Messoft-5
 * Date: 28/02/14
 * Time: 02:18 PM
 */
    /*require_once('libs/class.phpmailer.php');
    require_once('libs/PHPMailerAutoload.php');*/

    $asunto = 'Contacto Web Haken';
    $correo = "lic_eric_diaz@messoft.com";

    $nombre = $_POST['nombre'];
    $compania = $_POST['compañia'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];
    if(!empty($_POST['web']))
        $web = $_POST['web'];
    else
        $web = 'No especificado';

    $mensaje = $_POST['mensaje'];
    $mensaje_html = '<html>
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
                            <meta charset="utf-8">
                        </head>
                        <body>
                            <p><strong>Nombre: </strong>'.$nombre.'</p>
                            <p><strong>Compa&ntilde;ia: </strong>'.$compania.'</p>
                            <p><strong>Email: </strong>'.$email.'</p>
                            <p><strong>Telefono: </strong>'.$telefono.'</p>
                            <p><strong>Ciudad: </strong>'.$ciudad.'</p>
                            <p><strong>Sitio Web: </strong>'.$web.'</p>
                            <p><br/><br/><strong>Mensaje:</strong><br/><br/>'.$mensaje.'</p>
                        </body>
                    </html>';

// Cabecera que especifica que es un HMTL
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    if(mail($correo,$asunto,$mensaje_html,$cabeceras))
        header ('Location: index.php');
    else
        echo 'error al enviar';

//    $mail = new PHPMailer();

    /*$mail->Mailer = "smtp";
    $mail->Host = "smtp.nuestrohost.com";
    $mail->SMTPAuth = true;
    $mail->Username = "cuenta@nuestrohost.com";
    $mail->Password = "password";*/

//    $mail->From = $email;
//    $mail->FromName = "Haken";
//    //Añadimos la dirección del destinatario
//    $mail->AddAddress("lic_eric_diaz@messoft.com");
//    //Asignamos el subject, el cuerpo del mensaje y el correo alternativo
//    $mail->Subject = "Asunto";
//    $mail->Body = "<p>Nombre: $nombre</p><p>Compañia: $compania</p><p>Email: $email</p><p>Telefono: $telefono</p><p>Ciudad: $ciudad</p><p>Sitio Web: $web</p><p><br/>Mensaje:<br/>$mensaje</p>";
//    $mail->AltBody = "Esto es un ejemplo de correo.";
//    //Si al enviar el correo devuelve true es que tod o bien hola
//    if($mail->Send())
//    {
//        //Sacamos un mensaje de que
//        echo "Mensaje enviado correctamente.";
//    }
//    else
//    {
//        //Sacamos un mensaje con el error.
//        echo "Ocurrió un error al enviar el correo electrónico.";
//        echo "<br/><strong>Información:</strong><br/>".$mail->ErrorInfo;
//
//    }


/*$mail = new PHPMailer();
//Set who the message is to be sent from
$mail->setFrom('lic_eric_diaz@messoft.com', $nombre);
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('lic_eric_diaz@messoft.com');
//Set the subject line
$mail->Subject = 'PRUEBA';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->isHTML(true);
$mail->Body = "<p>Nombre: $nombre</p><p>Compañia: $compania</p><p>Email: $email</p><p>Telefono: $telefono</p><p>Ciudad: $ciudad</p><p>Sitio Web: $web</p><p><br/>Mensaje:<br/>$mensaje</p>";
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "sent";
}*/


