<div class="container">
	<h2 class="center">Artikel</h2>
 <div class="row">
 	<?php foreach ($artikels as $artikel) { ?>
        <div class="col s12 m6">
          <div class="card  indigo accent-4">
            <div class="card-content white-text">
              <span class="card-title"><b><?php echo $artikel['judul'] ?></b></span>
              <p><?php 
					echo character_limiter($artikel['isi'],50);
					?>
				</p>
            </div>
            <div class="card-action " >
              <a href="<?=$artikel['slug']; ?>" >Baca</a>
              <?php if (isset($_SESSION['loggin'])) { ?>
                <a href="edit/<?=$artikel['id'] ?>">Edit</a>
                <a href="hapus/<?=$artikel['id'] ?>">Hapus</a>
             <?php }?>
              
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
</div>

