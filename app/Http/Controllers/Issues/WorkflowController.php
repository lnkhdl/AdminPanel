<?php

namespace App\Http\Controllers\Issues;

use App\Http\Controllers\Controller;

class WorkflowController extends Controller
{
    public function index()
    {
        // Data is provided via Livewire component
        return view('issues.workflow');
    }
}
