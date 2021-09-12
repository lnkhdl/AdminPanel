<?php

namespace App\Http\Livewire;

use App\Models\Issues\Type;
use Livewire\Component;

class ShowIssuesWorkflow extends Component
{
    public $byType = null;

    public function mount()
    {
        $this->byType = $this->byType ?? Type::first()->name;
    }

    public function render()
    {
        return view('livewire.show-issues-workflow', [
            'allTypes' => Type::all()->pluck('name'),
            'selectedType'=> Type::with('statuses')->where('name', $this->byType)->first()
        ]);
    }
}
