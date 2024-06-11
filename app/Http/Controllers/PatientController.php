<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hasta;

class PatientController extends Controller
{
    public function index()
    {
        $patients = hasta::all();
        $total = hasta::count();
        return view('patients.liste', compact('patients','total'));
    }

    public function edit(hasta $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, hasta $patient)
    {
        $request->validate([
            'adi' => 'required|string|max:255',
            'soyadi' => 'required|string|max:255',
            'cinsiyet' => 'required|in:Erkek,Kadın',
            'dogum_tarihi' => 'required|date',
            'telefon' => 'required|string|max:20',
            'adres' => 'required|string',
            'sgk' => 'required|string|max:10',
            'tibbi_gecmis' => 'required|string',
        ]);

        $patient->update($request->all());

        return redirect()->route('index')->with('success', 'Hasta güncellendi.');
    }

    public function destroy(hasta $patient)
    {
        $patient->delete();

        return redirect()->route('index')->with('success', 'Hasta silindi.');
    }

    public function adminIndex()
    {
        $patients = hasta::all();
        $total = hasta::count();
        return view('admin.dashboard', compact('patients','total'));
    }

    public function create()
    {
        return view('patients.create');
    }
    


    public function store(Request $request)
{
    // Formdan gelen verileri doğrulama
    $validatedData = $request->validate([
        'adi' => 'required',
        'soyadi' => 'required',
        'cinsiyet' => 'required',
        'dogum_tarihi' => 'required|date',
        'telefon' => 'required',
        'adres' => 'required',
        'sgk' => 'required',
        'tibbi_gecmis' => 'required|string'
    ]);

    // Yeni kullanıcıyı oluşturma ve kaydetme
    $patient = new hasta();
    $patient->adi = $request->adi;
    $patient->soyadi = $request->soyadi;
    $patient->cinsiyet = $request->cinsiyet;
    $patient->dogum_tarihi = $request->dogum_tarihi;
    $patient->telefon = $request->telefon;
    $patient->adres = $request->adres;
    $patient->sgk = $request->sgk;
    // Diğer alanlar buraya eklenebilir
    $patient->save();

    // Başarılı bir şekilde kaydedildiğine dair mesajı gösterme veya başka bir işlem yapma

    // Yönlendirme
    return redirect()->route('index')->with('success', 'Yeni hasta başarıyla eklendi.');
}

}



