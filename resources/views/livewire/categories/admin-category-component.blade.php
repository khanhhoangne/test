<main id="main" class="main">

    <div class="pagetitle">
      <h1>Danh mục sản phẩm</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Tổng quan</a></li>
          <li class="breadcrumb-item">Danh mục sản phẩm</li>
          <li class="breadcrumb-item active">Tất cả danh mục</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Danh sách danh mục</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Liên kết tĩnh</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                    $i = 1;
                  @endphp
                  @foreach($categories as $category)
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                        <a href="{{route('admin.editcategory', ['category_slug' => $category->slug])}}" class="">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="#"  
                            wire:click.prevent="deleteConfirm({{$category->id}})"
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
