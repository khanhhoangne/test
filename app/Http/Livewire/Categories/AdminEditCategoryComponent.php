<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $category_id;

    public $name;
    public $slug;

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

    public function mount($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {   
        $this->validateOnly($fields, $this->rules, $this->messages, $this->validationAttributes);
    }

    public function updateCategory()
    {   
        $this->validate($this->rules, $this->messages, $this->validationAttributes);
        
        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Cập nhật danh mục thành công!',
            'text' => ''
        ]);
    }

    public function render()
    {
        $page_title = 'Cập nhật Danh mục sản phẩm';

        return view('livewire.categories.admin-edit-category-component')->layout('layouts.admin',['page_title' => $page_title]);;
    }
}
