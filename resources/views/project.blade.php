@extends('template')
                
 
@section('titre')
<h1><strong>Liste des Projets</strong></h1>

@endsection

@section('contenu')

<div class="container">
@foreach($listeprojet as $projet)
    <div class="row">
        <div class="col-lg-offset-2 col-lg-7"></div>
        <h2>{{$projet->title}}</h2>
        <a href="{{route('detailprojet',[$projet->id])}}"><img src="image/australie.png" alt="photo australie"></a> 
       
        <a href="{{route('detailprojet',[$projet->id])}}"<button id="Contribuer au Projet"
         name="Contribuer au Projet" class="btn btn-info">VOIR LE PROJET</button></a>
    </div>
    @endforeach
   





@endsection