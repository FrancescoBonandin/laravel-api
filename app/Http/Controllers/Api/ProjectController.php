<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
       $projects=Project::with('type','technologies')->paginate(4);

       return response()->json([
        'data'=>$projects,
       ]);
    }

    public function show(string $id)
    {
       $project=Project::where('id', $id)->with('type','technologies')->firstOrFail();

       return response()->json([
        'data'=>$project,
       ]);
    }
}
