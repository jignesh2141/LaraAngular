<?php

namespace App\Http\Controllers;

use App\Step;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return DB::table('steps')
            ->join('projects', 'steps.project_id', '=', 'projects.id')
            ->select('steps.*', 'projects.name as project_name')
            ->orderBy('id', 'asc')
            ->get();
            //return Step::orderBy()->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $step = new Step;

        $step->name = $request->input('name');
        $step->project_id = $request->input('project_id');
        $step->order = $request->input('order');
        $step->save();

        return 'Step record successfully created with id ' . $step->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Step::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $step = Step::find($id);

        $step->name = $request->input('name');
        $step->project_id = $request->input('project_id');
        $step->order = $request->input('order');
        $step->save();

        return "Sucess updating step #" . $step->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $step = Step::find($id);
        $step->delete();
        
        return "Step record successfully deleted #" . $id;
    }
}
