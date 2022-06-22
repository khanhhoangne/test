<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $page_title = "Trang quản trị";
        return view('livewire.dashboard-component')->layout('layouts.admin', [
            'page_title' => $page_title
        ]);
    }
}
