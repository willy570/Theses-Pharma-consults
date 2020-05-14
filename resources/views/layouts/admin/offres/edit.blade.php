@extends('layouts.admin.dashboard')

@section('content')
 <div class="row">
	<div class="col-xl-12 col-lg-12">
	  <div class="card shadow mb-4">
	  	 <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Modification</h6>

	    </div>
		    <!-- Card Body -->
		    <div class="card-body">
	        <form class="form-horizontal" action="{{route('offres.update')}}" id="frmOffre" method="post">
	        <input type="hidden" name="_token" value="{{ csrf_token() }}">
	        <input type="hidden" name="_id" value="{{ $offre->id }}">
			  <div class="form-group">
			    <label for="lblplan">Libellé du forfait</label>
			    <input type="text" class="form-control" id="lblplan" name="lblplan" value="{{$offre->libelle}}">
			  </div>
			  <div class="form-group">
			    <label for="planmount">Coût du forfait</label>
			   	<input type="text" class="form-control" id="planmount" name="planmount" value="{{$offre->cout}}">
			  </div>
			  <div class="form-group">
		    	<label class="btn btn-info">
				    <input type="radio" name="temps" id="option1" autocomplete="off" value="1"> 24H
				  </label>
				  <label class="btn btn-warning">
				    <input type="radio" name="temps" id="option2" autocomplete="off" value="7"> 1 Semaine
				  </label>
				  <label class="btn btn-danger">
				    <input type="radio" name="temps" id="option3" autocomplete="off" value="30"> 1 Mois
				  </label>
			  </div>
			  <button type="submit" id="saveBiblio" class="btn btn-primary btn-block">Modifier</button>
			</form>
	    </div>
	  </div>
	</div>
</div>
@endsection