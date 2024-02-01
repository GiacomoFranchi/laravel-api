<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        dd(Project::with('types')->toSql());
        $projects= Project::with('types', 0);

        return response()->json([
            'results'=> $projects,
            'success'=> true
        ]);
    }
}
