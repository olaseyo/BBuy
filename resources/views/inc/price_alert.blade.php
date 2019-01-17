
  <!-- Quick view modal start -->
<?php   if(Session::has('uid')){ ?>
    <?php foreach($product as $product_data ){?>
  <div class="modal" id="price_alert<?php echo $product_data->product_id ?>">
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

                  <?php if(isset($product_data->product_image[0])){ ?>
                  <div class="pro-nav-thumb"><img src="<?php echo $image_url.$product_data->product_image[0]->product_image ?>" alt="" /></div>
                <?php }  ?>


              </div>
              <div class="col-lg-7">
                <div class="product-details-des mt-md-34 mt-sm-34">
                  <h3><a href="product-details.html">{{ $product_data->product_name }}</a></h3>


                  <div class="pricebox">
                    <span class="regular-price">₦{{$product_data->product_price}}</span>
                  </div>

                </div>
                <div class="res"></div>
                <form class="form_validation_alert<?php echo $product_data->product_id ?>" method="post">
                  <div class="single-input-item">
                    <input type="number" name="price" placeholder="Enter Price">
                      <input type="hidden" name="product_id" value="<?php echo $product_data->product_id ?>">
                        <input type="hidden" name="uid" value="<?php echo Session('uid') ?>">
                  </div>

                  <div class="single-input-item">
                    <button type="button" onclick="submitPrice('form_validation_alert<?php echo $product_data->product_id ?>')" id="submit_btn" class="sqr-btn btn btn-block">Subscribe<img id="loader" class="loader" src="{{url('admin/assets/images/ripple.gif')}}" /></button>
                  </div>
                </form>

              </div>
            </div>
          </div>
          <!-- product details inner end -->
        </div>
      </div>
    </div>
  </div>
  <!-- Quick view modal end -->

<?php } }else{ ?>
  <?php foreach($product as $product_data ){?>
  <div class="modal" id="price_alert<?php echo $product_data->product_id ?>">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- product details inner end -->
          <div class="product-details-inner">
            <div class="row">

              <div class="col-lg-7">

                <div class="login-reg-form-wrap  pr-lg-50">
                                <h2>Sign In</h2>
                                <form class="form_validation" method="post" action="{{url('/Login')}}">
                                    @csrf
                                  <div class="single-input-item">
                                    <input type="email" name="email" placeholder="Email">
                                  </div>

                                  <div class="single-input-item">
                                    <input type="password" name="password" placeholder="Password">
                                  </div>

                                  <div class="single-input-item">
                                    <button type="submit" id="submit_btn" class="sqr-btn btn btn-block">Login</button>
                                  </div>
                                </form>

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
<?php } } ?>
