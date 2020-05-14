@extends('layouts.admin.dashboard')

@section('content')

 <div class="row">
	<div class="col-xl-12 col-lg-12">
	  <div class="card shadow mb-4">
	  	 <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ajouter une UFR</h6>

                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
		    <!-- Card Body -->
		    <div class="card-body">
	        <form method="post" action="{{route('ufr.store')}}">
	        	@csrf 
			  <div class="form-group">
			    <label for="ufr-name">Libellé</label>
			    <input type="text" class="form-control" id="ufr-name" name="ufr-name" placeholder="UFR de medecine">
			  </div>
			  <div class="form-group">
			    <label for="university-sigle">Université associé</label>
			   		<select name="university-name" class="form-control">
			    		@foreach($university as $option => $value)
			   				<option value="{{$option}}">{{$value}}</option>
			    		@endforeach
			   		</select>
			  </div>
			  <button type="submit" class="btn btn-primary mb-2 btn-block"> <i class="fas fa-save fa-sm fa-fw text-gray-400"></i>Enregistrer votre UFR</button>
			</form>
	    </div>
	  </div>
	</div>
</div>

@endsection