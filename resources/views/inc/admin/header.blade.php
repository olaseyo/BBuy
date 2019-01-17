<?php
if (!Session::has('email')){
    ?>
<script type="text/javascript">
    window.location = "{{ url('/signin') }}";//here double curly bracket
</script>
<?php
}else if(Session('utype')==1){ ?>
  <script type="text/javascript">
      window.location = "{{ url('/dashboard') }}";//here double curly bracket
  </script>

<?php
}
?>
<!DOCTYPE html>
<html lang>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="_token" content="{{csrf_token()}}" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BestBuy - Dashboard</title>
  <link href="{{ url('admin/assets/css/app.min.css')}}" rel="stylesheet">
  <link href="{{ url('admin/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ url('admin/assets/css/styles/all-themes.css')}}" rel="stylesheet">
  <!-- Light Gallery Css -->
   <link href="{{ url('admin/assets/js/bundles/lightgallery/dist/css/lightgallery.css')}}" rel="stylesheet">

</head>
<body class="light">
  <div class="page-loader-wrapper">
    <div class="loader">
      <div class="m-t-30">
        <img class="loading-img-spin" src="{{ url('admin/assets/images/loading.png')}}" width="20" height="20" alt="admin">
      </div>
      <p>Please wait...</p>
    </div>
  </div>
  <div class="overlay"></div>
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"
          aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="{{url('/mdashboard')}}">
          <img src="{{ url('admin/assets/images/logo.png')}}" alt="" />
          <span class="logo-name">BestBuy</span>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="pull-left">
          <li>
            <a href="javascript:void(0);" class="sidemenu-collapse">
              <i class="material-icons">reorder</i>
            </a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="fullscreen">
            <a href="javascript:;" class="fullscreen-btn">
              <i class="fas fa-expand"></i>
            </a>
          </li>
        <!--  <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
              <i class="far fa-bell"></i>
              <span class="label-count bg-orange"></span>
            </a>
            <ul class="dropdown-menu pullDown">
              <li class="header">NOTIFICATIONS</li>
              <li class="body">
                <ul class="menu">
                  <li>
                    <a href="javascript:void(0);">
                      <span class="table-img msg-user">
                        <img src="admin/assets/images/user/user1.jpg" alt="">
                      </span>
                      <span class="menu-info">
                        <span class="menu-title">Sarah Smith</span>
                        <span class="menu-desc">
                          <i class="material-icons">access_time</i> 14 mins ago
                        </span>
                        <span class="menu-desc">Please check your email.</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <span class="table-img msg-user">
                        <img src="admin/assets/images/user/user2.jpg" alt="">
                      </span>
                      <span class="menu-info">
                        <span class="menu-title">Airi Satou</span>
                        <span class="menu-desc">
                          <i class="material-icons">access_time</i> 22 mins ago
                        </span>
                        <span class="menu-desc">Please check your email.</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <span class="table-img msg-user">
                        <img src="admin/assets/images/user/user3.jpg" alt="">
                      </span>
                      <span class="menu-info">
                        <span class="menu-title">John Doe</span>
                        <span class="menu-desc">
                          <i class="material-icons">access_time</i> 3 hours ago
                        </span>
                        <span class="menu-desc">Please check your email.</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <span class="table-img msg-user">
                        <img src="admin/assets/images/user/user4.jpg" alt="">
                      </span>
                      <span class="menu-info">
                        <span class="menu-title">Ashton Cox</span>
                        <span class="menu-desc">
                          <i class="material-icons">access_time</i> 2 hours ago
                        </span>
                        <span class="menu-desc">Please check your email.</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <span class="table-img msg-user">
                        <img src="admin/assets/images/user/user5.jpg" alt="">
                      </span>
                      <span class="menu-info">
                        <span class="menu-title">Cara Stevens</span>
                        <span class="menu-desc">
                          <i class="material-icons">access_time</i> 4 hours ago
                        </span>
                        <span class="menu-desc">Please check your email.</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <span class="table-img msg-user">
                        <img src="admin/assets/images/user/user6.jpg" alt="">
                      </span>
                      <span class="menu-info">
                        <span class="menu-title">Charde Marshall</span>
                        <span class="menu-desc">
                          <i class="material-icons">access_time</i> 3 hours ago
                        </span>
                        <span class="menu-desc">Please check your email.</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <span class="table-img msg-user">
                        <img src="admin/assets/images/user/user7.jpg" alt="">
                      </span>
                      <span class="menu-info">
                        <span class="menu-title">John Doe</span>
                        <span class="menu-desc">
                          <i class="material-icons">access_time</i> Yesterday
                        </span>
                        <span class="menu-desc">Please check your email.</span>
                      </span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="javascript:void(0);">View All Notifications</a>
              </li>
            </ul>
          </li>-->
          <li class="dropdown user_profile">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
              <img src="{{ url('assets/images/avatar.png')}}" width="32" height="32" alt="User">
            </a>
            <ul class="dropdown-menu pullDown">
              <li class="body">
                <ul class="user_dw_menu">
                  <li>
                    <a href="{{url('/profile')}}">
                      <i class="material-icons">person</i>Profile
                    </a>
                  </li>

                  <li>
                    <a href="{{url('/logOut')}}">
                      <i class="material-icons">power_settings_new</i>Logout
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!--<li class="pull-right">
            <a href="javascript:void(0);" class="js-right-sidebar" data-close="true">
              <i class="fas fa-cog"></i>
            </a>
          </li>-->
        </ul>
      </div>
    </div>
  </nav>
  <div>
    <aside id="leftsidebar" class="sidebar">
      <div class="menu">
        <ul class="list">
          <li class="sidebar-user-panel active">
            <div class="user-panel">
              <div class="image">
                <img src="{{ url('assets/images/avatar.png')}}" class="img-circle user-img-circle" alt="User Image">
              </div>
            </div>
            <div class="profile-usertitle">
              <div class="sidebar-userpic-name">{{ Session('name') }}</div>
              <div class="profile-usertitle-job">
                <?php if(Session('utype')=="2"){ echo 'Merchant'; }else{ echo 'User'; }?> </div>
            </div>
          </li>
          <li class="active">
            <a href="{{url('/mdashboard')}}">
              <i class="fas fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <?php  if(Session('utype')==2){ ?>

          <li >
          <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
              <i class="fas fa-shopping-cart"></i>
              <span>Product</span>
          </a>
          <ul class="ml-menu">
              <li>

                  <a href="{{url('/product')}}" class="waves-effect waves-block">Add Product</a>
              </li>
              <li>
                  <a href="{{url('/view_product')}}" class="waves-effect waves-block">View Product</a>
              </li>
          </ul>
            </li>

          <?php } ?>
            <li>
            <a href="{{url('/mprofile')}}" class=" waves-effect waves-block">
              <i class="fas fa-user-tie"></i>
              <span>Profile</span>
            </a>
          </li>

          <li>
          <a href="{{url('/mwish_list')}}" class=" waves-effect waves-block">
            <i class="fas fa-heart"></i>
            <span>Whish List</span>
          </a>
        </li>

        <li>
        <a href="{{url('/mprice_alert')}}" class=" waves-effect waves-block">
          <i class="fas fa-bell"></i>
          <span>Price Alert</span>
        </a>
      </li>

        </ul>
      </div>
    </aside>

  </div>
