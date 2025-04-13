@extends('layouts.app')

@section('content')

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right, rgb(173, 18, 18), #2575fc);
        min-height: 100vh;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        background: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 960px;
        animation: fadeIn 0.5s ease-in-out;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
        font-size: 32px;
        font-weight: 600;
    }

    table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

th, td {
    padding: 14px;
    text-align: center;
    border: 1px solid #eee;
}

th {
    background-color: #007bff;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color:rgb(220, 120, 37);
    transition: background-color 0.3s ease;
}

    img {
        width: 60px;
        height: 60px;
        border-radius: 6px;
        object-fit: cover;
    }

    .btn {
        padding: 8px 14px;
        border-radius: 6px;
        text-decoration: none;
        color: white;
        font-weight: 500;
        background: linear-gradient(135deg, #007bff, #0056b3);
        transition: 0.3s ease;
    }

    .btn:hover {
        background: linear-gradient(135deg, #0056b3, #004085);
        transform: translateY(-2px);
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(-10px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>

<table class="table">
   <thead>
      <tr>
         <th scope="col">ID</th>
         <th scope="col">Nama</th>
         <th scope="col">NPM</th>
         <th scope="col">Kelas</th>
         <th scope="col">Foto</th>
         <th scope="col">Aksi</th>
      </tr>
   </thead>

   <tbody class="table-group-divider">
      <?php foreach ($user as $user): ?>
         <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nama'] ?></td>
            <td><?= $user['npm'] ?></td>
            <td><?= $user['nama_kelas'] ?></td>
            <td><?= $user['foto'] ?></td>
            <td>
               <a href="{{ route('user.show', $user['id']) }}" class="btn btn-primary btn-sm">Details</a>
            </td>
         </tr>
      <?php endforeach; ?>
   </tbody>
</table>
@endsection