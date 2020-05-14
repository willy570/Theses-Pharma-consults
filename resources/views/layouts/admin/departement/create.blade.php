@extends('layouts.admin.dashboard')

@section('content')

 <div class="row">
	<div class="col-xl-12 col-lg-12">
	  <div class="card shadow mb-4">
	  	 <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ajouter un Departement</h6>

                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
		    <!-- Card Body -->
		    <div class="card-body">
	        <form method="post" action="{{ route('departement.store') }}" enctype="multipart/form-data">
	        	@csrf
			  <div class="form-group">
			    <label for="departement-name">Libellé</label>
			    <input type="text" class="form-control" id="departement-name" name="departement-name" placeholder="Cardiologie">
			    @if ($errors->has('departement-name'))
                        <b><span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('departement-name') }}</span></b>
                      @endif
			  </div>
			  <div class="form-group">
			    <label for="university-name">Université associé</label>
			   		<select name="university-name" class="form-control">
			    @foreach($university as $option => $value)
			   			<option value="{{$option}}">{{$value}}</option>
			    @endforeach
			   		</select>
			  </div>
			  <div class="form-group">
			    <label for="university-ufr">Ufr associé</label>
			   		<select name="university-ufr" class="form-control">
			   			@foreach($ufrs as $opt => $val)
			   				<option value="{{$opt}}">{{$val}}</option>
			    		@endforeach
			   		</select>
			  </div>
			  <div class="form-group">
			    <label for="departement-description">Description de votre departement</label>
			    <textarea class="form-control" id="departement-description" name="departement-description" rows="3"></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary mb-2 btn-block"> <i class="fas fa-save fa-sm fa-fw text-gray-400"></i>&nbsp;Enregistrer votre Departement</button>
			</form>
	    </div>
	  </div>
	</div>
</div>

@endsection