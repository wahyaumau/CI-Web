<h2><?=$title?></h2>
<form action="<?=base_url()?>index.php/login/submit" method="post">
	<?php if($this->session->flashdata('message')){?>
		<div class="alert alert-danger" role="alert">
		<?=$this->session->flashdata('message')?>   
		</div>

	<?php } ?>
  <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control" id="username" placeholder="Username" name="username">    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">    
  </div>  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>