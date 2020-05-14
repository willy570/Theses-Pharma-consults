@extends('layouts.admin.dashboard')

@section('content')

 <div class="row">
	<div class="col-xl-12 col-lg-12">
	  <div class="card shadow mb-4">
	  	 <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Créer une discipline</h6>

                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
		    <!-- Card Body -->
		    <div class="card-body">
	        <form method="post" action="{{ route('disciplines.store') }}" >
	        	@csrf
			  <div class="form-group">
			    <label for="discipline-title">Titre de votre discipline</label>
			    <input type="text" class="form-control" id="discipline-title" name="discipline-title" placeholder="Mécanique des milieux fluides, Science et génie des matériaux, ">
			  </div>
			  <div class="form-group">
			    <label for="university-sigle">Departement associé</label>
			   		<select name="university-name" class="form-control">
			    		@foreach($dpt as $option => $value)
			   				<option value="{{$option}}">{{$value}}</option>
			    		@endforeach
			   		</select>
			  </div>
			  <button type="submit" class="btn btn-primary mb-2 btn-block"> <i class="fas fa-save fa-sm fa-fw text-gray-400"></i>&nbsp;Enregistrer votre discipline</button>
			</form>
	    </div>
	  </div>
	</div>
</div>

@endsection