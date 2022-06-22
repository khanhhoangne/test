<main id="main" class="main">

    <div class="pagetitle">
      <h1>Danh mục sản phẩm</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Tổng quan</a></li>
          <li class="breadcrumb-item">Danh mục sản phẩm</li>
          <li class="breadcrumb-item active">Cập nhật danh mục</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Cập nhật danh mục</h5>
                </div>
                <div class="col-md-6" style="align-self: center;">
                    <a href="{{route('admin.categories')}}" class="btn btn-success float-end">Tất cả danh mục</a>
                </div>
              </div>
              <!-- Vertical Form -->
              <form class="row g-3" wire:submit.prevent = "updateCategory">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Tên danh mục</label>
                  <input type="text" class="form-control" placeholder="Nhập tên danh mục" 
                  wire:model="name"
                  wire:keyup="generateslug"
                  >
                  @error('name') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Liên kết</label>
                  <input type="text" class="form-control" placeholder="Liên kết tĩnh"
                  wire:model="slug"
                  >
                  @error('slug') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                  <button type="reset" class="btn btn-secondary">Tạo lại</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

        </div>
      </div>
    </section>

</main><!-- End #main -->
