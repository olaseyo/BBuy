@include('inc.header')
  <?php $image_url=url('uploads/product_images/')."/"; ?>
  <?php $thumb_image_url=url('uploads/product_images/thumbnails')."/"; ?>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="breadcrumb-wrap">
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page wrapper start -->
    <div class="page-main-wrapper">
      <div class="container">
        <div class="row">
          <!-- sidebar start -->
          <div class="col-lg-3 order-2 order-lg-1">
            <div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
              <!-- sidebar categorie start -->
              <div class="sidebar-widget mb-30">
                <div class="sidebar-category">
                  <ul>
                    <li class="title"><i class="fa fa-bars"></i> categories</li>
                    <?php if(count($categories)>0){ foreach($categories as $category){ ?>
                    <li><a href="{{url('/categories') }}/{{ $category->cat_id }}">{{$category->cat_name}}</a><span>({{$category->total_product_count}})</span></li>
                  <?php } }?>
                  </ul>
                </div>
              </div>
              <!-- sidebar categorie start -->



              <!-- sidebar banner start -->
              <div class="sidebar-widget mb-30">
                <div class="img-container fix img-full">
                  <a href="shop.html#"><img src="assets/img/banner/banner_shop.jpg" alt=""></a>
                </div>
              </div>
              <!-- sidebar banner end -->
            </div>
          </div>
          <!-- sidebar end -->

          <!-- product main wrap start -->
          <div class="col-lg-9 order-1 order-lg-2">
            <div class="shop-banner img-full">
              <img src="assets/img/banner/banner_static1.jpg" alt="">
            </div>
            <!-- product view wrapper area start -->
            <div class="shop-product-wrapper pt-34">
              <!-- shop product top wrap start -->
              <div class="shop-top-bar">
                <div class="row">
                  <!--<div class="col-lg-7 col-md-6">
                    <div class="top-bar-left">
                      <div class="product-view-mode mr-70 mr-sm-0">
                        <a class="active" href="shop.html#" data-target="grid"><i class="fa fa-th"></i></a>
                      </div>
                      <div class="product-amount">
                        <p>Showing 1–16 of 21 results</p>
                      </div>
                    </div>
                  </div>-->
                  <div class="col-lg-5 col-md-6">
                    <div class="top-bar-right">
                      <div class="product-short">
                        <p>Sort By : </p>
                        <select class="nice-select" name="sortby">
                          <option value="trending">Relevance</option>
                          <option value="sales">Name (A - Z)</option>
                          <option value="sales">Name (Z - A)</option>
                          <option value="rating">Price (Low &gt; High)</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- shop product top wrap start -->

              <!-- product item start -->
              <div class="shop-product-wrap grid row">
                  <?php if(count($product)>0){
                     foreach($product as $product_data ){?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <!-- product single item start -->
                  <div class="col">
                    <div class="product-item fix mb-30">
                      <div class="product-thumb">
                        <a href="{{url('/product_details')}}/<?php echo $product_data->product_id; ?>">
                          <?php if(isset($product_data->product_image[0])){ ?>
                          <img src="<?php echo $thumb_image_url.$product_data->product_image[0]->product_image ?>" class="img-pri" alt="">
                          <img src="<?php echo $thumb_image_url.$product_data->product_image[0]->product_image ?>"  class="img-sec" alt="">
                        <?php   } ?>
                        </a>
                        <div class="product-label">
                          <span>hot</span>
                        </div>
                        <div class="product-action-link">
                          <a href="#" data-toggle="modal" data-target="#quick_view<?php echo $product_data->product_id ?>"> <span data-toggle="tooltip"
                              data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                          <a href="#"  data-placement="left" data-toggle="modal" data-target="#wish_view<?php echo $product_data->product_id ?>" title="Wishlist"><i
                              class="fa fa-heart-o"></i></a>
                          <a onclick="compare(<?php echo $product_data->product_id; ?>)" data-toggle="tooltip" data-placement="left" title="Compare"><i
                              class="fa fa-refresh"></i></a>
                          <a  data-placement="left" data-toggle="modal" data-target="#price_alert<?php echo $product_data->product_id ?>" title="Price Alert"><i
                              class="fa fa-bell"></i></a>
                        </div>
                      </div>
                      <div class="product-content">
                        <h4><a href="{{url('/product_details')}}/<?php echo $product_data->product_id; ?>">{{ $product_data->product_name }} </a></h4>
                        <div class="pricebox">
                          <span class="regular-price">₦ {{$product_data->product_price }}</span>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- product single item end -->
                </div> <!-- product single column end -->
              <?php } }else{ echo "<div class='alert alert-danger'>No product found</div>"; } ?>
              </div>
              <!-- product item end -->


                          <!-- start pagination area -->
                          <div class="paginatoin-area text-center pt-28">
                            <div class="row">
                              <div class="col-12">
                                <?php if(count($product)>0){ echo $product->links(); } ?>
                              </div>
                            </div>
                          </div>
                          <!-- end pagination area -->

