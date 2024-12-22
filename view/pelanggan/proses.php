<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/rira_cake/vendor/autoload.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi dan sanitasi input
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Validasi email
    if (!$email) {
        http_response_code(400); // HTTP status bad request
        echo json_encode(['status' => 'error', 'message' => 'Alamat email tidak valid.']);
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Ganti dengan host SMTP Anda
        $mail->SMTPAuth = true;
        $mail->Username = 'soyyya44@gmail.com'; // Ganti dengan email Anda
        $mail->Password = 'lsmf lbhe jmbm gcdm'; // Ganti dengan App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Informasi pengirim dan penerima
        $mail->setFrom('no-reply@rira-cake.com', 'Rira Cake'); // Bisa diubah sesuai kebutuhan
        $mail->addAddress('soyyya44@gmail.com'); // Ganti dengan email tujuan

        // Konten email
        $mail->isHTML(true);
        $mail->Subject = "Pesan dari: $subject";
        $mail->Body = "
            <h2>Pesan dari Formulir Contact Us</h2>
            <p><strong>Nama:</strong> $name</p>
            <p><strong>Nomor Telepon:</strong> $mobile</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Pesan:</strong></p>
            <p>$message</p>
        ";
        $mail->AltBody = "Nama: $name\nNomor Telepon: $mobile\nEmail: $email\nPesan:\n$message";

        // Kirim email
        $mail->send();

        // Respon sukses
        echo json_encode(['status' => 'sukses', 'message' => 'Pesan Anda telah berhasil dikirim.']);
        exit;

    } catch (Exception $e) {
        http_response_code(500); // HTTP status internal server error
        echo json_encode(['status' => 'error', 'message' => "Maaf, pesan Anda gagal dikirim. Error: {$mail->ErrorInfo}"]);
        exit;
    }
} else {
    http_response_code(405); // HTTP status method not allowed
    echo json_encode(['status' => 'error', 'message' => 'Metode pengiriman tidak didukung.']);
    exit;
}
