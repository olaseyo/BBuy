          <!DOCTYPE html>
          <html class="no-js" lang="en">

          <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="_token" content="{{csrf_token()}}" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="meta description">

            <!-- Site title -->
            <title>BestBuy - Shop</title>

            <!-- Favicon -->
            <link rel="shortcut icon" href="{{url('assets/img/favicon.ico') }}" type="image/x-icon" />

            <!-- Bootstrap CSS -->
            <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
            <!-- Font-Awesome CSS -->
            <link href="{{ url('assets/css/font-awesome.min.css') }}" rel="stylesheet">
            <!-- helper class css -->
            <link href="{{ url('assets/css/helper.min.css') }}" rel="stylesheet">
            <!-- Plugins CSS -->
            <link href="{{ url('assets/css/plugins.css') }}" rel="stylesheet">

            <!-- Main Style CSS -->
            <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">
            <link href="{{ url('assets/css/skin-default.css') }}" rel="stylesheet" id="galio-skin">
          </head>

          <body>
            <div class="wrapper box-layout">
              <!-- header area start -->
              <header>
                <!-- header top start -->
                <div class="header-top-area bg-gray text-center text-md-left">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-6 col-md-5">
                        <div class="header-call-action">
                          <a href="{{url('/')}}">
                            <i class="fa fa-envelope"></i>
                            info@bestbuy.com
                          </a>
                          <a href="{{url('/')}}">
                            <i class="fa fa-phone"></i>
                            +2348158486068
                          </a>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-7">
                        <div class="header-top-right float-md-right float-none">
                          <nav>
                            <ul>
                              <li>
                                <div class="dropdown header-top-dropdown">
                                  <a class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    my account
                                    <i class="fa fa-angle-down"></i>
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="myaccount">
                                    <a class="dropdown-item" href="my-account.html">my account</a>
                                    <a class="dropdown-item" href="{{ url('/signin')}}"> login</a>
                                    <a class="dropdown-item" href="{{ url('/signup')}}">register</a>
                                  </div>
                                </div>
                              </li>
                              <li>
                                <a href="{{url('/wish_list')}}">my wishlist</a>
                              </li>
                              <li>
                                <a href="{{url('/compareList')}}">My Comparison List</a>
                              </li>
                            </ul>
                          </nav>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- header top end -->

                <!-- header middle start -->
                <div class="header-middle-area pt-20 pb-20">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-lg-3">
                        <div class="brand-logo">
                          <a href="{{url('/')}}">
                            <h1>BestBuy</h1>
                          </a>
                        </div>
                      </div> <!-- end logo area -->
                      <div class="col-lg-9">
                        <div class="header-middle-right">
                          <div class="header-middle-shipping mb-20">
                            <div class="single-block-shipping">
                              <div class="shipping-icon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                              <div class="shipping-content">
                                <h5>Working time</h5>
                                <span>Mon- Sun: 8.00 - 18.00</span>
                              </div>
                            </div> <!-- end single shipping -->
                            <div class="single-block-shipping">
                              <div class="shipping-icon">
                                <i class="fa fa-truck"></i>
                              </div>
                              <div class="shipping-content">
                                <h5>free Listing</h5>
                                <span> </span>
                              </div>
                            </div> <!-- end single shipping -->
                            <div class="single-block-shipping">
                              <div class="shipping-icon">
                                <i class="fa fa-money"></i>
                              </div>
                              <div class="shipping-content">
                                <h5>No product limit</h5>
                                <span> </span>
                              </div>
                            </div> <!-- end single shipping -->
                          </div>
                          <div class="header-middle-block">
                            <div class="header-middle-searchbox">
                              <input type="text" placeholder="Search...">
                              <button class="search-btn"><i class="fa fa-search"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- header middle end -->

                <!-- main menu area start -->
                <div class="main-header-wrapper bdr-bottom1">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="main-header-inner">
                          <div class="category-toggle-wrap">
                            <div class="category-toggle">
                              category
                              <div class="cat-icon">
                                <i class="fa fa-angle-down"></i>
                              </div>
                            </div>
                            <nav class="category-menu category-style-2">
                              <ul>
                                  <?php foreach($categories_list as $cat_list){
                                    if(count($cat_list->sub_categories)<1){ ?>
                                <li><a href="{{url('/categories') }}/{{ $cat_list->cat_id}}"><i class="fa fa-desktop"></i>{{$cat_list->cat_name}}</a></li>
                              <?php  }else{ ?>
                                <li class="menu-item-has-children"><a href="{{url('/categories') }}/{{ $cat_list->cat_id}}"><i class="fa fa-camera"></i>
                                    {{$cat_list->cat_name}}</a>
                                  <!-- Mega Category Menu Start -->
                                  <ul class="category-mega-menu">
                                    <li class="menu-item-has-children">
                                      <a href="{{url('/categories') }}/{{ $cat_list->cat_id}}">{{$cat_list->cat_name}}</a>
                                      <ul>
                                        <?php foreach($cat_list->sub_categories as $sub_cat){
                                            //print_r($sub_cat);
                                          ?>

                                        <li><a href="{{url('/sub_categories') }}/{{ $sub_cat->sub_cat_id}}">{{ $sub_cat->sub_cat_name }}</a></li>
                                    <?php } ?>
                                      </ul>
                                    </li>

                                  </ul><!-- Mega Category Menu End -->
                                </li>
                              <?php } } ?>

                              </ul>
                            </nav>
                          </div>
                          <div class="main-menu">
                            <nav id="mobile-menu">
                              <ul>
                                <li class="active"><a href="{{ url('/')}}"><i class="fa fa-home"></i>Home</a></li>
                                <!--<li><a href="{{ url('/shop')}}">Shop</a></li>-->
                                <li><a href="#">Career</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="{{ url('/contactus')}}">Contact us</a></li>
                              </ul>
                            </nav>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 d-block d-lg-none">
                        <div class="mobile-menu"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- main menu area end -->
              </header>
              <!-- header area end -->
              <?php $image_url= url('')."/uploads/product_images/"; ?>
