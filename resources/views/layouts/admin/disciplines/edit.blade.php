@extends('layouts.admin.dashboard')

@section('content')

 <div class="row">
	<div class="col-xl-12 col-lg-12">
	  <div class="card shadow mb-4">
	  	 <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Modification</h6>

                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
		    <!-- Card Body -->
		    <div class="card-body">
	        <form method="post" action="{{ route('disciplines.update')}}" >
	        	@csrf
	        	<input type="hidden" name="_id" value="{{ $discipline->id }}">
			  <div class="form-group">
			    <label for="discipline-title">Titre de votre discipline</label>
			    <input type="text" class="form-control" id="lbldiscpline" name="lbldiscpline" value="{{$discipline->libelle}}" >
			  </div>
			  <div class="form-group">
			    <label for="university-sigle">Departement associé</label>
			    <select name="dept" class="form-control">
			   		@foreach($all as $value)
                        <option value="{{ $value->id }}">{{ $value->libelle}}</option>
                	@endforeach
                </select>
			  </div>
			  <button type="submit" class="btn btn-primary mb-2 btn-block"> <i class="fas fa-save fa-sm fa-fw text-gray-400"></i>&nbsp;Modifier</button>
			</form>
	    </div>
	  </div>
	</div>
</div>

@endsection