</div>
</div>
</div>
    <div class="row">
        <div class="col-lg-12">
        <!-- category tab area start -->
        <div class="category-tab-area mb-30 mt-md-16 mt-sm-16">
          <div class="category-tab">
            <ul class="nav">
              <li>
                <i class="fa fa-star-o"></i>
              </li>
              <li>
                <a class="active" data-toggle="tab" href="index.html#tab_featured">Featured</a>
              </li>

            </ul>
          </div>
        </div>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab_featured">
            <div class="feature-category-carousel-wrapper">
              <div class="container">
                <div class="featured-carousel-active2 row arrow-space slick-arrow-style" data-row="2">

                  <!-- product single item start -->



        <?php   if(count($featured)>0){
          foreach($featured as $featured_data ){?>

        <div class="col">
          <div class="product-item fix mb-30">
            <div class="product-thumb">
              <a href="{{url('/product_details')}}/<?php echo $featured_data->product_id; ?>">
                  <?php if(isset($featured_data->product_image[0])){ ?>
                <img src="<?php echo $thumb_image_url.$featured_data->product_image[0]->product_image ?>" class="img-pri" alt="">
                <img src="<?php echo $thumb_image_url.$featured_data->product_image[0]->product_image ?>"  class="img-sec" alt="">
              <?php  }  ?>
              </a>
              <div class="product-label">
                <span>hot</span>
              </div>
              <div class="product-action-link">
                <a href="index.html#" data-toggle="modal" data-target="#quick_view<?php echo $featured_data->product_id ?>"> <span data-toggle="tooltip"
                    data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                <a href="#" data-toggle="modal" data-target="#wish_view_featured<?php echo $featured_data->product_id ?>" data-placement="left" title="Wishlist"><i
                    class="fa fa-heart-o"></i></a>
                <a href="index.html#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                    class="fa fa-refresh"></i></a>
                <a href="#" data-toggle="modal" data-target="#price_alert_featured<?php echo $featured_data->product_id ?>" data-placement="left" title="Price Alert"><i
                    class="fa fa-bell"></i></a>
              </div>
            </div>
            <div class="product-content">
              <h4><a href="{{url('/product_details')}}/<?php echo $featured_data->product_id; ?>">{{$featured_data->product_name }} </a></h4>
              <div class="pricebox">
                <span class="regular-price">₦ {{$featured_data->product_price }}</span>

              </div>
            </div>
          </div>
        </div>
        <!-- product single item end -->
      <?php } }else{ echo "<div class='alert alert-danger'>No product found</div>"; } ?>

                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- category tab area start -->






        <!-- category tab area start -->
        <div class="category-tab-area mb-30 mt-md-16 mt-sm-16">
          <div class="category-tab">
            <ul class="nav">
              <li>
                <i class="fa fa-star-o"></i>
              </li>
              <li>
                <a class="active" data-toggle="tab" href="index.html#tab_featured">Popular Products</a>
              </li>

            </ul>
          </div>
        </div>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab_one">
            <div class="feature-category-carousel-wrapper">
              <div class="container">
                <div class="featured-carousel-active2 row arrow-space slick-arrow-style" data-row="2">

                  <!-- product single item start -->


                  <?php   if(count($popular)>0){
                     foreach($popular as $popu_product_data ){  ?>

                  <div class="col">
                    <div class="product-item fix mb-30">
                      <div class="product-thumb">
                        <a href="{{url('/product_details')}}/<?php echo $popu_product_data->product_id; ?>">
                            <?php if(isset($popu_product_data->product_image[0])){ ?>
                          <img src="<?php echo $thumb_image_url.$popu_product_data->product_image[0]->product_image ?>" class="img-pri" alt="">
                          <img src="<?php echo $thumb_image_url.$popu_product_data->product_image[0]->product_image ?>"  class="img-sec" alt="">
                        <?php } ?>
                        </a>
                        <div class="product-label">
                          <span>hot</span>
                        </div>
                        <div class="product-action-link">
                          <a href="#" data-toggle="modal" data-target="#quick_view<?php echo $popu_product_data->product_id ?>"> <span data-toggle="tooltip"
                              data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                          <a href="#" data-toggle="modal" data-target="#wish_view_popular<?php echo $popu_product_data->product_id ?>" data-placement="left" title="Wishlist"><i
                              class="fa fa-heart-o"></i></a>
                          <a href="index.html#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                              class="fa fa-refresh"></i></a>
                          <a href="#" data-toggle="modal" data-target="#price_alert_popular<?php echo $popu_product_data->product_id ?>" data-placement="left" title="Price Alert"><i
                              class="fa fa-bell"></i></a>
                        </div>
                      </div>
                      <div class="product-content">
                        <h4><a href="{{url('/product_details')}}/<?php echo $popu_product_data->product_id; ?>">{{$popu_product_data->product_name }} </a></h4>
                        <div class="pricebox">
                          <span class="regular-price">₦ {{number_format($popu_product_data->product_price) }}</span>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- product single item end -->


                <?php } }else{ echo "<div class='alert alert-danger'>No product found</div>"; } ?>

                </div>

              </div>
            </div>

          </div>
        </div>
        <!-- category tab area start -->

