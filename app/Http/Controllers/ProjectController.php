<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $listeprojet = Project::all();
        return view('project',compact('listeprojet'));
    }

    // fonction show d'un projet
    public function show($id)
    {
        $unProjet = Project::find($id);
        return view('detailprojet',compact('unProjet'));

    }

   
}