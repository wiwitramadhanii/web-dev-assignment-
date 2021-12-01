<?php
    //koneksi data
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "dbtugaspertemuan12";
    
    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

    if(isset($_POST['bsimpan'])){
        $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi) VALUES '($_POST[tnim]', '$_POST[tnama]', '$_POST[alamat]', '$_POST[tprodi]')");

        if($simpan){
            echo "<script>
                    alert(simpan data sukses!);
                    document.location='index.php';
                    </script>";
        }
        else {
            echo "<script>
            alert(simpan data GAGAL!);
            document.location='index.php';
            </script>";  
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tugas Pertemuan 12</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h1 class="text-center">CRUD</h1>

    <div class="card mt-3">
     <div class="card-header bg-primary text-white">
    Form Input Data Mahasiswa
     </div>
     <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="tnim" class="form-control" placeholder="Input NIM" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="tnama" class="form-control" placeholder="Input Nama" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="talamat" placeholder="Input Alamat"></textarea>
            <div class="form-group">
                <label>Program Studi</label>
               <select class="form-control" name="tprodi">
                   <option></option>
                   <option value="S1-Matematika">S1-Matematika</option>
                   <option value="S2-Matematika">S2-Matematika</option>
                   <option value="S3-Matematika">S3-Matematika</option>
                   <option value="S1-Sistem Informasi">S1-Sistem Informasi</option>
                   <option value="S1-Aktuaria">S1-Ilmu Aktuaria</option>
               </select>
            </div>
            <button type="submit" class="btn btn-success"name="bsimpan">Simpan</button>
            <button type="reset" class="btn btn-danger"name="breset">Reset</button>
        </form>
     </div>
    </div>

    <div class="card mt-3">
     <div class="card-header bg-success text-white">
    Daftar Mahasiswa
     </div>
     <div class="card-body">
       <table class="table table-bordered table-striped">
           <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Program Studi</th>
                <th>Aksi</th>
           </tr>
           <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * form tmhs order by id_mhs desc");
            while($data = mysqli_fetch_array($tampil)) :

           ?>
           <tr> 
               <td><?=$no++;?></td>
               <td><?=$data['nim']?></td>
               <td><?=$data['nama']?></td>
               <td><?=$data['alamat']?></td>
               <td><?=$data['prodi']?></td>
               <td>
                   <a href="#" class="btn btn-warning">Edit</a>
                   <a href="#" class="btn btn-danger">Hapus</a>
               </td>
           </tr>
        <?php endwhile; ?>
       </table>
     </div>
    </div>
    </div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

