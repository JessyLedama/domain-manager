<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Domain;

class Domains extends Component
{
    public function render()
    {
        $domains = Domain::all();

        return view('livewire.domains', compact('domains'));
    }
}
