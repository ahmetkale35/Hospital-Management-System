<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container">
                        <h1 style="float: left;">Hasta Listesi</h1>
                        <div class="search-box" style="float: right; margin-top: 20px;">
                            <input type="text" id="search-input" class="form-control" placeholder="Arama">
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <button class="btn btn-info sidebar-toggle" onclick="openNav()">Yan Menü</button>
                        <table class="table" style="clear: both; margin-top: 20px;">
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
                            <tbody id="patients-table-body">
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
                        <div class="loading" style="margin-top: 20px;">
                            <p id="total-count">Toplam Hasta Sayısı: {{ $total }}</p>
                            <p id="loading-message" style="display: none;">Yükleniyor...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
            position: absolute;
            left: 50px;
            top: 50px;
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
        .search-box {
            position: absolute;
            right: 100px;
            top: 20px;
        }
        /* Arama çubuğu stilini güncelleme */
        .search-box input {
            border: 2px solid black;
            color: black;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
        }
        .search-box::placeholder {
            color: black;
        }
    </style>
</head>
<body>
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
<label class="switch" style="position: absolute; right: 20px; top: 20px;">
    <input type="checkbox" id="dark-mode-toggle">
    <span class="slider round"></span>
</label>

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

    $(document).ready(function() {
        $('#search-input').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#patients-table-body tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>
</html>
