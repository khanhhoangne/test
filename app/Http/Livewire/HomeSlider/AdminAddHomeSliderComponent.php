<?php

namespace App\Http\Livewire\HomeSlider;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminAddHomeSliderComponent extends Component
{
    public $title;
    public $subtitle;
    public $link;
    public $price;
    public $image;
    public $status;

    protected $rules = [
        'title' => 'required',
        'subtitle' => 'required',
        'link' => 'required',
        'price' => 'required',
        'image' => 'required|mimes:jpeg,png,jpg',
    ];
 
    protected $messages = [
        'required' => ':attribute không được để trống.',
        'mimes' => ':attribute chỉ nhận các hình ảnh có đuôi .jpeg, .jpg, .png.',
    ];
 
    protected $validationAttributes = [
        'title' => 'Tiêu đề',
        'subtitle' => 'Tiêu đề phụ',
        'link' => 'Liên kết',
        'price' => 'Giá',
        'image' => 'Ảnh',
    ];

    public function mount()
    {
        $this->status = 0;
    }

    public function updated($fields)
    {   
        $this->validateOnly($fields, $this->rules, $this->messages, $this->validationAttributes);
    }

    public function storeHomeSlider()
    {
        $this->validate($this->rules, $this->messages, $this->validationAttributes);

        $slider = new HomeSlider();

        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $slider->status = $this->status;

        
    }

    public function render()
    {
        $page_title = 'Thêm mới slider';

        return view('livewire.home-slider.admin-add-home-slider-component')->layout('layouts.admin', ['page_title' => $page_title]);
    }
}
