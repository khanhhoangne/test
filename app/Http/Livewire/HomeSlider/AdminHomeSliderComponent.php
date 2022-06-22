<?php

namespace App\Http\Livewire\HomeSlider;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function render()
    {
        $page_title = 'Ảnh bìa trang chủ';

        $sliders = HomeSlider::all();

        return view('livewire.home-slider.admin-home-slider-component', [
            'sliders' => $sliders
        ])->layout('layouts.admin', ['page_title' => $page_title]);
    }
}
