<?php namespace App\Http\Controllers;
use App\Project;

/**
 * Class ProjectController
 * @package App\Http
 *
 * @author tmaxham
 * @generated 06.05.2015
 * @version 06.05.2015
 */
class ProjectController extends Controller {

	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function edit($id)
	{
		$project = $this->getProject($id);
		if(is_null($project)) return redirect('project');
		return view('project.one')->with('project', $project);
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		return view('projects')->with('projects', Project::with(['users' => function($query)
		{
			$query->orderBy('order');
		}])->get());
	}

	/**
	 * @param $id
	 * @return \App\Project|null
	 */
	private function getProject($id)
	{
		return Project::with('users')->find($id);
	}

} 