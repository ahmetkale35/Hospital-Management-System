@foreach($hastas as $hasta)
    <tr>
        <td>{{ $hasta->ad }}</td>
        <td>{{ $hasta->soyad }}</td>
        <td>{{ $hasta->cinsiyet }}</td>
        <td>{{ $hasta->dogum_tarihi }}</td>
        <td>{{ $hasta->telefon }}</td>
        <td>{{ $hasta->adres }}</td>
        <td>{{ $hasta->sgk_no }}</td>
        <td>{{ $hasta->tibbi_gecmis }}</td>
        <td>
            <div class="btn-container">
                <a href="{{ route('hastas.edit', $hasta->id) }}" class="btn btn-transparent btn-primary-transparent">Güncelle</a>
                <form action="{{ route('hastas.destroy', $hasta->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-transparent btn-danger-transparent">Sil</button>
                </form>
            </div>
        </td>
    </tr>
@endforeach
