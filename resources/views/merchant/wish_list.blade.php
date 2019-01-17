@include ('inc.admin.header')
  <?php $method="DeleteProduct"; ?>
  <section class="content">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="breadcrumb breadcrumb-style ">
              <li class="breadcrumb-item">
                <h4 class="page-title">Products</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
                <a href="{{url('/')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{url('/mdashboard')}}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Wish List</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="body">
              <div class="table-responsive">
                <table id="tableExport" class="display table table-hover table-checkable order-column width-per-100" >
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Product Name</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Link</th>
                      <th>Delete</th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $n=0;
                     foreach($product as $data)  {
                      //  print_r($product);
                      $n++;
                    ?>
                    <tr>
                      <td>{{ $n }}</td>
                      <td>{{ $data->product_name }}</td>
                      <td>{{ $data->cat_name }}</td>
                      <td>{{ $data->sub_cat_name }}</td>
                      <td>{{ $data->product_price }}</td>
                      <td>{{ $data->product_description }}</td>
                      <td>{{ $data->product_link }}</td>

                      <td>
                        <button id="del_btn{{$data->wish_id}}" onclick="DeleteWishList({{ $data->wish_id}},'del_btn{{$data->wish_id}}','DeleteWishList')" class="btn tblActnBtn">
                          <i class="material-icons">delete</i>
                        </button>
                      </td>
                    </tr>
                  <?php  }  ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    function DeleteWishList(id,btn,url){
       var jdata={"id":id};
      	var msg="";
        jQuery.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           }
       });
        $.ajax({
        url:"<?php echo url('') ?>/"+url,
        method:"POST",
        data:jdata,
        beforeSend: function () {
        $('#loader').show();
          //$('#movingBar').show();
        $(btn).attr('disabled',true);
                        },
        success: function(data){
          	$('#loader').hide();
              var delay = 3000;
              $(btn).attr('disabled',false);
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
        $(btn).attr('disabled',false);

    };
  </script>
  @include ('inc.admin.footer')
