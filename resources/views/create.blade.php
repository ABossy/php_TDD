@extends('template')

@section('titre')
<h1><strong>Création d'un Project</strong></h1>

@endsection

@section('form')
 <form action='{{route('create')}}' method="POST">
    {{csrf_field()}}
   <div class="container">
        <div class="row">
            <div class="span3">
                <label>Auteur : {{ Auth::user()->name }} </label><br>
                <hr>
                <label>Titre</label> 
                <input class="span3" name="title" type="text">
                <label>image</label> 
                <input class="span3" type="url"  name="image">
                <label>date de Publication</label>
                <input class="span3" name="date" type="date"><hr>
                <label>Detail du projet</label><br> 
                <textarea class="input-xlarge span5" id="message" name="message"
                rows="10" cols="80"></textarea>
            </div>    
        </div>    
    </div>    
<!-- Button Ajouter -->
    <div class="form-group">
	  <label class="col-md-4 control-label" for=""></label>
	  <div class="col-md-4">
	    <button id="" name="Ajouter" class="btn btn-success" type="submit">Ajouter</button>
	  </div>
	</div>
</form>
@endsection
