<?php
$file = __DIR__ . '/index.txt';
if (!file_exists($file)) {
    echo "File index.txt belum ada.";
    exit;
}
$content = file_get_contents($file);
echo "<h2>Isi File index.txt:</h2><pre>" . htmlspecialchars($content) . "</pre>";
?>
