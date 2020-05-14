@extends('layouts.admin.dashboard')

@section('content')

 <div class="row">
	<div class="col-xl-12 col-lg-12">
	  <div class="card shadow mb-4">
	  	 <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ajouter une thèse</h6>

                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
		    <!-- Card Body -->
		            @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif
		    <div class="card-body">
	        <form method="POST" action="{{ route('theses.store')}}" enctype="multipart/form-data">
	        	@csrf
			  <div class="form-group">
			    <label for="these-title">Titre de la thèse</label>
			    <input type="text" class="form-control" id="these-title" name="these-title" placeholder="Titre de la thèse">
			  </div>
			  <div class="form-group">
			    <label for="these-author">Auteur</label>
			   	<input type="text" class="form-control" id="these-author" name="these-author" placeholder="John Doe">
			  </div>

			  <div class="form-group">
			    <label for="these-summary">Resumé de la thèse</label>
			    <textarea class="form-control" id="these-summary" name="these-summary" rows="3"></textarea>
			  </div> 

			  <div class="form-group">
			    <label for="these-summary">Les mots clé de la thèse</label>
			    <textarea class="form-control" id="these-keywords" name="these-keywords" rows="3">{{__('Les mots clés figurants dans le document')}}</textarea>
			  </div> 

			  <div class="form-group">
			    <label for="these-file">Votre thèse au format PDF</label>
			    <input type="file" class="form-control" id="these-file" name="these-file" placeholder="John Doe">
			  </div>

			  <div class="form-group">
			    <label for="these-valided-date">Année de soutenance</label>
			   	<input type="text" class="form-control" id="these-valided-date" name="these-valided-date" placeholder="2000, 2010, 2015, 2016, 2018, etc...">
			  </div> 

			  <div class="form-group">
			    <label for="these-discipline">Discipline</label>
			   		<select name="these-discipline" class="form-control">
			    @foreach($disciplines as $option => $value)
			   			<option value="{{$option}}">{{$value}}</option>
			    @endforeach
			   		</select>
			  </div>

			  <div class="form-group">
			    <label for="these-departement">Departement</label>
			   		<select name="these-departement" class="form-control">
			    @foreach($dpts as $option => $value)
			   			<option value="{{$option}}">{{$value}}</option>
			    @endforeach
			   		</select>
			  </div>

			 <div class="form-group">
			    <label for="these-ufrs">UFR</label>
			   		<select name="these-ufrs" class="form-control">
			    @foreach($ufrs as $option => $value)
			   			<option value="{{$option}}">{{$value}}</option>
			    @endforeach
			   		</select>
			  </div>
			  <div class="form-group">
			    <label for="university-name">Université</label>
			   		<select name="university-name" class="form-control">
			    @foreach($universties as $option => $value)
			   			<option value="{{$option}}">{{$value}}</option>
			    @endforeach
			   		</select>
			  </div>
			  <button type="submit" class="btn btn-primary mb-2 btn-block"> <i class="fas fa-save fa-sm fa-fw text-gray-400"></i>&nbsp;Enregistrer votre thèse</button>
			</form>
	    </div>
	  </div>
	</div>
</div>

@endsection