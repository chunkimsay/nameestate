<link rel="stylesheet" href="{{ asset('css/detail.css') }}">

@extends('layouts.master')
@section('content')
    {{-- <div>
        Name: {{ $condo->potaintial }}
    </div> --}}
    <div class="detail">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="{{ asset($condo->bigphoto) }}" /></div>
						  <div class="tab-pane" id="pic-2"><img src="{{ asset($photo[0]->photo) }}" /></div>
						  <div class="tab-pane" id="pic-3"><img src="{{ asset($photo[1]->photo) }}" /></div>
						  <div class="tab-pane" id="pic-4"><img src="{{ asset($photo[2]->photo) }}" /></div>
						  <div class="tab-pane" id="pic-5"><img src="{{ asset($photo[3]->photo) }}" /></div>
						  <div class="tab-pane" id="pic-5"><img src="{{ asset($photo[4]->photo) }}" /></div>
						  <div class="tab-pane" id="pic-5"><img src="{{ asset($photo[5]->photo) }}" /></div>
						
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{ asset($condo->bigphoto) }}" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="{{ asset($photo[0]->photo) }}" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="{{ asset($photo[1]->photo) }}" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="{{ asset($photo[2]->photo) }}" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="{{ asset($photo[3]->photo) }}" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="{{ asset($photo[4]->photo) }}" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="{{ asset($photo[5]->photo) }}" /></a></li>

						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{ $condo->name }}</h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description">{{ $condo->description }}</p>
						<h4 class="price">Price: <span>${{ $condo->price }}</span></h4>
						<p class="vote"><strong>{{ $condo->potaintial }}%</strong> of buyers enjoyed this product! <strong></strong></p>
						<h5 class="sizes">Location:
							<span class="size" data-toggle="tooltip" title="small">Blank Place</span>
							
						</h5>
						{{-- <h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5> --}}
						<div class="action">
							<button class="add-to-cart btn btn-default" type="button">aContact us now</button>
							{{-- <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    
    {{-- Relate Condo --}}

    
@endsection
