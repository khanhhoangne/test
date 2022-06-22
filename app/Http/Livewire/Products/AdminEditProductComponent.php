<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditProductComponent extends Component
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

    public $newThumbnail;
    public $product_id;

    protected $rules = [
        'name' => 'required',
        'slug' => 'required|unique:products',
        'short_description' => 'required',
        'description' => 'required',
        'regular_price' => 'required|numeric',
        'sale_price' => 'numeric',
        'SKU' => 'required',
        'stock_status' => 'required',
        'category_id' => 'required',
        'supplier_id' => 'required',
    ];
 
    protected $messages = [
        'required' => ':attribute không được để trống.',
        'unique' => ':attribute này đã tồn tại. Vui lòng nhập lại.',
        'numeric' => ':attribute phải là số!',
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
        'category_id' => 'Danh mục sản phẩm',
        'supplier_id' => 'Thương hiệu',
    ];

    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();

        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->is_featured = $product->is_featured;
        $this->thumbnail = $product->thumbnail;
        $this->category_id = $product->category_id;
        $this->supplier_id = $product->supplier_id;
        $this->product_id = $product->id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {   
        $this->validateOnly($fields, $this->rules, $this->messages, $this->validationAttributes);
    }

    public function updateProduct()
    {
        $this->validate($this->rules, $this->messages, $this->validationAttributes);

        $product = Product::find($this->product_id);

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
        if($this->newThumbnail){
            $thumbnailName = $this->slug.Carbon::now()->timestamp. '.' .$this->newThumbnail->extension();
            $this->newThumbnail->storeAs('products', $thumbnailName);

            $product->thumbnail = $thumbnailName;
        }
        
        $product->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Cập nhật sản phẩm thành công!',
            'text' => ''
        ]);
    }

    public function render()
    {
        $page_title = 'Cập nhật sản phẩm';

        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('livewire.products.admin-edit-product-component',[
            'categories' => $categories,
            'suppliers' => $suppliers
        ])->layout('layouts.admin', ['page_title' => $page_title]);;
    }
}
