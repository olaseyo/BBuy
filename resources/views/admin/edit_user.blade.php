@include ('inc.admin.admin_header')
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
                <li class="breadcrumb-item active">Add User</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Widgets -->

      <div class="row clearfix">
        <div class="col-md-2"></div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Add New</strong> User</h2>

                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" value="{{$user[0]->name }}" class="form-control" name="name" >
                                        <label class="form-label">FullName</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" value="{{$user[0]->email }}" class="form-control" name="email" >
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="phone_number" value="{{$user[0]->phone_number }}" class="form-control no-resize"/>
                                          <input name="uid" value="{{$user[0]->uid }}" type="hidden" class="form-control no-resize"/>
                                        <label class="form-label">Phone Number</label>
                                    </div>
                                </div>


                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select name="utype" class="form-control" >
                                      <option value="{{$user[0]->utype }}">{{$utype[$user[0]->utype] }}</option>
                                      <option value="3"> User</option>
                                      <option value="2"> Merchant</option>
                                      <option value="1">Admin</option>
                                    </select>
                                    <label class="form-label">User Type</label>
                                </div>
                            </div>



                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="password" type="password" class="form-control no-resize" >

                                        <label class="form-label">Password</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="password_confirmation" type="password">

                                        <label class="form-label">Confirm Password</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block waves-effect" type="submit" id="submit_btn">SUBMIT <img id="loader" src="{{url('admin/assets/images/ripple.gif')}}" /><div class="waves-ripple" ></div></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>
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
      url:"{{ url('/addUser') }}",
      method:"POST",
      data:new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      beforeSend: function () {
      $('#loader').show();
      //  $('#movingBar').show();
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
34
