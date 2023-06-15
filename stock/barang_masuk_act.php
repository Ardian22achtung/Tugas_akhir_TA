<?php 
include '../dbconnect.php';
$barang=$_POST['barang']; // ini ID barang nya
$qty=$_POST['qty'];
$tanggal=$_POST['tanggal'];
$ket=$_POST['ket'];

$dt=mysqli_query($conn,"select * from sstock_brg where idx='$barang'");
$data=mysqli_fetch_array($dt);
$sisa=$data['stock']+$qty;
$query1 = mysqli_query($conn,"update sstock_brg set stock='$sisa' where idx='$barang'");

$query2 = mysqli_query($conn,"insert into sbrg_masuk (idx,tgl,jumlah,keterangan) values('$barang','$tanggal','$qty','$ket')");

if($query1 && $query2){
    echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= masuk.php'/>  ";
} else {
    echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= masuk.php'/> ";
}


?>

<html>
<head>
  <title>Barang Masuk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTBZkWWuUHNahSjQZtmeoQYjMvmHe1WYuCThN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



  <script type="text/javascript">
		Swal.fire(
  'Barang Berhasil Masuk',
  'Terimakasih',
  'success'
)
		</script>
  
</head>