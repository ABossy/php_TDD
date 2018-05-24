@extends('template')

@section('titre')
<h1><strong>Edit Project</strong></h1>

@endsection

@section('form')
<div class="container">
	<form class="well span8">
        <div class="row">
            <div class="span3">
                <label>Name</label> 
                <input class="span3" placeholder="Your Name" type="text"><br>
                <label>Email</label> <input class="span3" placeholder=
                "Your email address" type="text"><br>
                <label>Project Title</label>
                <input class="span3" placeholder="Your Project" type="text">
            </div>
    
            <div class="span5">
                <label>Message</label><br> 
                <textarea class="input-xlarge span5" id="message" name="message"
                rows="10" cols="70">
    </textarea>
            </div><button class="btn btn-primary pull-center" type=
            "submit">Send</button>
        </div>
    </form>
</div>
@endsection