</div>
<!-- main wrapper end -->
</div>


            </div>
            <!-- product view wrapper area end -->


          </div>
          <!-- product main wrap end -->

        </div>
      </div>
    </div>
    <!-- page wrapper end -->



        <!-- testimonial area start -->
        <div class="testimonial-area2">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="testimonial-title text-center mb-28">
                  <h3>happy customer</h3>
                </div> <!-- section title end -->
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="testimonial-carousel-active testimonial-style-2 slick-dot-style">
                  <div class="testimonial-item text-center">
                    <div class="testimonial-thumb">
                      <img src="assets/img/testimonial/team_member1.jpg" alt="">
                    </div>
                    <div class="testimonial-content">
                      <p>Etiam rhoncus congue arcu sed interdum. Cras dolor diam, accumsan eu aliquam eu, luctus vehicula
                        velit. Nam eget tortor ut felis fermentum sodales ac eu lacus</p>
                      <h3><a href="about-us.html#">Elizabeth Taylor</a></h3>
                    </div>
                  </div> <!-- end single testimonial item -->
                  <div class="testimonial-item text-center">
                    <div class="testimonial-thumb">
                      <img src="assets/img/testimonial/team_member2.jpg" alt="">
                    </div>
                    <div class="testimonial-content">
                      <p>Etiam rhoncus congue arcu sed interdum. Cras dolor diam, accumsan eu aliquam eu, luctus vehicula
                        velit. Nam eget tortor ut felis fermentum sodales ac eu lacus</p>
                      <h3><a href="about-us.html#">Elizabeth Taylor</a></h3>
                    </div>
                  </div> <!-- end single testimonial item -->
                  <div class="testimonial-item text-center">
                    <div class="testimonial-thumb">
                      <img src="assets/img/testimonial/team_member3.jpg" alt="">
                    </div>
                    <div class="testimonial-content">
                      <p>Etiam rhoncus congue arcu sed interdum. Cras dolor diam, accumsan eu aliquam eu, luctus vehicula
                        velit. Nam eget tortor ut felis fermentum sodales ac eu lacus</p>
                      <h3><a href="about-us.html#">Elizabeth Taylor</a></h3>
                    </div>
                  </div> <!-- end single testimonial item -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- testimonial area end -->


    <!-- footer top start -->
    <div class="footer-top bg-black pt-14 pb-14">
      <div class="container">
        <div class="footer-top-wrapper">
          <div class="newsletter__wrap">
            <div class="newsletter__title">
              <div class="newsletter__icon">
                <i class="fa fa-envelope"></i>
              </div>
              <div class="newsletter__content">
                <h3>sign up for newsletter</h3>
              </div>
            </div>
            <div class="newsletter__box">
              <form id="form_subscription">
                <div class="res"></div>
                <input type="email" name="email" id="mc-email" autocomplete="off" placeholder="Email">
                <button type="submit" class="sub_btn" id="mc-submit">subscribe!</button>
              </form>
            </div>
            <!-- mailchimp-alerts Start -->
            <div class="mailchimp-alerts">
              <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
              <div class="mailchimp-success"></div><!-- mailchimp-success end -->
              <div class="mailchimp-error"></div><!-- mailchimp-error end -->
            </div>
            <!-- mailchimp-alerts end -->
          </div>
          <div class="social-icons">
            <a href="index.html#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
            <a href="index.html#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
            <a href="index.html#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
            <a href="index.html#" data-toggle="tooltip" data-placement="top" title="Google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="index.html#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- footer top end -->


@include('inc.modals')
@include('inc.footer')
<script>
  jQuery('#form_subscription').submit(function(e){
    e.preventDefault();
    	var msg="";
      jQuery.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
     });
      $.ajax({
      url:"{{ url('/subscribe') }}",
      method:"POST",
      data:new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      beforeSend: function () {
      $('#loader').show();
      $('.sub_btn').attr('disabled',true);
                      },

          success: function(data){
          $('.loader').hide();
            var delay = 3000;
            $('.sub_btn').attr('disabled',false);
            console.log(data);
           if(data.success){
             $('.res').append("<div class='alert alert-success'>"+data.success.success_message+"</div>");
          //  setTimeout((function(){ window.location.reload() }), 3000);
           }else if(data.error){

            $('.res').append("<div class='alert alert-danger'>"+data.error.error_message+"</div>");
           }
           else{
          console.log(data);
            jQuery.each(data.errors, function(key, value){
             msg+='<p>'+value+'</p>';
            });
              $('.res').append("<div class='alert alert-danger'>"+msg+"</div>");
           }
                  },
                  error:function(jqXHR, textStatus, errorThrown){
                //  $('#overlay1').hide();
                alert(textStatus);
                console.log(errorThrown);
                console.log(jqXHR);

              $('#loader').hide();
          }
                              });
      $('.sub_btn').attr('disabled',false);

  });
</script>
