<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;


class AdminAddProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $is_featured;
    public $thumbnail;
    public $category_id;
    public $supplier_id;
    public $gallery;

    protected $rules = [
        'name' => 'required',
        'slug' => 'required|unique:products',
        'short_description' => 'required',
        'description' => 'required',
        'regular_price' => 'required|numeric',
        'sale_price' => 'numeric',
        'SKU' => 'required',
        'stock_status' => 'required',
        'thumbnail' => 'required|mimes:jpeg,png,jpg',
        'category_id' => 'required',
        'supplier_id' => 'required',
    ];
 
    protected $messages = [
        'required' => ':attribute không được để trống.',
        'unique' => ':attribute này đã tồn tại. Vui lòng nhập lại.',
        'numeric' => ':attribute phải là số!',
        'mimes' => ':attribute chỉ nhận các hình ảnh có đuôi .jpeg, .jpg, .png.',
    ];
 
    protected $validationAttributes = [
        'name' => 'Tên danh mục',
        'slug' => 'Liên kết tĩnh',
        'short_description' => 'Mô tả ngắn',
        'description' => 'Mô tả',
        'regular_price' => 'Giá sản phẩm',
        'sale_price' => 'Giá khuyến mãi',
        'SKU' => 'Mã hàng hóa',
        'stock_status' => 'Trạng thái',
        'thumbnail' => 'Ảnh đại diện',
        'category_id' => 'Danh mục sản phẩm',
        'supplier_id' => 'Thương hiệu',
    ];

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->is_featured = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {   
        $this->validateOnly($fields, $this->rules, $this->messages, $this->validationAttributes);
    }

    public function storeProduct()
    {
        $this->validate($this->rules, $this->messages, $this->validationAttributes);

        $product = new Product();

        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->is_featured = $this->is_featured;
        $product->category_id = $this->category_id;
        $product->supplier_id = $this->supplier_id;

        $thumbnailName = $this->slug.Carbon::now()->timestamp. '.' .$this->thumbnail->extension();
        $this->thumbnail->storeAs('products', $thumbnailName);

        $product->thumbnail = $thumbnailName;

        $product->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Thêm sản phẩm thành công!',
            'text' => ''
        ]);

        $product = $this->reset();
    }

    public function render()
    {
        $page_title = 'Thêm mới sản phẩm';

        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('livewire.products.admin-add-product-component',[
            'categories' => $categories,
            'suppliers' => $suppliers
        ])->layout('layouts.admin', ['page_title' => $page_title]);;
    }
}
