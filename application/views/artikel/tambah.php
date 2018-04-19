
<div class="container">
	<h3 class="center">Input Berita</h3>
	<div class="row">
		<?php echo form_open('artikel/tambah' ); ?>
			<div class="row">
			<div class="input-field col s12">
	          <input  id="first_name" type="text" name="judul" class="validate">
	          <label for="first_name">Judul</label>
	          <?php echo form_error('judul') ?>
	        </div>
	        <div class="input-field col s12">
	          <textarea id="textarea1" name="konten" class="materialize-textarea"></textarea>
	          <label for="textarea1">Konten</label>
		        <?php echo form_error('konten') ?>
	        </div>
	      </div>
	    
	      <button type="submit" name="submit" class="waves-effect waves-light btn right bg" >Simpan Data</button>
		<?php echo form_close(); ?>
	</div>
</div>
<script src="<?php echo base_url('asset/materialize/js/materialize.min.js') ?>"></script>
<script src="<?php echo base_url('asset/js/JQuery.js') ?>"></script>

<script type="text/javascript">
	  $('#textarea1').trigger('autoresize');
</script>