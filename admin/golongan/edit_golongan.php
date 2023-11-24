<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_golongan WHERE id_golongan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
    <input type='hidden' class="form-control" name="id_golongan" value="<?php echo $data_cek['id_golongan']; ?>"
			 readonly/>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan</label>
				<div class="col-sm-6">
        <select name="jenis_golongan" id="jenis_golongan" class="form-control">
						<option>- Pilih -</option>
						<option>Gologan I</option>
						<option>Gologan II</option>
						<option>Gologan III</option>
						<option>Gologan IV</option>
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-golongan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>


<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_golongan SET jenis_golongan='".$_POST['jenis_golongan']."' 
    WHERE id_golongan='".$_POST['id_golongan']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'data.php?page=data-golongan';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'data.php?page=data-golongan';
        }
      })</script>";
    }}
