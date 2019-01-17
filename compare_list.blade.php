@include('inc.header')
  <?php $image_url=url('uploads/product_images/')."/"; ?>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="breadcrumb-wrap">
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                  <li class="breadcrumb-item active" aria-current="page">product details variable</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- product details wrapper start -->
    <div class="product-details-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <!-- product details inner end -->
            <div class="product-details-inner">
              <div class="row">
                <div class="col-lg-6">
                  <div class="product-large-slider mb-20 slick-arrow-style_2">
                      <?php for($i=0;$i<count($product[0]->product_image);$i++){ ?>
                    <div class="pro-large-img img-zoom">
                      <img src="<?php echo $image_url.$product[0]->product_image[$i]->product_image ?>" alt="" />
                    </div>
                  <?php } ?>
                  </div>
                  <div class="pro-nav slick-padding2 slick-arrow-style_2">
                      <?php for($i=0;$i<count($product[0]->product_image);$i++){ ?>
                    <div class="pro-nav-thumb"><img src="<?php echo $image_url.$product[0]->product_image[$i]->product_image ?>" alt="" /></div>
                  <?php  }  ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="product-details-des mt-md-34 mt-sm-34">
                    <h3><a href="product-details.html">{{$product[0]->product_name}}</a></h3>


                    <div class="pricebox">
                      <span class="regular-price">₦{{$product[0]->product_price}}</span>
                    </div>
                    <p><?php  echo $product[0]->product_description ?></p>

                    <div class="quantity-cart-box d-flex align-items-center">

                      <div class="action_link">
                        <a class="buy-btn" href="{{$product[0]->product_link}}">Buy Now!<i class="fa fa-mouse-pointer"></i>
                        </a>
                      </div>
                    </div>
                    <div class="useful-links mt-20">
                      <a href="product-details.html#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                          class="fa fa-refresh"></i>compare</a>
                      <a href="product-details.html#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i
                          class="fa fa-heart-o"></i>wishlist</a>
                    </div>
                    <div class="share-icon mt-20">
                      <a class="facebook" href="product-details.html#"><i class="fa fa-facebook"></i>like</a>
                      <a class="twitter" href="product-details.html#"><i class="fa fa-twitter"></i>tweet</a>
                      <a class="pinterest" href="product-details.html#"><i class="fa fa-pinterest"></i>save</a>
                      <a class="google" href="product-details.html#"><i class="fa fa-google-plus"></i>share</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- product details inner end -->

            <!-- product details reviews start -->
            <div class="product-details-reviews mt-34">
              <div class="row">
                <div class="col-lg-12">
                  <div class="product-review-info">
                    <ul class="nav review-tab">
                      <li>
                        <a class="active" data-toggle="tab" href="#tab_one">description</a>
                      </li>

                    </ul>
                    <div class="tab-content reviews-tab">
                      <div class="tab-pane fade show active" id="tab_one">
                        <div class="tab-one">
                          <p>{{$product[0]->product_description}}</p>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- product details reviews end -->
</div>
</div>


          <div class="row">
            <!-- related products area start -->
              <div class="col-lg-12">
            <div class="related-products-area mt-34">
              <div class="section-title mb-30">
                <div class="title-icon">
                  <i class="fa fa-desktop"></i>
                </div>
                <h3>related products</h3>
              </div> <!-- section title end -->
              <!-- featured category start -->

              <div class="col-lg-12">
                        <!-- Wishlist Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="pro-thumbnail">Merchant</th>
                                      <th class="pro-thumbnail">Thumbnail</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-price">Description</th>
                                    <th class="pro-subtotal">Buy</th>

                                </tr>
                                </thead>
                                <tbody>

                                  <?php foreach($compare as $comp){ ?>
                                <tr>
                                    <td class="pro-title"><a href="#">{{$comp->name}}</a></td>
                                    <td class="pro-thumbnail"><a href="#"><img style="height:80px;"  src="<?php echo $image_url.$comp->product_image[0]->product_image ?>" alt="{{$comp->product_name}}"></a></td>
                                    <td class="pro-title"><a href="#">{{$comp->product_name}}</a></td>
                                    <td class="pro-price"><span>{{$comp->product_name}}</span></td>

                                      <td class="pro-price"><span>{{$comp->product_description}}</span></td>

                                    <td class="pro-remove"><a target="blank" href="http://{{ $comp->product_link }}" class="btn btn-primary" >Buy Now</a></td>
                                </tr>
                              <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

              </div>
              <!-- featured category end -->
            </div>
            <!-- related products area end -->
          </div>
      <br/><br/>

        </div>
      </div>
    </div>
    <!-- product details wrapper end -->



@include('inc.footer')
