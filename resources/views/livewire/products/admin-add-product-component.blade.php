<main id="main" class="main">

    <div class="pagetitle">
      <h1>Sản phẩm</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Tổng quan</a></li>
          <li class="breadcrumb-item">Sản phẩm</li>
          <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Thêm mới sản phẩm</h5>

              <!-- Vertical Form -->
              <form class="row g-3" enctype="multipart/form-data" 
              wire:submit.prevent = "storeProduct">
                <div class="col-6">
                  <label for="inputNanme4" class="form-label">Tên sản phẩm</label>
                  <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" 
                  wire:model="name"
                  wire:keyup="generateSlug"
                  >
                  @error('name') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-6">
                  <label for="inputNanme4" class="form-label">Liên kết tĩnh</label>
                  <input type="text" class="form-control" placeholder="Liên kết tĩnh"
                  wire:model="slug"
                  >
                  @error('slug') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Mã sản phẩm</label>
                  <input type="text" class="form-control" placeholder="DIGI201"
                  wire:model="SKU"
                  >
                  @error('SKU') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Danh mục sản phẩm</label>
                  <select class="form-select" aria-label="Danh mục sản phẩm"
                  wire:model='category_id'
                  >
                      <option selected>Chọn danh mục</option>
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                  </select>
                  @error('category_id') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Thương hiệu sản phẩm</label>
                  <select class="form-select" aria-label="Thương hiệu sản phẩm"
                  wire:model='supplier_id'
                  >
                      <option selected>Chọn danh mục</option>
                      @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                      @endforeach
                  </select>
                  @error('supplier_id') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Mô tả ngắn</label>
                  <textarea class="tinymce-editor" placeholder="Mô tả đầy đủ về sản phẩm" 
                  wire:model="short_description"></textarea>
                  @error('short_description') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Mô tả</label>
                  <textarea class="tinymce-editor" placeholder="Mô tả đầy đủ về sản phẩm" 
                  wire:model="description"></textarea>
                  @error('description') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Đơn giá</label>
                  <input type="text" class="form-control" placeholder="10000"
                  wire:model="regular_price"
                  >
                  @error('regular_price') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Giá khuyến mãi</label>
                  <input type="text" class="form-control" placeholder="10000"
                  wire:model="sale_price"
                  >
                  @error('sale_price') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Trạng thái tồn kho</label>
                  <select class="form-select" aria-label="Trạng thái tồn kho"
                  wire:model='stock_status'
                  >
                      <option selected>Mở danh mục chọn</option>
                      <option value="instock">Còn hàng</option>
                      <option value="outofstock">Hết hàng</option>
                  </select>
                  @error('stock_status') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Sản phẩm đặc sắc</label>
                  <select class="form-select" aria-label="Sản phẩm đặc sắc"
                  wire:model='is_featured'
                  >
                      <option selected>Mở danh mục chọn</option>
                      <option value="1">Có</option>
                      <option value="0">Không</option>
                  </select>
                  @error('is_featured') 
                      <p class="text-danger" style="margin: 6px 0 0 0">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Ảnh mô tả</label>
                  <input type="file" class="form-control" id="formFile"
                  wire:model="thumbnail"
                  >

                  @if($thumbnail)
                    <div wire:loading wire:target="thumbnail">Đang tải...</div>
                    <img src="{{$thumbnail->temporaryUrl()}}" width="120" />
                  @endif

                  @error('thumbnail') 
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
