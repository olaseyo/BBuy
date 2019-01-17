
  <!-- Quick view modal start -->
    <?php foreach($product as $product_data ){?>
  <div class="modal" id="quick_view<?php echo $product_data->product_id ?>">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- product details inner end -->
          <div class="product-details-inner">
            <div class="row">
              <div class="col-lg-5">
                <div class="product-large-slider slick-arrow-style_2 mb-20">
                  <?php for($i=0;$i<count($product_data->product_image);$i++){ ?>
                      <?php if(isset($product_data->product_image[$i])){ ?>
                  <div class="pro-large-img">
                      <img src="<?php echo $image_url.$product_data->product_image[$i]->product_image ?>" class="img-pri" alt="">
                  </div>
                <?php }  } ?>
                </div>
                <div class="pro-nav slick-padding2 slick-arrow-style_2">

                  <?php for($i=0;$i<count($product_data->product_image);$i++){ ?>
                      <?php if(isset($product_data->product_image[$i])){ ?>
                  <div class="pro-nav-thumb"><img src="<?php echo $image_url.$product_data->product_image[$i]->product_image ?>" alt="" /></div>
                <?php } } ?>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="product-details-des mt-md-34 mt-sm-34">
                  <h3><a href="product-details.html">{{ $product_data->product_name }}</a></h3>


                  <div class="pricebox">
                    <span class="regular-price">₦{{$product_data->product_price}}</span>
                  </div>
                  <p> {{ $product_data->product_description}} </p>
                  <div class="quantity-cart-box d-flex align-items-center mt-20">

                    <div class="action_link">
                      <a class="buy-btn" href="#">Buy Now!<i class="fa fa-money"></i> </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- product details inner end -->
        </div>
      </div>
    </div>
  </div>
  <!-- Quick view modal end -->

<?php } ?>
