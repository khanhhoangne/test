<main id="main" class="main">

    <div class="pagetitle">
      <h1>Quản lý Slider</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Tổng quan</a></li>
          <li class="breadcrumb-item">Quản lý Slider</li>
          <li class="breadcrumb-item active">Tất cả Slider</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Danh sách slide</h5>

              <!-- Bordered Table -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tiêu đề phụ</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Liên kết</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $i = 1;
                  @endphp
                  @foreach($sliders as $slider)  
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td>
                        <img src="{{asset('assets/img/sliders')}}/{{$slider->image}}" width="120" alt="{{$slider->title}}">
                    </td>
                    <td>{{$slider->title}}</td>
                    <td>{{$slider->subtitle}}</td>
                    <td>{{$slider->price}}</td>
                    <td>{{$slider->link}}</td>
                    <td>{{$slider->status == 1 ? 'Hoạt động' : 'Ngừng'}}</td>
                    <td>
                        <a href="{{route('admin.edithomeslider', ['slider_id' => $slider->id])}}" class="">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="#"  
                            wire:click.prevent="deleteConfirm({{$slider->id}})"
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
              <!-- End Bordered Table -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->