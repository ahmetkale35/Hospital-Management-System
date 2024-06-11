<!DOCTYPE html>
<html>
<head>
    <title>Hasta Güncelle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Hasta Güncelle</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="adi">Ad</label>
            <input type="text" class="form-control" id="adi" name="adi" value="{{ $patient->adi }}" required>
        </div>
        <div class="form-group">
            <label for="soyadi">Soyad</label>
            <input type="text" class="form-control" id="soyadi" name="soyadi" value="{{ $patient->soyadi }}" required>
        </div>
        <div class="form-group">
            <label for="cinsiyet">Cinsiyet</label>
            <select class="form-control" id="cinsiyet" name="cinsiyet" required>
                <option value="Erkek" {{ $patient->cinsiyet == 'Erkek' ? 'selected' : '' }}>Erkek</option>
                <option value="Kadın" {{ $patient->cinsiyet == 'Kadın' ? 'selected' : '' }}>Kadın</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dogum_tarihi">Doğum Tarihi</label>
            <input type="date" class="form-control" id="dogum_tarihi" name="dogum_tarihi" value="{{ $patient->dogum_tarihi }}" required>
        </div>
        <div class="form-group">
            <label for="telefon">Telefon</label>
            <input type="text" class="form-control" id="telefon" name="telefon" value="{{ $patient->telefon }}" required>
        </div>
        <div class="form-group">
            <label for="adres">Adres</label>
            <textarea class="form-control" id="adres" name="adres" required>{{ $patient->adres }}</textarea>
        </div>
        <div class="form-group">
            <label for="sgk">SGK No</label>
            <input type="text" class="form-control" id="sgk" name="sgk" value="{{ $patient->sgk }}" required>
        </div>
        <div class="form-group">
            <label for="tibbi_gecmis">Tıbbi Geçmiş</label>
            <textarea class="form-control" id="tibbi_gecmis" name="tibbi_gecmis" required>{{ $patient->tibbi_gecmis }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
</div>
</body>
</html>
