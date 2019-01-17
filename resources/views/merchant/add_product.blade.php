@include ('inc.admin.header')
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

      <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Add New</strong> Product</h2>

                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="product_name" >
                                        <label class="form-label">Product Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="product_price" >
                                        <label class="form-label">Product Price</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="product_description" cols="30" rows="5" class="form-control no-resize" ></textarea>
                                        <label class="form-label">Product Description</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="product_primary_image[]" type="file" class="form-control no-resize" multiple>


                                        <label class="form-label">Product Primary Image</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="product_image[]" type="file" class="form-control no-resize" multiple>

                                          <input name="uid" type="hidden" class="form-control no-resize" value="{{Session('uid')}}">

                                        <label class="form-label">Product Image</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="product_link" type="text" multiple>

                                        <label class="form-label">Purchase Link</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="category" class="form-control" >
                                              <option value=""> </option>
                                          <option value="1"> Catename</option>
                                        </select>
                                        <label class="form-label">Category</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="sub_category" class="form-control" >
                                              <option value=""> </option>
                                          <option value="1"> subCatename</option>
                                        </select>
                                        <label class="form-label">Sub Category</label>
                                    </div>
                                </div>

                                <div class="progress">
                               <div class="progress-bar width-per-0" role="progressbar" id="movingBar" aria-valuenow="25"
                                   aria-valuemin="0"  aria-valuemax="100">25%</div>
                           </div>


                                <button class="btn btn-primary waves-effect" type="submit" id="submit_btn">SUBMIT <img id="loader" src="{{url('admin/assets/images/ripple.gif')}}" /><div class="waves-ripple" ></div></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


              </div>
  </section>
  @include ('inc.admin.footer');

<script>
  jQuery('#form_validation').submit(function(e){
    e.preventDefault();
    	var msg="";
      jQuery.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
     });
      $.ajax({
      url:"{{ url('/createProduct') }}",
      method:"POST",
      data:new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      beforeSend: function () {
      $('#loader').show();
        $('#movingBar').show();
      $('.submit_btn').attr('disabled',true);
                      },
        xhr: function () {
          var xhr = $.ajaxSettings.xhr();
          xhr.onprogress = function e() {
              // For downloads
              if (e.lengthComputable) {
                  console.log(e.loaded / e.total);
              }
          };
          xhr.upload.onprogress = function (e) {
              // For uploads
              if (e.lengthComputable) {
                var progress=(e.loaded / e.total)*100;
                  console.log(progress);
            var element = document.getElementById("movingBar");
            element.classList.add("width-per-"+progress+"");
            $('#movingBar').html(progress);
              }
          };
          return xhr;
      },
      success: function(data){
        	$('#loader').hide();
            var delay = 3000;
            $('#submit_btn').attr('disabled',false);
            console.log(data);
           if(data.success){
						 showConfirmMessage("Success","success",data.success.success_message);
					setTimeout((function(){ window.location.reload() }), 3000);
					 }else if(data.error){
					showConfirmMessage("Error","error",data.error.error_message);
					 }
					 else{
             console.log(data);
                  		jQuery.each(data.errors, function(key, value){
                  		 msg+='<p>'+value+'</p>';
                  		});
                      showConfirmMessage("Error","error",msg);
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
      $('#submit_btn').attr('disabled',false);

  });
</script>
