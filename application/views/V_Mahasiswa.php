<br>
<h2><?=$title?></h2>
<br>
<a class="btn btn-primary" href="<?php echo base_url();?>index.php/mahasiswa/create">Tambah Data Mahasiswa</a>

<?php if($mahasiswa==null){ ?>
	<div class="alert alert-warning" role="alert">
	  Belum Ada Data Mahasiswa
	</div>
<?php }else{ ?>

<form action="<?=site_url('mahasiswa')?>" method="get">
	<div class="form-group">
    <label for="idprodi">Cari berdasarkan program studi</label>
    <select class="form-control" id="idprodi" name="idprodi">
      <option>Pilih Program Studi</option>
      <?php foreach ($prodi as $key => $prodii) : ?>
      	<option value='<?php echo $prodii['idprodi']?>'><?php echo $prodii['namaprodi']?></option>
      <?php endforeach; ?>      
    </select>
  </div>	  
	<button type="submit" class="btn btn-primary">Search By Prodi</button>
</form>

	<table class="table table-striped">
		<thead>
			<th>No</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Umur</th>
			<th>Nama Prodi</th>
			<th>Foto</th>
			<th colspan="3">Actions</th>
			<!-- <th>Umur</th> -->
		</thead>
		<tbody>
			<?php foreach ($mahasiswa as $key => $mhsw) : ?>
			<tr>
				<td><?=++$key?></td>
				<td><?php echo $mhsw['nim'];?></td>
				<td><?php echo $mhsw['nama'];?></td>
				<td><?php echo $mhsw['umur'];?></td>
				<td><?php echo $mhsw['namaprodi'];?></td>
				<td><img src="<?php echo base_url().'assets/images/mahasiswa/'.$mhsw['foto'];?>" width="90px"></td>
				<td><a href="<?=site_url('mahasiswa/'.$mhsw['nim']);?>" class="btn btn-success">Tampilkan</a></td>			
				<td><a href="<?=site_url('mahasiswa/edit/'.$mhsw['nim']);?>" class="btn btn-warning">Edit</a></td>				
				<td><a href="<?=site_url('mahasiswa/delete/'.$mhsw['nim']);?>" class="btn btn-danger">Hapus</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<?php } ?>