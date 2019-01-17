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
                      <th>Email</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $n=0;
                     foreach($subscribe as $data)  {
                      //  print_r($product);
                      $n++;
                    ?>
                    <tr>
                      <td>{{ $n }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->created_at }}</td>
                    </tr>
                  <?php  }  ?>

                  </tbody>
                </table>
                <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-5">

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
