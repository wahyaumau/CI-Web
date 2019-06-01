<h2><?=$title?></h2>
<form action="<?=base_url()?>index.php/register/store" method="post">
  <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?=set_value('username')?>">    
    <span class="text-danger"><?=form_error('username')?></span>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">    
    <span class="text-danger"><?=form_error('password')?></span>
  </div>  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>