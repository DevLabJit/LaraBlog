<x-master>
    <x-slot name="tab_title">

    	LIST CATEGORIES

    </x-slot>

    <x-slot name="styles">

    	<!-- Material Icons-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	</x-slot>


    	

    	<x-slot name="heading">

    		list of all categories

    	</x-slot>


    	<x-slot name="app_menu">
    		
    		<x-app_navbar></x-app_navbar>

    	</x-slot>

    	<x-slot name="icon_listList">
    		
    		<span class="material-icons">reorder</span>

    	</x-slot>


    	<table class="table table-dark table-hover align-middle table-lg caption-top">

	    	<caption>
	    		

		    	<x-slot name="counter">
		    	
		    		<span class="font-monospace text-capitalize text-decoration-underline">
		    			
		    		
			    		{{-- @if (count($posts) === 1)


			    				we have {{ count($posts) }} {{ Str::singular('post') }}.


			    		@elseif (count($posts) > 1)


			    				we have {{ count($posts) }} {{ Str::pluralStudly('post') }}.


			    		@else


			    				we have no post records !


			    		@endif --}}	

					</span>

				</x-slot>


				<x-slot name="txt_btn">

		    		<a class="fw-bolder outline-none font-monospace text-uppercase btn btn-info btn-sm rounded-0 text-light" href="{{ route('categories.create') }}">
		    			<span class="align-bottom material-icons">add</span>add new category
		    		</a>
				</x-slot>

	    	</caption>

		  <thead class="table-dark text-center">

		    <tr>
		    	<th>User</th>
		    	<th>Post Title</th>
		    	<th>Status</th>
		    	<th>Category</th>
		    	<th>Created At</th>
		    	<th>Actions</th>
		    </tr>

		  </thead>

		  <tbody>

		  	{{-- @forelse ($posts as $post)
			
			    <tr>
			    	<td class="text-left">{{ $post->name }}</td>
			    	<td class="text-left">{{ $post->title }}</td>

			    	@if ($post->status === 0)
			    		
			    		<td>

			    			<span class="badge rounded-pill bg-warning text-dark">In review</span>

			    		</td>
				        
				    @else

			    	<td>

			    		<span class="badge rounded-pill bg-info text-dark">published</span>

			    	</td>

			    	@endif

			    	<td>{{ $post->category }}</td>
			    	<td>{{ $post->created_at }}</td>
			    	<td>
			    		<div class="flex justify-content-center align-content-between">
			    			<a class="text-decoration-none text-light" href="{{ route('posts.edit', $post->slug) }}">
			    				<span class="material-icons">edit</span>
			    			</a>
			    			<a class="text-decoration-none text-light" href="{{ route('posts.destroy', $post->slug) }}">
			    				<span class="material-icons">
									delete_forever
								</span>
			    			</a>
			    		</div>
			    	</td>
			    </tr>
			
			@empty
			
			    <tr class="text-center">
			    	<td colspan=6>No post saved!</td>
			    </tr>
			
			@endforelse
 --}}
		  </tbody>
		</table>















	<x-slot name="scripts">
		<!--Bootstrap Bundle with Popper -->
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	</x-slot>
</x-master>

