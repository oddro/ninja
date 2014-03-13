      <div class="container netra-landing">
        <div class="row common">
          <h2 class="title" id="shop">Produk Kami</h2>
          <?php foreach($products as $product): ?>
          <div class="col-sm-4">
            <div class="oddro-services custom-shape">
              <img src="<?php echo base_url().'content/upload/img/product-ready/'.$product['src'] ?>" alt="<?php echo $product['name'] ?>">
              <h3><?php echo $product['name'] ?></h3>
              <p>Rp. <?php echo $this->cart->format_number($product['price']) ?></p>
              <a class="ajax-cart" href="<?php echo site_url('cart/add/readysticker/'.$product['id'].'/'.url_title($product['name'])) ?>" class="btn btn-primary btn-lg active" role="button">Buy</a>
            </div> <!-- /.service -->
          </div>
        <?php endforeach; ?>
        </div>

      </div>