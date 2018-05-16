@extends('template')
                
 
@section('titre')
<h1>Liste des Projets</h1>

@endsection

@section('contenu')
<div class="container">
    <div class="row">
        <div class="col-lg-offset-2 col-lg-7"></div>
        <h2>Projet 1</h2>
        <a href="http://localhost:8000/voyage"><img src="image/australie.png" alt="photo australie"></a> 
        <p>Voyage en Australie</p>
    </div>

    <div class="row">
        <div class="col-lg-offset-2 col-lg-7"></div>
        <h2>Projet 2</h2>
        <a href="http://localhost:8000/humanitaire"><img src="image/ecole.png" alt="Photo Ecole"/>
        <p>construction d'une école</p>
    </div>
    <div class="row"></div>
</div>
@endsection