<?php

namespace App\Http\Livewire;

use App\Models\Issues\Issue;
use App\Models\Issues\Status;
use App\Models\Issues\Type;
use Livewire\Component;
use Livewire\WithPagination;

class ShowIssues extends Component
{
    use WithPagination;

    public $range;
    public $byType = "";
    public $byStatus = "";
    public $search = "";
    public $sortByColumn = "id";
    public $sortOrder = "asc";

    // Reset the current page to 1 when filtering by type is applied
    public function updatingByType()
    {
        $this->resetPage();
    }

    // Reset the current page to 1 when filtering by status is applied
    public function updatingByStatus()
    {
        $this->resetPage();
    }

    // Reset the current page to 1 when searching is applied
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setSortBy($column)
    {
        $this->sortOrder = $this->sortByColumn === $column ? ($this->sortOrder === 'asc' ? 'desc' : 'asc') : 'asc';
        $this->sortByColumn = $column;
    }

    public function render()
    {
        if ($this->range === "all") {
            $issuesBuilder = $this->range === "all" ? Issue::query() : Issue::where('assigned_to', auth()->user()->id);
        } else if ($this->range === "my_assigned") {
            $issuesBuilder = Issue::where('assigned_to', auth()->user()->id);
        } else if ($this->range === "my_reported") {
            $issuesBuilder = Issue::where('reported_by', auth()->user()->id);
        } else {
            return view('livewire.show-issues',[
                'issues' => [],
                'types' => Type::pluck('name'),
                'statuses' => Status::pluck('name')
            ]);
        }      

        return view('livewire.show-issues',[
            'issues' => $issuesBuilder
                        ->join('issue_types', 'issues.issue_type_id', 'issue_types.id')
                        ->join('issue_statuses', 'issues.issue_status_id', 'issue_statuses.id')
                        ->join('users as reporters', 'issues.reported_by', 'reporters.id')
                        ->join('users as assignees', 'issues.assigned_to', 'assignees.id')
                        ->when($this->byType, function($q) {
                            return $q->where('issue_types.name', $this->byType);
                        })
                        ->when($this->byStatus, function($q) {
                            return $q->where('issue_statuses.name', $this->byStatus);
                        })
                        ->when($this->search, function($q) {
                            return $q->where('issues.name', 'like', '%' . trim($this->search) . '%');
                        })
                        ->select('issues.*',
                                'issue_types.name AS type',
                                'issue_statuses.name AS status',
                                'reporters.first_name AS reporter_first_name',
                                'reporters.last_name AS reporter_last_name',
                                'assignees.first_name AS assignee_first_name',
                                'assignees.last_name AS assignee_last_name')
                        ->paginate(10),
            'types' => Type::orderBy('name')->pluck('name'),
            'statuses' => Status::orderBy('name')->pluck('name')->unique()
        ]);
    }
}
