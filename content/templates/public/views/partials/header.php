<div class="navbar navbar-inverse navbar-custom navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="<?php echo @$nav_home ?>" ><a href="<?php echo site_url() ?>">Home</a></li>
        <li class="<?php echo @$nav_sticker ?>" ><a href="<?php echo site_url('sticker') ?>">Sticker</a></li>
        <li class="<?php echo @$nav_skin ?>" ><a href="<?php echo site_url('skin') ?>">Skin</a></li>
        <li class="<?php echo @$nav_gallery ?>" ><a href="<?php echo site_url('gallery') ?>">Gallery</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('cart') ?>" id="cart"></a></li>
        <li><a href="<?php echo site_url('login') ?>">Login</a></li>
        <li><a href="<?php echo site_url('signup') ?>">Signup</a></li>
      </ul>
    </div>
  </div>
</div>