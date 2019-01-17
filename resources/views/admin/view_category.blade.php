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
              
                <table id="tableExport" class="display table table-hover table-checkable order-column width-per-100" >
                  <thead>
                    <tr>
                      <th>#</th>

                      <th>Category Name</th>

                      <th>Edit</th>
                      <th>Delete</th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $n=0;
                     foreach($categories_list as $data)  {
                      //  print_r($product);
                      $n++;
                    ?>
                    <tr>
                      <td>{{ $n }}</td>
                      <td>{{ $data->cat_name }}</td>

                      <td>
                        <a href="<?php echo url('admin_edit_category/')."/".$data->cat_id ?>"class="btn tblActnBtn">
                          <i class="material-icons">mode_edit</i>
                        </a>
                      </td>
                      <td>
                        <button id="del_btn{{$data->cat_id}}" onclick="Delete({{ $data->cat_id}},'del_btn{{$data->cat_id}}','DeleteCategory')" class="btn tblActnBtn">
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

              </div>
            </div>

              <br/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @include ('inc.admin.footer')
