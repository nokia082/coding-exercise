<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        // TODO
        return view('index');
    }

       public function add()
    {
        // TODO
        return view('add');
    }


    public function get(){
    	$jobs = DB::table('jobs')->where('published_at', '>', date('Y-m-d', strtotime("-7 days")))
    	->join('companies', 'jobs.company_id', '=', 'companies.id')->get();
        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' => $jobs
        ], 200);
    }

    public function addJob(Request $request){
    	DB::table('jobs')->insert($request->all());
        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' => "Job saved successfully"
        ], 200);
    }
}
