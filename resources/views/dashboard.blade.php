<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Menü stilleri */
        .menu {
            margin-bottom: 20px;
        }
        .menu ul {
            list-style-type: none;
            padding: 0;
        }
        .menu ul li {
            display: inline;
            margin-right: 10px;
        }
        .menu ul li a {
            text-decoration: none;
            color: #333;
        }
        .menu ul li a:hover {
            color: #007bff;
        }

        /* İçerik alanı stilleri */
        .content {
            padding: 20px;
            border: 1px solid #ccc;
        }
        /* Form stilleri */
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">User Dashboard</h1>
        <!-- Menü başlangıcı -->
        <div class="menu">
            <ul>
                <li><a href="#">Bilgilerim</a></li>
                
            </ul>
        </div>
        <!-- Menü bitişi -->
        
        <div class="content" id="bilgilerim">
        <div class="content" id="bilgilerim">
    <h2 style="color: #007bff;">Bilgilerim</h2>
    <div class="form-group">
        <label for="adi">Adı:</label>
        <input type="text" id="adi" class="form-control" value="Okan" readonly>
    </div>
    <div class="form-group">
        <label for="yaş">Yaş:</label>
        <input type="text" id="yaş" class="form-control" value="Belirtilmedi" readonly>
    </div>
    <div class="form-group">
        <label for="adi">Telefon:</label>
        <input type="text" id="telefon" class="form-control" value="Belirilmedi" readonly>
    </div>
    <div class="form-group">
        <label for="cinsiyet">Cinsiyet:</label>
        <input type="text" id="cinsiyet" class="form-control" value="Belirtilmedi" readonly>
    </div>
    <div class="form-group">
        <label for="sgk">SGK No:</label>
        <input type="text" id="sgk" class="form-control" value="Belirtilmedi" readonly>
    </div>
    <div class="form-group">
        <label for="tibbi_gecmis">Tıbbi Geçmiş:</label>
        <textarea id="tibbi_gecmis" class="form-control" rows="3" readonly>Belirtilmedi</textarea>
    </div>
</div>


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            // Bilgilerim sekmesine tıklanınca
            $("#bilgilerim-link").click(function(){
                $("#bilgilerim").show();
                $("#hesap_bilgilerim").hide();
            });

            // Hesap Bilgilerim sekmesine tıklanınca
            $("#hesap_bilgilerim-link").click(function(){
                $("#bilgilerim").hide();
                $("#hesap_bilgilerim").show();
            });
        });
    </script>
</body>
</html>


 <!-- Doktora Mesaj Gönderme Formu -->
                    <div class="content" id="mesaj_gonderme">
                        <h2 style="color: #007bff;">Doktoruna Mesaj Gönder</h2>
                        <form action="{{ route('sendMessageToDoctor') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="message" style="color: #007bff;">Mesajınız:</label>
                                <textarea id="message" name="message" class="form-control" rows="3" required style="color: #007bff;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Mesajı Gönder</button>
                        </form>
                    </div>
                    <!-- Doktora Mesaj Gönderme Formu Bitişi -->



                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>  