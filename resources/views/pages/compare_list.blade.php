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
                  <li class="breadcrumb-item active" aria-current="page">Comparison List</li>
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
          <div class="col-lg-12">
            <!-- product details inner end -->
            <div class="product-details-inner">

          <div class="row">
            <!-- related products area start -->
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
            <div class="related-products-area mt-34">
              <div class="section-title mb-30">
                <div class="title-icon">
                  <i class="fa fa-desktop"></i>
                </div>
                <h3>Compare products</h3>
              </div> <!-- section title end -->
              <!-- featured category start -->

              <div class="col-lg-12">
                        <!-- Wishlist Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>

                                      <th class="pro-thumbnail">Thumbnail</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-price">Description</th>
                                    <th class="pro-subtotal">Buy</th>

                                </tr>
                                </thead>
                                <tbody>

                                  <?php  $msg="";
                                  if(count($product2)>0){

                                  foreach($product2 as $comp){ ?>
                                <tr>

                                    <td class="pro-thumbnail"><a href="#"><img style="height:80px;"  src="<?php echo $image_url.$comp->product_image[0]->product_image ?>" alt="{{$comp->product_name}}"></a></td>
                                    <td class="pro-title"><a href="#">{{$comp->product_name}}</a></td>
                                    <td class="pro-price"><span>{{$comp->product_price}}</span></td>

                                      <td class="pro-price"><span>{{$comp->product_description}}</span></td>

                                    <td class="pro-remove"><a target="blank" href="http://{{ $comp->product_link }}" class="btn btn-primary" >Shop Now</a></td>
                                </tr>
                              <?php } }else{ $msg="<tr><div class='alert alert-danger'>No product found</div></tr>"; } ?>
                                </tbody>
                            </table>
                            <?php echo $msg; ?>
                        </div>
                    </div>
              </div>
              <!-- featured category end -->
            </div>
            <!-- related products area end -->
              <div class="col-lg-2"></div>
          </div>
      <br/><br/>

        </div>
      </div>
    </div>
    <!-- product details wrapper end -->



@include('inc.footer')
