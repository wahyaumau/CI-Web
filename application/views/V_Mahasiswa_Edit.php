<h2><?=$title?></h2>
<form action="<?=base_url()?>index.php/mahasiswa/update/<?=$mahasiswa['nim']?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nim">NIM</label>
    <input type="number" class="form-control" id="nim" placeholder="Masukkan NIM" name="nim" value="<?=$mahasiswa['nim']?>" required>    
    <span class="text-danger"><?=form_error('nim')?></span>
  </div>
  <div class="form-group">
    <label for="name">Nama</label>
    <input type="text" class="form-control" id="name" placeholder="Masukkan Nama" name="name" value="<?=$mahasiswa['nama']?>" required>    
    <span class="text-danger"><?=form_error('name')?></span>
  </div>  
  <div class="form-group">
    <label for="name">Umur</label>
    <input type="text" class="form-control" id="name" placeholder="Masukkan Umur" name="age" value="<?=$mahasiswa['umur']?>" required>    
    <span class="text-danger"><?=form_error('umur')?></span>
  </div>  
   <div class="form-group">
    <label for="idprodi">Program Studi</label>
    <select class="form-control" id="idprodi" name="idprodi">
      <option value="<?=$mahasiswa['idprodi']?>"><?=$mahasiswa['namaprodi']?></option>
      <?php foreach ($prodi as $key => $prodii) : ?>
      	<?php if($prodii['idprodi']!= $mahasiswa['idprodi']){ ?>

      	<option value='<?php echo $prodii['idprodi']?>'><?php echo $prodii['namaprodi']?></option>      
      	<?php } ?>
      <?php endforeach; ?>
    </select>
  </div>
  	<img src="<?php echo base_url().'assets/images/mahasiswa/'.$mahasiswa['foto'];?>" width="90px">  	  
  <div class="form-group">
    <label for="foto">Update Foto</label>
    <input type="file" class="form-control-file" id="foto" name="foto">
  </div>    
  <button type="submit" class="btn btn-primary">Update</button>
</form>