<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
       $projects=Project::all();

       return response()->json([
        'data'=>$projects,
       ]);
    }

    // public function show(String $id)
    // {
    //    $project=Project::all();

    //    return response()->json([
    //     'data'=>$project,
    //    ]);
    // }
}
