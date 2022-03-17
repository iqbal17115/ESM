@extends('layouts.ecommerce')
@section('content')
<main class="main">
			<div class="container">
				<section class="simple-section mt-5">
					<h4 class="heading-bottom-border text-uppercase">Categories</h4>
					<div class="row">
                        @foreach($category->SubCategory as $subCategory)
						<div class="col-lg-3 col-sm-4 col-6">
							<div class="product-category">
								<a href="{{ route('shop', ['id' => $subCategory->id]) }}">
									<figure>
										<img src="{{ asset('storage/photo/'.$subCategory->image) }}" id="ProductImage" width="300" height="300"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>{{ $subCategory->name }}</h3>
										<span><mark class="count">{{ count($subCategory->Product) }}</mark> products</span>
									</div>
								</a>
							</div>
						</div>
                        @endforeach
					</div>
				</section>
			</div><!-- End .container -->

		</main><!-- End .main -->
@endsection
