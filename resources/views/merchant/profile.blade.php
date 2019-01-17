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
              <li class="breadcrumb-item active">Profile</li>
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
                                <strong>Update</strong> Profile</h2>

                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" value="{{ $user[0]->name }}" class="form-control" name="name" >
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" value="{{ $user[0]->email }}" class="form-control" name="email" >
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input value="{{ $user[0]->phone_number }}" class="form-control" name="phone_number" type="text"/>

                                        <label class="form-label">Phone Number</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="address" cols="30" rows="5" class="form-control no-resize" ></textarea>
                                        <label class="form-label">Address</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input value="{{ $user[0]->city }}" name="city" class="form-control" type="text"/>

                                        <label class="form-label">City</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="state" value="{{ $user[0]->state }}" class="form-control" type="text"/>

                                        <label class="form-label">State</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                      <select name="country" size="1" class="form-control">
                                        @include('inc.country');
                                      </select>
                                        <label class="form-label">Country</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="zip" value="{{ $user[0]->zip }}" type="text"/>

                                        <label class="form-label">Zip</label>
                                    </div>
                                </div>
                                  <?php  if(Session('utype')==3){ ?>
                                <div class="contact100-form-checkbox">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" name="utype" type="checkbox" value="2">Become a merchant
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </div>
                              <?php } ?>

                                <button class="btn btn-primary waves-effect" type="submit" id="submit_btn">Update <img id="loader" src="{{url('admin/assets/images/ripple.gif')}}" /><div class="waves-ripple" ></div></button>
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
      url:"{{ url('/mUpdateUsers') }}",
      method:"POST",
      data:new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      beforeSend: function () {
      $('#loader').show();
      $('.submit_btn').attr('disabled',true);
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
