<main id="main" class="main">

    <div class="pagetitle">
      <h1>Thương hiệu sản phẩm</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Tổng quan</a></li>
          <li class="breadcrumb-item">Thương hiệu sản phẩm</li>
          <li class="breadcrumb-item active">Tất cả thương hiệu</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Danh sách thương hiệu</h5>

              <!-- Table with stripped rows -->
              <style>
                  #datatable td,#datatable th{
                    vertical-align: middle;
                  }
              </style>
              <table class="table datatable" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên thương hiệu</th>
                    <th scope="col" width="10%">Ảnh đại diện</th>
                    <th scope="col" width="30%">Mô tả</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                    $i = 1;
                  @endphp
                  @foreach($suppliers as $supplier)
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$supplier->name}}</td>
                    <td>
                        <img src="{{ asset('assets/img/fake_logo') }}/{{$supplier->logo}}" alt="" class="img-fluid" width="100%">
                    </td>
                    <td>{{Illuminate\Support\Str::limit($supplier->description, 150, $end='...')}}</td>
                    <td>
                        <label class="switch">
                          <input type="checkbox">
                          <span class="slider round"></span>
                        </label>
                    </td>
                    <td>
                        <a href="{{route('admin.editsupplier', ['supplier_slug' => $supplier->slug])}}" class="">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="#"  
                            wire:click.prevent="deleteConfirm({{$supplier->id}})"
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
