<!DOCTYPE html>
<html>
<head>
    <title>Hasta Listesi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .btn-transparent {
            background-color: transparent;
            border: 1px solid;
        }
        .btn-primary-transparent {
            color: #007bff;
            border-color: #007bff;
        }
        .btn-danger-transparent {
            color: #dc3545;
            border-color: #dc3545;
        }
        .btn-container {
            display: flex;
            gap: 10px;
        }
        .table tbody tr {
            border-bottom: 1px solid #dee2e6;
        }
        .loading {
            text-align: center;
        }
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #555; /* Menü rengi gri yapıldı */
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover {
            color: #f1f1f1;
        }
        .sidebar .close-btn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        .sidebar-header {
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #bbb;
        }
        .new-patient-form {
            margin-top: 20px;
        }
        .sidebar-toggle {
            position: fixed;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
        }
        body.dark-mode {
            background-color: #222;
            color: #fff;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }
        input:checked + .slider {
            background-color: #2196F3;
        }
        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }
        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }
        .slider.round {
            border-radius: 34px;
        }
        .slider.round:before {
            border-radius: 50%;
        }
        .logout-btn {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Hasta Listesi</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <button class="btn btn-info sidebar-toggle" onclick="openNav()">Yan Menü</button>
    <label class="switch" style="position: absolute; right: 20px; top: 20px;">
        <input type="checkbox" id="dark-mode-toggle">
        <span class="slider round"></span>
    </label>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
        <div class="sidebar-header">
            <h5>Yönetici Adı Soyadı</h5>
        </div>
        <hr>
        <a href="#">Hesap Bilgileri</a>
        <hr>
        <div class="new-patient-form">
            <h5><a href="{{ route('patients.create') }}">Yeni Hasta Ekle</a></h5>
        </div>
        <form action="{{ route('logout') }}" method="POST" class="logout-btn">
            @csrf
            <button type="submit" class="btn btn-danger btn-block">Çıkış Yap</button>
        </form>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Ad</th>
            <th scope="col">Soyad</th>
            <th scope="col">Cinsiyet</th>
            <th scope="col">Doğum Tarihi</th>
            <th scope="col">Telefon</th>
            <th scope="col">Adres</th>
            <th scope="col">SGK No</th>
            <th scope="col">Tıbbi Geçmiş</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->adi }}</td>
                <td>{{ $patient->soyadi }}</td>
                <td>{{ $patient->cinsiyet }}</td>
                <td>{{ $patient->dogum_tarihi }}</td>
                <td>{{ $patient->telefon }}</td>
                <td>{{ $patient->adres }}</td>
                <td>{{ $patient->sgk }}</td>
                <td>{{ $patient->tibbi_gecmis }}</td>
                <td>
                    <div class="btn-container">
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-transparent btn-primary-transparent">Güncelle</a>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-transparent btn-danger-transparent">Sil</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="loading">
        <p id="total-count">Toplam Hasta Sayısı: {{ $total }}</p>
        <p id="loading-message" style="display: none;">Yükleniyor...</p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#dark-mode-toggle').change(function() {
        $('body').toggleClass('dark-mode');
    });

    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
    }
</script>
</body>
</html>
