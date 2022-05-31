<x-master>
    <x-slot name="tab_title">

    	LIST POSTS

    </x-slot>

    <x-slot name="styles">

    	<!-- Material Icons-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
		<!-- bootstrap5 dataTables css cdn -->
    	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>

	</x-slot>
  	


    	<x-slot name="heading">

    		list of all posts

    	</x-slot>


    	<x-slot name="icon_listList">
    		
    		<span class="material-icons">reorder</span>

    	</x-slot>





    	<table id="datatable" class="table bg-gradient table-success table-striped">

	    	<caption>
	    		


		    	<x-slot name="counter">
		    	
		    		<span class="font-monospace text-capitalize text-decoration-underline">
		    			
		    		
			    		@if (count($posts) === 1)


			    				we have {{ count($posts) }} {{ Str::singular('post') }}.


			    		@elseif (count($posts) > 1)


			    				we have {{ count($posts) }} {{ Str::pluralStudly('post') }}.


			    		@else


			    				we have no post records !


			    		@endif	

					</span>

				</x-slot>


				<x-slot name="txt_btn">

		    		<a class="fw-bolder outline-none font-monospace text-uppercase btn btn-info btn-sm rounded-0 text-light" href="{{ route('posts.create') }}">
		    			<span class="align-bottom material-icons">add</span>add new post
		    		</a>
				</x-slot>

	    	</caption>

		  <thead class="text-center">

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

    		@if ($posts !== [])

			  	@forelse ($posts as $post)
				
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


				    	<td>

				    		{{ $post->category->name }}

				    	</td>

				    	<td>{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
				    	<td>
				    		<div class="d-flex justify-content-center align-content-between align-items-center gap-1">

				    			<a class="w-bolder outline-none font-monospace text-uppercase btn btn-info btn-sm rounded-0 text-dark btn-light" href="{{ route('posts.edit', $post) }}">
				    				<span class="align-middle material-icons">edit</span>
				    			</a>

				    			<form action="{{route('posts.destroy', $post)}}" method="POST">
				                    @csrf
				                    @method('delete')
						    		
				                    <button type="submit" class="w-bolder outline-none font-monospace text-uppercase btn btn-info btn-sm rounded-0 text-light">
					    				<span class="align-middle material-icons">
											delete_forever
										</span>
									</button>

					           </form>
				    		</div>
				    	</td>
				    </tr>
				
				@empty
				
				    <tr class="text-center">
				    	<td colspan=6>No post saved!</td>
				    </tr>
				
				@endforelse

			@else

				<tr class="text-center">
			    	<td colspan=6>No post saved!</td>
			    </tr>

			@endif

		  </tbody>

		</table>











	<x-slot name="scripts">

		<!--Bootstrap Bundle with Popper -->
	    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	     <!-- bootstrap5 dataTables js cdn -->
	    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

	    <script>
	      $(document).ready(function () {
	        $('#datatable').DataTable({
	        	scrollY: '30vh',
		        scrollCollapse: true,
		        paging: false,
	        });
	      });
	    </script>


	</x-slot>





</x-master>

