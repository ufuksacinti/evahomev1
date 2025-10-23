<?php
echo "<h1>EvaHome Test</h1>";
echo "<p>PHP Versiyonu: " . phpversion() . "</p>";
echo "<p>Sunucu çalışıyor!</p>";
echo "<p>Tarih: " . date('Y-m-d H:i:s') . "</p>";

// Composer.phar indirme testi
echo "<h2>Composer Test</h2>";
if (file_exists('composer.phar')) {
    echo "<p style='color: green;'>✅ composer.phar mevcut</p>";
} else {
    echo "<p style='color: orange;'>⚠️ composer.phar bulunamadı</p>";
    echo "<p>İndiriliyor...</p>";
    
    $composerContent = file_get_contents('https://getcomposer.org/composer.phar');
    if ($composerContent !== false) {
        file_put_contents('composer.phar', $composerContent);
        echo "<p style='color: green;'>✅ composer.phar indirildi</p>";
    } else {
        echo "<p style='color: red;'>❌ composer.phar indirilemedi</p>";
    }
}

// Composer install
echo "<h2>Composer Install</h2>";
echo "<p>Çalıştırılıyor...</p>";

$output = [];
$return_var = 0;
exec('php composer.phar install --no-dev --optimize-autoloader 2>&1', $output, $return_var);

echo "<div style='background: #f0f0f0; padding: 10px;'>";
echo "<strong>Çıktı:</strong><br>";
foreach ($output as $line) {
    echo htmlspecialchars($line) . "<br>";
}
echo "</div>";

if ($return_var === 0) {
    echo "<p style='color: green; font-size: 18px;'>🎉 Composer install başarılı!</p>";
} else {
    echo "<p style='color: red; font-size: 18px;'>❌ Composer install başarısız!</p>";
}
?>
