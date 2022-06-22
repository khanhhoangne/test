<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class AdminProductComponent extends Component
{
    protected $listeners = ['delete' => 'deleteProduct'];
    
    public function render()
    {
        $page_title = 'Danh sách sản phẩm';

        $products = Product::all();
        return view('livewire.products.admin-product-component', [
            'products' => $products
        ])->layout('layouts.admin', ['page_title' => $page_title]);
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Bạn có chắc chắn muốn xóa?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function deleteProduct($id)
    {
        $category = Product::find($id);
        $category->delete();
    }
}
