# Image-cropping-and-uploading
Resim kırpma ve yükleme

Web sayfası yazarken resim yükleme sorun olabilir. Yüklemek istediğiniz resimleri belirli boyutlarda kesmek için photoshop gibi programlara ihtiyaç duyabilirsiniz.

Veya müşterileriniz için kullanıcı dostu yönetim panelleri oluşturmak isteyebilirsiniz.

Bu hazırlamış olduğum paket ile resimlerinizi istediğiniz boyutlarda kesebilirsiniz.

Hatta resmi kırparken örneğin 200X200 gösterip arka planda aynı oranda (300x300, 400x400.. vs) büyüterek veya küçülterek kaydedebilirsiniz.

Aşağıda resim kırpma alanının ve sınırlarının nasıl boyutlandırılacağını belirliyorsunuz.

    croppie = new Croppie(document.getElementById('image'), {
        viewport: { width: 200, height: 200 }, // Kırpma alanının başlangıç boyutları
        boundary: { width: 300, height: 300 }, // Kırpma sınırlarının boyutları
    });


Aşağıda da yüklenen resmin boyutlarını belirliyorsunuz.

    size: { width: 450, height: 450 } // Kırpılan resmin boyutunu ayarla





![Resim kırpma](https://github.com/berkanakman/Image-cropping-and-uploading/assets/36258013/060eea26-7c14-412b-821b-7b7207821dda)

![Resim kırpma2](https://github.com/berkanakman/Image-cropping-and-uploading/assets/36258013/a83be249-0fb4-4c8d-ab5e-1bc03548c477)


Croppie kütüphanesi kullanılarak hazırlanmıştır.
