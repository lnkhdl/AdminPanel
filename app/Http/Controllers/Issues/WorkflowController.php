<?php

namespace App\Http\Controllers\Issues;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkflowController extends Controller
{
    public function index()
    {
        $types = \App\Models\Issues\Type::with('statuses')->get();

        return view('issues.workflow', compact('types'));
    }
}
