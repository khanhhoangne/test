<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{   
    public $name;
    public $slug;
    public $category_id;

    protected $rules = [
        'name' => 'required',
        'slug' => 'required|unique:categories'
    ];
 
    protected $messages = [
        'required' => ':attribute không được để trống.',
        'unique' => ':attribute này đã tồn tại. Vui lòng nhập lại.'
    ];
 
    protected $validationAttributes = [
        'name' => 'Tên danh mục',
        'slug' => 'Liên kết tĩnh'
    ];

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {   
        $this->validateOnly($fields, $this->rules, $this->messages, $this->validationAttributes);
    }

    public function storeCategory()
    {   
        $this->validate($this->rules, $this->messages, $this->validationAttributes);
        
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Thêm danh mục thành công!',
            'text' => ''
        ]);

        $category = $this->reset();
    }

    public function render()
    {
        $page_title = 'Thêm mới Danh mục sản phẩm';
        return view('livewire.categories.admin-add-category-component')->layout('layouts.admin',['page_title' => $page_title]);
    }
}
