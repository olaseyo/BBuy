@include ('inc.admin.admin_header');
<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 class="page-title">Dashboard</h4>
            </li>
            <li class="breadcrumb-item bcrumb-1">
              <a href="index.html">
                <i class="fas fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Widgets -->
    <div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="counter-box text-center white">
          <div class="text font-17 m-b-5">Total Product</div>
          <h3 class="m-b-10">{{ $products }}
            <i class="material-icons col-green">trending_up</i>
          </h3>
          <div class="icon">
            <div class="chart chart-bar"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="counter-box text-center white">
          <div class="text font-17 m-b-5">Total Views</div>
          <h3 class="m-b-10">{{ $views }}
            <i class="material-icons col-red">trending_down</i>
          </h3>
          <div class="icon">
            <span class="chart chart-line"></span>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="counter-box text-center white">
          <div class="text font-17 m-b-5">Total Wish List Items</div>
          <h3 class="m-b-10">{{$wish_list}}
            <i class="material-icons col-green">trending_up</i>
          </h3>
          <div class="icon">
            <div class="chart chart-pie"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="counter-box text-center white">
          <div class="text font-17 m-b-5">Price Alert Subscription</div>
          <h3 class="m-b-10">{{ $price_alert}}
            <i class="material-icons col-red">trending_down</i>
          </h3>
          <div class="icon">
            <div class="chart" id="liveChart">Loading..</div>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Widgets -->

  </div>
</section>
  @include ('inc.admin.footer');
