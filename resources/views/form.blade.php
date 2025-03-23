<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form User</title>
</head>
<body>
    <h1>Form Tambah User</h1>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="nama">Nama : </label>
        <input type="text" id="nama" name="nama"><br>

        <label for="nama">NPM : </label>
        <input type="text" id="npm" name="npm"><br>

        <label for="nama">Kelas : </label>
        <input type="text" id="kelas" name="kelas"><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
