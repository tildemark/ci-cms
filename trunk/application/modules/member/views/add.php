<!-- [Left menu] start -->
<div class="leftmenu">

	<h1 id="pageinfo"><?=__("Navigation")?></h1>
	
	<ul id="tabs" class="quickmenu">
		<li><a href="#one">General settings</a></li>
	</ul>
	<div class="quickend"></div>

</div>
<!-- [Left menu] end -->

<!-- [Content] start -->
<div class="content slim">

<h1 id="settings"><?=__("Add a user")?></h1>



<form class="settings" action="<?=site_url('admin/member/add')?>" method="post" accept-charset="utf-8">
		
		<ul>
			<li><input type="submit" name="submit" value="<?=__("Save")?>" class="input-submit" /></li>
			<li><a href="<?=site_url('admin/member/listall')?>" class="input-submit last"><?=__("Cancel")?></a></li>
		</ul>
		
		<br class="clearfloat" />

		<hr />
		<?php echo $this->validation->error_string; ?>
		<div id="one">
		
			<label for="username"><?=__("Username")?>: </label>
			<input id="username" name="username" type='text' value='<?php echo $this->validation->username;?>' class="input-text" />
			<br />
			<label for="password"><?=__("Password")?>:</label>
			<input type="password" name="password" value="" id="password" class="input-text" /><br />

			<label for="passconf"><?=__("Confirm")?>:</label>
			<input type="password" name="passconf" value="" id="" class="input-text" /><br />			
			<label for="email"><?=__("Email")?>:</label>
			<input type="text" name="email" value="<?php echo $this->validation->email;?>" id="email" class="input-text" /><br />
						
		</div>
	</form>
<script>

  $(document).ready(function(){
    $("#tabs").tabs();
  });

</script>
</div>
<!-- [Content] end -->
