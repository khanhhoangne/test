<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class AdminCategoryComponent extends Component
{
    protected $listeners = ['delete' => 'deleteCategory'];

    public function render()
    {
        $page_title = 'Danh mục sản phẩm';
        $categories = Category::all();

        return view('livewire.categories.admin-category-component', [
            'categories' => $categories
        ])->layout('layouts.admin',['page_title' => $page_title]);
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

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
