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

     // fonction qui liste tous les projets
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

    // fonction d'authentification
    public function edit($id)
    {
        $project = Project::find($id);
        $user = Auth::user();
        if ($project->user_id != $user->id){
            abort(403, "vous n'etes pas l'auteur du projet");
        }
        return view('editproject',['project'=>$project]);
    }

    // Modifier un projet
    public function modifproject($id)
    {
        $edit = Project::find($id);
        $edit->title = request('title');
        $edit->image = request('website');
        $edit->updated_at = request('date');
        $edit->content= request('message');
        $edit->save();
        return redirect('/project/show/'.$id);
        
    } 

    // Nouvelle création Projet
    public function store(Request $request)
    {
        $user = Auth::User();
        $donnees = new Project;
        $donnees->auth = request('auteur');
		$donnees->title = request('title');
		$donnees->image = request('website');
        $donnees->created_at = request('date');
        $donnees->content= request('message');
        $donnees->user_id =($user->id);
		$donnees->save();//sauvegarde en base de donnees.
		return redirect('project');
	} 
    
}