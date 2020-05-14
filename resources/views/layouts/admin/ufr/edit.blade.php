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
	        <form method="post" action="{{route('ufr.update')}}">
	        	@csrf
	        	<input type="hidden" name="_id" value="{{ $ufr->id }}">
			  <div class="form-group">
			    <label for="ufr-name">Libellé</label>
			    <input type="text" class="form-control" id="ufr_name" name="ufr_name" value="{{$ufr->libelle}}">
			  </div>
			  <div class="form-group">
			    <label for="university-sigle">Université associé</label>
			   		<select name="university_name" class="form-control">
			    		@foreach($university as $option => $value)
			   				<option value="{{$option}}">{{$value}}</option>
			    		@endforeach
			   		</select>
			  </div>
			  <button type="submit" class="btn btn-primary mb-2 btn-block"> <i class="fas fa-save fa-sm fa-fw text-gray-400"></i>Modifier</button>
			</form>
	    </div>
	  </div>
	</div>
</div>

@endsection