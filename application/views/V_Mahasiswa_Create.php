<h2><?=$title?></h2>
<form action="<?=base_url()?>index.php/mahasiswa/store" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nim">NIM</label>
    <input type="number" class="form-control" id="nim" placeholder="Masukkan NIM" name="nim" value="<?=set_value('nim')?>" required>    
    <span class="text-danger"><?=form_error('nim')?></span>
  </div>
  <div class="form-group">
    <label for="name">Nama</label>
    <input type="text" class="form-control" id="name" placeholder="Masukkan Nama" name="name" value="<?=set_value('name')?>" required>    
    <span class="text-danger"><?=form_error('name')?></span>
  </div>  
  <div class="form-group">
    <label for="name">Umur</label>
    <input type="text" class="form-control" id="name" placeholder="Masukkan Umur" name="age" value="<?=set_value('age')?>" required>    
    <span class="text-danger"><?=form_error('umur')?></span>
  </div>  
   <div class="form-group">
    <label for="idprodi">Program Studi</label>
    <select class="form-control" id="idprodi" name="idprodi">
      <option>Pilih Program Studi</option>
      <?php foreach ($prodi as $key => $prodii) : ?>
      	<option value='<?php echo $prodii['idprodi']?>'><?php echo $prodii['namaprodi']?></option>      
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="foto">Masukkan Foto</label>
    <input type="file" class="form-control-file" id="foto" name="foto">
  </div>    
  <button type="submit" class="btn btn-primary">Submit</button>
</form>