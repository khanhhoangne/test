<main id="main" class="main">

    <div class="pagetitle">
      <h1>Sản phẩm</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Tổng quan</a></li>
          <li class="breadcrumb-item">Sản phẩm</li>
          <li class="breadcrumb-item active">Tất cả sản phẩm</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Danh sách sản phẩm</h5>

              <style>
                  #datatable td,#datatable th{
                    vertical-align: middle;
                  }
              </style>
              <!-- Table with stripped rows -->
              <table class="table datatable" id="datatable">
                <thead>
                  <tr>
                    <th width="5%" scope="col">#</th>
                    <th width="10%" scope="col">Ảnh</th>
                    <th width="20%" scope="col">Tên sản phẩm</th>
                    <th width="10%" scope="col">Trạng thái</th>
                    <th width="10%" scope="col">Đơn giá</th>
                    <th width="10%" scope="col">Danh mục</th>
                    <th width="10%" scope="col">Thương hiệu</th>
                    <th width="10%" scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                    $i = 1;
                  @endphp
                  @foreach($products as $product)
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td>
                        <img src="{{ asset('assets/img/products') }}/{{$product->thumbnail}}" alt="" class="img-fluid" width="100%">
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->stock_status}}</td>
                    <td>{{$product->regular_price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->supplier->name}}</td>
                    <td>
                        <a href="{{route('admin.editproduct', ['product_slug' => $product->slug])}}" class="">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="#"  
                            wire:click.prevent="deleteConfirm({{$product->id}})"
                            style="margin-left: 8px;" 
                        >
                            <i class="bi bi-trash text-danger"></i>
                        </a>
                    </td>
                  </tr>
                  @php 
                    $i++;
                  @endphp
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

</main><!-- End #main -->
