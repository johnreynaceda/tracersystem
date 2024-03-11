<?php

namespace App\Http\Livewire\Alumni;

use App\Models\AlumniInformation;
use Livewire\Component;


class TraceList extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.alumni.trace-list', [
            'alumnis' => AlumniInformation::when($this->search, function ($query) {
                $query->where('firstname', 'like', '%' . $this->search . '%')->orWhere('lastname', 'like', '%' . $this->search . '%')->orWhere('batch', 'like', '%' . $this->search . '%')->orWhere('course', 'like', '%' . $this->search . '%');
            })->where('is_verified', true)->get(),
        ]);

    }


}
