<?php 
include '../dbconnect.php';
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$ukuran=$_POST['ukuran'];
$merk=$_POST['merk'];
$satuan=$_POST['satuan'];
$stock=$_POST['stock'];
$lokasi=$_POST['lokasi'];
 //upload
 $ekstensi_diperbolehkan = array('jpg', 'png');
 $foto = $_FILES['foto']['name'];
 // print_r($foto);
 $x = explode(".", $foto);
 $ekstensi = strtolower(end($x));
 $file_tmp = $_FILES['foto']['tmp_name'];
 if(!empty($foto)){
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    $q = "insert into sstock_brg(nama, jenis, merk, ukuran, stock, satuan, lokasi, foto) values ('$nama', '$jenis', '$merk', '$ukuran', '$stock', '$satuan', '$lokasi', '$foto')";
    $r = mysqli_query($conn, $q);
    if($r){
      move_uploaded_file($file_tmp, '../img/' . $foto);
    }
    echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= stock.php'/>  ";
  }
 }else{
  $q = "insert into sstock_brg(nama, jenis, merk, ukuran, stock, satuan, lokasi, foto) values ('$nama', '$jenis', '$merk', '$ukuran', '$stock', '$satuan', '$lokasi', '')";
  $r = mysqli_query($conn, $q);
  echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= stock.php'/>  ";
 }
 
?>
 
  <html>
<head>
  <title>Tambah Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>