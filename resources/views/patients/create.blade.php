<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasta Ekle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Yeni Hasta Ekle</h1>
        <form action="{{ route('patients.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="adi">Ad</label>
                <input type="text" class="form-control" id="adi" name="adi" required>
            </div>
            <div class="form-group">
                <label for="soyadi">Soyad</label>
                <input type="text" class="form-control" id="soyadi" name="soyadi" required>
            </div>
            <div class="form-group">
                <label for="cinsiyet">Cinsiyet</label>
                <select class="form-control" id="cinsiyet" name="cinsiyet" required>
                    <option value="male">Erkek</option>
                    <option value="female">Kadın</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dogum_tarihi">Doğum Tarihi</label>
                <input type="date" class="form-control" id="dogum_tarihi" name="dogum_tarihi" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefon</label>
                <input type="telefon" class="form-control" id="telefon" name="telefon" required>
            </div>
            <div class="form-group">
                <label for="adres">Adres</label>
                <textarea class="form-control" id="adres" name="adres" required></textarea>
            </div>
            <div class="form-group">
                <label for="sgk">SGK No</label>
                <input type="text" class="form-control" id="sgk" name="sgk" required>
            </div>
            <div class="form-group">
                <label for="tibbi_gecmis">Tıbbi Geçmiş</label>
                <textarea class="form-control" id="tibbi_gecmis" name="tibbi_gecmis" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
    </div>
</body>
</html>
