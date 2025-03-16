<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<label for="id_kelas">Kelas:</label><br>
<select name="kelas_id" id="kelas_id"required>
    @foreach ($kelas as $kelasItem)
    <option value="{{$kelasItem->id}}">{{$kelasItem->nama_kelas}}</option>
    @endforeach
</select>
<form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="nama">Nama Lengkap: </label>
        <input type="text" id="nama" name="nama"><br>

        <label for="nama">NPM : </label>
        <input type="text" id="npm" name="npm"><br>

        <label for="nama">Kelas : </label>
        <input type="text" id="kelas" name="kelas"><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>