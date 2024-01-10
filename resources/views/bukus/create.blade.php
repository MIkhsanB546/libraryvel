{{-- resources/views/bukus/create.blade.php --}}

<h1>Tambah Buku</h1>

@if ($errors->any())
    <div>
        <strong>Error:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('bukus.store') }}" method="POST">
    @csrf

    <label for="judul">Judul:</label>
    <input type="text" name="judul" required>
    <br>

    <label for="penulis">Penulis:</label>
    <input type="text" name="penulis" required>
    <br>

    <label for="penerbit">Penerbit:</label>
    <input type="text" name="penerbit" required>
    <br>

    <label for="tahun_terbit">Tahun Terbit:</label>
    <input type="number" name="tahun_terbit" required>
    <br>

    <button type="submit">Simpan</button>
</form>
