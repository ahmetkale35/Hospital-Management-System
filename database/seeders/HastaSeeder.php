<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hasta;
use Faker\Factory as Faker;

class HastaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Türkçe Faker oluştur
        $faker = Faker::create('tr_TR');

        // Gerçek hastalık isimleri listesi
        $hastaliklar = [
            'Grip',
            'Yüksek Tansiyon',
            'Şeker Hastalığı',
            'Astım',
            'Kanser',
            'Kalp Yetmezliği',
            'Romatizma',
            'Bronşit',
            'Ülser',
            'Kabızlık',
            // Daha fazla gerçek hastalık ismi eklemek mümkündür
        ];

        // Belirli bir sayıda hasta oluştur
        $numberOfPatients = 50;

        for ($i = 0; $i < $numberOfPatients; $i++) {
            // Her döngüde yeni bir hasta oluştur
            Hasta::create([
                'adi' => $faker->firstName,
                'soyadi' => $faker->lastName,
                'cinsiyet' => $faker->randomElement(['Erkek', 'Kadın']),
                'dogum_tarihi' => $faker->date(),
                'telefon' => $faker->phoneNumber,
                'adres' => $faker->address,
                'email' => $faker->unique()->safeEmail,
                'sgk' => $faker->ean8,
                'tibbi_gecmis' => $faker->randomElement($hastaliklar), // Rastgele hastalık seçimi
            ]);
        }
    }
}
