@include ('inc.admin.admin_header')
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
                <a href="index.html">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="index.html">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Products</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="body">
              <div class="table-responsive">
                <form id="form_validation" method="get">
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
                      <th>Views</th>
                      <th>Featured</th>
                      <th>Product of the day</th>
                      <th>Edit</th>
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
                      <td>{{ $data->total_views }}</td>
                      <td><input class="form-check-input" type="checkbox" >

                        <div class="contact100-form-checkbox">
              						<div class="form-check">
              							<label class="form-check-label">
              								<input class="form-check-input" type="checkbox" name="fproduct_id[]" value="{{ $data->product_id }}">
              								<span class="form-check-sign">
              									<span class="check"></span>
              								</span>
              							</label>
              						</div>
              					</div>
                       </td>
                      <td>  <div class="contact100-form-checkbox">
              						<div class="form-check">
              							<label class="form-check-label">
              								<input class="form-check-input" type="checkbox" name="pproduct_id[]" value="{{ $data->product_id }}">
              								<span class="form-check-sign">
              									<span class="check"></span>
              								</span>
              							</label>
              						</div>
              					</div></td>

                      <td>
                        <a href="<?php echo url('admin_edit_product/')."/".$data->product_id ?>"class="btn tblActnBtn">
                          <i class="material-icons">mode_edit</i>
                        </a>
                      </td>
                      <td>
                        <button id="del_btn{{$data->product_id}}" onclick="Delete({{ $data->product_id}},'del_btn{{$data->product_id}}','DeleteProduct')" class="btn tblActnBtn">
                          <i class="material-icons">delete</i>
                        </button>
                      </td>
                    </tr>
                  <?php  }  ?>

                  </tbody>
                </table>
                <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-5">

                <div class="btn-group m-b-10">
                                    <button type="button" class="btn btn-info waves-effect">Select </button>
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="btn-toggle-dropdown">Select Action</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a onclick="Mark('loader','mark','markAsFeatured')">Submit Featured <img id="loader"
                                                    src="{{url('admin/assets/images/ripple.gif')}}" /></a>
                                        </li>
                                        <li>
                                            <a onclick="Mark('loader2','mark2','markAsProductOfTheDay')">Submit product of the day <img id="loader"
                                                    src="{{url('admin/assets/images/ripple.gif')}}" /></a>
                                        </li>
                                        <li>
                                            <a onclick="Mark('loader3','mark3','unMarkAsFeatured')">Unmark Featured <img id="loader3"
                                                    src="{{url('admin/assets/images/ripple.gif')}}" /></a>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                        <li>
                                            <a onclick="Mark('loader4','mark4','unMarkAsProductOfTheDay')">Unmark product of the day <img id="loader4"
                                                    src="{{url('admin/assets/images/ripple.gif')}}" /></a>
                                        </li>
                                    </ul>
                                </div>
              </div>
            </div>
              </form>
              <br/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    <script>
      function Mark(loader,btn,url){
            var msg = "";
            var fdata=$('#form_validation').serialize();
            console.log(fdata);
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url:"<?php echo url('') ?>/"+url,
                method: "POST",
                data:fdata,
                beforeSend: function() {
                    $('#'+loader).show()
                    $('.'+btn).attr('disabled', true);
                },
                success: function(data) {
                    $('#'+loader).hide();
                    var delay = 3000;
                    $('.'+btn).attr('disabled', false);
                    console.log(data);
                    if (data.success) {
                        showConfirmMessage("Success", "success", data.success.success_message);
                        setTimeout((function() {
                            window.location.reload()
                        }), 3000);
                    } else if (data.error) {
                        showConfirmMessage("Error", "error", data.error.error_message);
                    } else {
                        console.log(data);
                        jQuery.each(data.errors, function(key, value) {
                            msg += '<p>' + value + '</p>';
                        });
                        showConfirmMessage("Error", "error", msg);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //  $('#overlay1').hide();
                    alert(textStatus);
                    console.log(errorThrown);
                    console.log(jqXHR);

                    $('#'+loader).hide();
                }
            });
            $('.'+btn).attr('disabled', false);

        }
    </script>

  @include ('inc.admin.footer')
