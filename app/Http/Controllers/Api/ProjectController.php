<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        
        $projects= Project::with('type')->paginate(10);

        return response()->json([
            'results'=> $projects,
            'success'=> true
        ]);
    }

    public function show(string $slug){
        $project= Project::with('type', 'tecnologies')->where('slug', $slug)->first();

        if($project){
            return response()->json([
                'results'=> $project,
                'success'=> true
            ]);
        }
        else{
            return response()->json([
                'message'=> 'progetto non trovato',
                'success'=> false
            ]);
        }
    }

}