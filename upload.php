<?php
    // Eğer sunucuya POST isteği yapılmışsa
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Yüklenen dosyanın hedef klasöre kaydedilmesi
        $targetFolder = 'uploads/'; // Kaydedilecek klasörün adı
        $targetPath = $targetFolder . basename($_FILES['croppedImage']['name']);

        // Dosyayı hedef klasöre taşı
        if (move_uploaded_file($_FILES['croppedImage']['tmp_name'], $targetPath)) {
            echo 'Dosya başarıyla yüklendi: ' . $targetPath;
        } else {
            echo 'Dosya yüklenirken bir hata oluştu.';
        }
    } else {
        echo 'Geçersiz istek.';
    }
?>
