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

                      <td>
                        <a href="<?php echo url('edit_product/')."/".$data->product_id ?>"class="btn tblActnBtn">
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include ('inc.admin.footer')
