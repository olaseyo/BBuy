
    <!-- footer area start -->
    <footer>


      <!-- footer main start -->
      <div class="footer-widget-area pt-40 pb-38 pb-sm-4 pt-sm-30">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="footer-widget mb-sm-26">
                <div class="widget-title mb-10 mb-sm-6">
                  <h4>contact us</h4>
                </div>
                <div class="widget-body">
                  <ul class="location">
                    <li><i class="fa fa-envelope"></i>info@bestbuy.com</li>
                    <li><i class="fa fa-phone"></i>(234) 8158 486 068</li>
                    <li><i class="fa fa-map-marker"></i>Address: 15 - Bode Thomas Street, Surulere. Lagos</li>
                  </ul>
                  <a class="map-btn" href="{{url('/contactus')}}">open in google map</a>
                </div>
              </div> <!-- single widget end -->
            </div> <!-- single widget column end -->
            <div class="col-md-3 col-sm-6">
              <div class="footer-widget mb-sm-26">
                <div class="widget-title mb-10 mb-sm-6">
                  <h4>my account</h4>
                </div>
                <div class="widget-body">
                  <ul>
                    <li><a href="{{url('/mdashboard')}}">my account</a></li>
                    <li><a href="{{url('/mprice_alert')}}">my Price Alerts</a></li>
                    <li><a href="{{url('compareList')}}">Compare List</a></li>
                    <li><a href="{{url('/mwish_list')}}">my wishlist</a></li>
                    <li><a href="{{url('/signin')}}">login</a></li>
                  </ul>
                </div>
              </div> <!-- single widget end -->
            </div> <!-- single widget column end -->
            <div class="col-md-3 col-sm-6">
              <div class="footer-widget mb-sm-26">
                <div class="widget-title mb-10 mb-sm-6">
                  <h4>quick links</h4>
                </div>
                <div class="widget-body">
                  <ul>
                    <li><a href="{{ url('/about')}}">About Us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="{{ url('/contactus')}}">Contact Us</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                  </ul>
                </div>
              </div> <!-- single widget end -->
            </div> <!-- single widget column end -->

          </div>
        </div>
      </div>
      <!-- footer main end -->

      <!-- footer bootom start -->
      <div class="footer-bottom-area bg-gray pt-20 pb-20">
        <div class="container">
          <div class="footer-bottom-wrap">
            <div class="copyright-text">
              <p>Copyright (C) 2019 <a href="index.html">BestBuy.com</a> All Rights Reserved.</p>
            </div>
            <div class="payment-method-img">
              <img src="assets/img/payment.png" alt="">
            </div>
          </div>
        </div>
      </div>
      <!-- footer bootom end -->
    </footer>
    <!-- footer area end -->
  </div>


  <!-- Scroll to top start -->
  <div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
  </div>
  <!-- Scroll to Top End -->

  <!--All jQuery, Third Party Plugins & Activation (main.js) Files-->
  <script src="{{ url('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
  <!-- Jquery Min Js -->
  <script src="{{url('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
  <!-- Popper Min Js -->
  <script src="{{url('assets/js/vendor/popper.min.js')}}"></script>
  <!-- Bootstrap Min Js -->
  <script src="{{url('assets/js/vendor/bootstrap.min.js')}}"></script>
  <!-- Plugins Js-->
  <script src="{{url('assets/js/plugins.js')}}"></script>
  <!-- Ajax Mail Js -->
  <script src="{{url('assets/js/ajax-mail.js')}}"></script>
  <!-- Active Js -->
  <script src="{{url('assets/js/main.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>


</body>


<script>
function showConfirmMessage(title,type,message) {
    swal({
        title:title,
        text:message,
        type:type,
         html: true,
    }, function () {
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
}
</script>

<style>
#loader,loader2{
  display:none;
  width:20px;
}
#loader3{
  display:none;
  width:20px;
}
#loader4{
  display:none;
  width:20px;
}
#movingBar{
  display:none;
}
</style>
</html>
