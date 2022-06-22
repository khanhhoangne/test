<main id="main" class="main">

    <div class="pagetitle">
      <h1>Quản lý Slider</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Tổng quan</a></li>
          <li class="breadcrumb-item">Quản lý Slider</li>
          <li class="breadcrumb-item active">Thêm mới slider</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Thêm mới slider</h5>

              <!-- Vertical Form -->
              <form class="row g-3" wire:submit.prevent = "storeHomeSlider" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Tiêu đề</label>
                  <input type="text" class="form-control" placeholder="Nhập Tiêu đề" 
                  wire:model="title"
                  >
                  @error('title') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Tiêu đề phụ</label>
                  <input type="text" class="form-control" placeholder="Tiêu đề phụ"
                  wire:model="subtitle"
                  >
                  @error('subtitle') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Liên kết</label>
                  <input type="text" class="form-control" placeholder="Liên kết"
                  wire:model="link"
                  >
                  @error('link') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Giá</label>
                  <input type="text" class="form-control" placeholder="Giá"
                  wire:model="price"
                  >
                  @error('price') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Ảnh</label>
                  <input type="file" class="form-control" id="formFile"
                  wire:model="image"
                  >

                  @if($image)
                    <div wire:loading wire:target="image">Đang tải...</div>
                    <img src="{{$image->temporaryUrl()}}" width="120" />
                  @endif

                  @error('image') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Trạng thái</label>
                  <select class="form-select" aria-label="Trạng thái"
                  wire:model='status'
                  >
                      <option selected>Chọn trạng thái</option>
                      <option value="1">Hoạt động</option>
                      <option value="0">Ngừng</option>
                  </select>
                  @error('status') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Thêm mới</button>
                  <button type="reset" class="btn btn-secondary">Tạo lại</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

        </div>
      </div>
    </section>

</main><!-- End #main -->
