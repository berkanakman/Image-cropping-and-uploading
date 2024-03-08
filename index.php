<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resim Seçme ve Kırpma</title>
        <!-- Croppie CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
        <!-- Bootstrap CSS (sadece örnek için, isteğe bağlı) -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- Özel CSS -->
        <style>
            #image-container {
                max-width: 100%;
                overflow: hidden;
            }

            #image {
                max-width: 100%; /* Resmi container'a sığacak şekilde ayarlar */
                display: block; /* Resmi bir blok öğesi olarak ayarlar */
                margin: 0 auto; /* Resmi ortalar */
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h2>Resim Seçme ve Kırpma</h2>
                    <!-- Resim Seçme Alanı -->
                    <input type="file" id="inputImage" accept="image/*" class="form-control mt-2">
                    <!-- Resim Kırpma Alanı -->
                    <div id="image-container">
                        <div id="image"></div>
                    </div>
                    <div>
                        <button id="crop-button" class="btn btn-primary mt-2">Resmi Kırp</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Croppie ve jQuery (sadece örnek için, isteğe bağlı) -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

        <script>
            $(document).ready(function() {
                var croppie;

                // Resim seçildiğinde
                $("#inputImage").change(function() {
                    var input = this;
                    var url = URL.createObjectURL(input.files[0]);

                    // Eğer önceki Croppie varsa, kaldır
                    if (croppie) {
                        croppie.destroy();
                    }

                    // Croppie özellikleri ile yeni bir Croppie oluştur
                    croppie = new Croppie(document.getElementById('image'), {
                        viewport: { width: 200, height: 200 }, // Kırpma alanının başlangıç boyutları
                        boundary: { width: 300, height: 300 }, // Kırpma sınırlarının boyutları
                    });

                    // Resim yüklendiğinde Croppie'a resmi tanıt
                    croppie.bind({
                        url: url,
                    });
                });

                // Kırpılan resmi sunucuya yükleme
                $('#crop-button').click(function() {
                    // Eğer Croppie nesnesi yoksa, işlemi durdur
                    if (!croppie) {
                        console.error('Croppie nesnesi bulunamadı.');
                        return;
                    }

                    // Kırpılan resmi al
                    croppie.result({
                        type: 'blob', // Sonucu blob türünde al
                        size: { width: 450, height: 450 } // Kırpılan resmin boyutunu ayarla
                    }).then(function(blob) {
                        // Blob'u bir FormData nesnesine ekleyerek sunucuya gönderilebilir
                        var formData = new FormData();
                        formData.append('croppedImage', blob, 'cropped_image.png');

                        // Sunucuya POST isteği gönder
                        $.ajax({
                            url: 'upload.php', // Sunucu tarafında bu dosyayı işleyecek bir PHP dosyasının yolu
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                console.log('Sunucu tarafından gelen yanıt:', response);
                            },
                            error: function(error) {
                                console.error('Sunucu tarafında bir hata oluştu:', error);
                            }
                        });
                    });
                });
            });
        </script>
    </body>
</html>
