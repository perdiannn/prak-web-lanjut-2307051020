@extends('layouts.app')

@section('content')

<style>
    body, h2, form, input, select, button {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;    
        height: 100vh;
        margin: 0;
        background: linear-gradient(to right,rgb(173, 18, 18), #2575fc);
    }

    .container {
        background: white;
        padding: 75px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        text-align: center;
        width: 400px;
        animation: fadeIn 0.5s ease-in-out;
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
        font-size: 36px;
        font-weight: 600;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    input, select {
        width: 100%;
        padding: 15px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        transition: 0.3s;
    }

    input:focus, select:focus {
        border-color: #6a11cb;
        outline: none;
        box-shadow: 0 0 8px rgba(106, 17, 203, 0.3);
    }

    button {
        background: linear-gradient(135deg, #28a745, #218838);
        color: white;
        padding: 15px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
        font-weight: bold;
        margin-top: 10px;
        transition: all 0.3s ease;
    }

    button:hover {
        background: linear-gradient(135deg, #218838, #1e7e34);
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
    }   

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
    </style>

    <div class="container">
        <h2>Create User</h2>
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="nama" placeholder="Nama" >
            @foreach ($errors->get('nama') as $msg)
            <p>{{$msg}}</p>
            @endforeach

            <input type="text" name="npm" placeholder="NPM" >
            @foreach ($errors->get('npm') as $msg)
            <p>{{$msg}}</p>
            @endforeach

            <label for="kelas_id">Kelas:</label>
            <select name="kelas_id" id="kelas_id" >
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto">
            @foreach ($errors->get('foto') as $msg)
            <p>{{ $msg }}</p>
            @endforeach    
            </select>

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ route('user.store') }}" method="POST">
        @crsf
        <label for="nama">Nama : </label>
        <input type="text" id="nama" name="nama"><br>

        <label for="nama">NPM : </label>
        <input type="text" id="npm" name="npm"><br>

        <label for="nama">Kelas : </label>
        <input type="text" id="kelas" name="kelas"><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html> -->