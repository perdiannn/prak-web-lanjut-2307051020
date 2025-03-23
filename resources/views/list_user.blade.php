@extends('layouts.app') 
 
@section ('content') 
<table> 
   <thead> 
      <tr> 
         <th>ID</th> 
         <th>Nama</th> 
         <th>NPM</th> 
         <th>Kelas ID</th>
      </tr> 
   </thead> 
   <tbody> 
      <?php 
      foreach ($user as $user) { 
      ?> 
         <tr> 
            <td><?= $user['id'] ?></td> 
            <td><?= $user['nama'] ?></td> 
            <td><?= $user['npm'] ?></td> 
            <td><?= $user['nama_kelas'] ?></td> 
            <td></td> 
         </tr> 
      <?php 
      } 
      ?> 
   </tbody> 
</table> 
@endsection