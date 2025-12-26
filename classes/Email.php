<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token)
    {
        $this->email  = $email;
        $this->nombre = $nombre;
        $this->token  = $token;
    }

    public function enviarConfirmacion() {

        $mail = new PHPMailer(true);

        try {
            // Configuración SMTP (Mailtrap)
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'a0bc1f1ffb2f0a';
            $mail->Password = 'f4b754b17c7feb';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            // Remitente y destinatario
            $mail->setFrom('cuentas@appsalon.com', 'AppSalon');
            $mail->addAddress($this->email, $this->nombre);
            $mail->Subject = 'Confirma tu Cuenta';

            // Contenido
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $contenido  = "<html>";
            $contenido .= "<p><strong>Hola {$this->nombre}</strong>, has creado tu cuenta en App Salón.</p>";
            $contenido .= "<p>Confirma tu cuenta haciendo clic aquí:</p>";
            $contenido .= "<p>
                <a href='". $_ENV['APP_URL'] ."/confirmar-cuenta?token={$this->token}'>
                    Confirmar Cuenta
                </a>
            </p>";
            $contenido .= "<p>Si tú no creaste esta cuenta, ignora este mensaje.</p>";
            $contenido .= "</html>";

            $mail->Body = $contenido;

            $mail->send();

        } catch (Exception $e) {
            echo "Error al enviar email: {$mail->ErrorInfo}";
            exit;
        }
    }

    public function enviarInstrucciones() {

        $mail = new PHPMailer(true);

        try {
            // Configuración SMTP (Mailtrap)
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Port = $_ENV['EMAIL_PORT'];
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            // Remitente y destinatario
            $mail->setFrom('cuentas@appsalon.com', 'AppSalon');
            $mail->addAddress($this->email, $this->nombre);
            $mail->Subject = 'Reestablece tu password';

            // Contenido
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $contenido  = "<html>";
            $contenido .= "<p><strong>Hola {$this->nombre}</strong>, has solicitado reestablecer tu password.</p>";
            $contenido .= "<p>Haz clic aquí para continuar:</p>";
            $contenido .= "<p>
            <a href='". $_ENV['APP_URL'] ."/recuperar?token={$this->token}\">
                Reestablecer Password
            </a>
            </p>";

            $contenido .= "<p>Si tú no solicitaste este cambio, ignora este mensaje.</p>";
            $contenido .= "</html>";

            $mail->Body = $contenido;

            $mail->send();

        } catch (Exception $e) {
            echo "Error al enviar email: {$mail->ErrorInfo}";
            exit;
        }
    }
}
