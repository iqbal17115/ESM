@extends('layouts.ecommerce')
@section('content')
<main class="main">
			<div class="container">
				<section class="simple-section mt-5">
					<h4 class="heading-bottom-border text-uppercase">Categories</h4>
					<div class="row">
                        @foreach($categories as $category)
						<div class="col-lg-3 col-sm-4 col-6">
							<div class="product-category">
								<a href="{{ route('sub-category', ['id'=>$category->id]) }}">
									<figure>
										<img src="{{ asset('storage/photo/'.$category->image1) }}" id="ProductImage" width="300" height="300"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>{{ $category->name }}</h3>
										<span><mark class="count">{{ count($category->Product) }}</mark> products</span>
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
