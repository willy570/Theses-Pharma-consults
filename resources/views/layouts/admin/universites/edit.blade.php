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
	        <form method="post" action="{{route('university.update')}}" enctype="multipart/form-data">
	        	@csrf
			  <div class="form-group">
			    <label for="university-name">Nom de votre Université</label>
			    <input type="text" class="form-control" id="university-name" name="university-name" value="{{$universite->denomination}}" required="required">
			    <input type="text" class="d-none form-control" id="university_id" name="university_id" value="{{$universite->id}}" required="required">
			  </div>
			  <div class="form-group">
			    <label for="university-sigle">Sigle de votre Université</label>
			   	<input type="text" class="form-control" id="university-sigle" name="university-sigle" value="{{$universite->sigle}}" required="required">
			    
			  </div>
			  <div class="form-group">
			    <label for="university-country-location">Le pays dans lequel est situé votre Université</label>
			   	<input type="text" class="form-control" id="university-country-location" name="university-country-location" value="{{$universite->pays}}" required="required">
			    
			  </div>
			  <div class="form-group">
			    <label for="university-city-location">La ville dans laquelle est située votre Université</label>
			   	<input type="text" class="form-control" id="university-city-location" name="university-city-location" value="{{$universite->ville}}" required="required">
			    
			  </div>
			  <div class="form-group">
			    <label for="university-email">L'email de votre Université</label>
			   	<input type="email" class="form-control" id="university-email" name="university-email" value="{{$universite->email}}" required="required">
			    
			  </div> 
			  <div class="form-group">
			    <label for="university-phone">Le numéro de téléphone de votre Université</label>
			   	<input type="phone" class="form-control" id="university-phone" name="university-phone" value="{{$universite->phone}}" required="required">
			    
			  </div>
			  <div class="form-group">
			    <label for="logo">Le logo de votre Université</label>
			   	<input type="file" id="files" class="form-control" id="logo" name="logo" required="required">
			   	<img src="{{ asset('public/uploads/' . $universite->logo) }}" width="30%" class="mt-3 img-thumbnail" />
			  </div>
			  
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Description de votre université</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" name="exampleFormControlTextarea1" rows="3" required="required">{{$universite->description}}</textarea>
			  </div>
			  <button type="submit" class="btn btn-primary mb-2 btn-block"> <i class="fas fa-save fa-sm fa-fw text-gray-400"></i>Modifier</button>
			</form>
	    </div>
	  </div>
	</div>
</div>

@endsection