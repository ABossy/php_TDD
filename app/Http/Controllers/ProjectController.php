<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\User;

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

    public function edit($id)
    {
        $project = Project::find($id);
        $user = Auth::user();
        if ($project->user_id != $user->id){
            abort(403, "vous n'etes pas l'auteur du projet");
        }
        return view('editproject');
    }

   
}