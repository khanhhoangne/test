<?php

namespace App\Http\Livewire\Suppliers;

use App\Models\Supplier;
use Livewire\Component;

class AdminSupplierComponent extends Component
{
    protected $listeners = ['delete' => 'deleteSupplier'];

    public function render()
    {
        $page_title = 'Nhà phân phối';
        $suppliers = Supplier::all();

        return view('livewire.suppliers.admin-supplier-component', [
            'suppliers' => $suppliers
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

    public function deleteSupplier($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
    }
}
