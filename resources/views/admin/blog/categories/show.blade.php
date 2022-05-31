<x-master>
    <x-slot name="tab_title">

    	CATEGORY POSTS

    </x-slot>

    <x-slot name="styles">

    	<!-- Material Icons-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	</x-slot>


    	<x-slot name="heading">


    		list of all posts created


    	</x-slot>




			<x-slot name="counter">
		    	
		    		<span class="font-monospace text-capitalize text-decoration-underline">
		    			
		    		
			    		@if (count($posts) === 1)


			    				we have {{ count($posts) }} {{ Str::singular('post') }} for this category.


			    		@elseif (count($posts) > 1)


			    				we have {{ count($posts) }} {{ Str::pluralStudly('post') }} for this category.


			    		@else


			    				we have no post created for this category!


			    		@endif	

					</span>

			</x-slot>

    	<div class="card text-dark bg-light mb-3">
    		  
 			 <div class="card-header text-uppercase fw-bolder">All Posts Created for this category</div>
	    
 			 	    <div class="card-body">

 			 	    	<div class="row row-cols-1 row-cols-md-3 g-4">

						  	@forelse ($posts as $post)
							
						  		 <div class="col">
								    <div class="card h-100">
								      <img src="
									      @if (File::exists($post->image))
									      {{ asset('uploads/posts/' . $post->image) }}
									      @else
									      {{ $post->image }}
									      @endif
								      " class="card-img-top" alt="">

								      <div class="card-body">
								        <h5 class="card-title">{{ $post->title }}</h5>
								        <p class="card-text">{!! $post->content !!}.</p>
								      </div>
									    <div class="card-footer">
								        	<small class="text-muted">Created {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
								      	</div>
								    </div>
								  </div>
							
							@empty
							
								<p class="text-center">No post created for this category !</p>
							
							@endforelse

						</div>
					
					</div>

			</div>
    	
    	</div>

    	<x-slot name="txt_btn">

            <a class="fw-bolder outline-none font-monospace text-uppercase btn btn-info btn-sm rounded-0 text-light" href="{{ route('posts.index') }}">
                <span class="p-1 align-middle material-icons">list_alt</span>view list
            </a>
        </x-slot>




	<x-slot name="scripts">
		<!--Bootstrap Bundle with Popper -->
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	</x-slot>

</x-master>

