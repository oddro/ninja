
      <div class="jumbotron heading">
        <div class="container netra-landing">
          <div class="left-side">
            <h1>Print Sticker Made Easy</h1>
            <p class="headline_tagline">No Big data, no syncing, no waiting. Just the easiest way to send files—both big and small—from A to B. Simple, secure, and fast.</p>
            <a href="#shop" class="btn btn-outline-inverse btn-lg">Shop Now!</a>
            <a href="getting-started#download" class="btn btn-outline-inverse btn-lg">Get Free Sticker</a>
          </div>
          <div class="right-side">
          </div>
        </div><!-- /.container -->
      </div>
      
      <div class="container netra-landing">
        <div class="row common">
          <h2 class="title" id="shop">Produk Kami</h2>
          <div class="divider"></div>
          <?php foreach($categoryProduct as $category): ?>
          <div class="col-sm-4">
            <div class="oddro-services custom-shape">
              <img src="<?php echo base_url().'content/upload/img/category-product/'.$category['img'] ?>" data-at2x="img/service-icon-1@2x.png" alt="Portability service">
              <h3><?php echo $category['name'] ?></h3>
              <p><?php echo $category['description'] ?></p>
            </div> <!-- /.service -->
          </div>
        <?php endforeach; ?>
        </div>

      </div>

<section class="features netra-padding common">
  <div class="container netra-landing">
    <h2>Some of our client</h2>
    <h4 class="subtitle">Our team of professionals is constantly working to satisfy the needs of our clients.</h4>
    <div class="divider"></div>
    <img src="https://d1vje5lvs6ypii.cloudfront.net/assets/homepage/customers-997c68933e9fb1e8beb9609cb658c8b8.png">
  </div><!-- /.container -->
</section>