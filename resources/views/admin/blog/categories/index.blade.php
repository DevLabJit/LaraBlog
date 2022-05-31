<x-master>
    <x-slot name="tab_title">

    	LIST CATEGORIES

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

    		list of all categories

    	</x-slot>




    	<x-slot name="icon_listList">
    		
    		<span class="material-icons">reorder</span>

    	</x-slot>


    	<table id="datatable" class="table bg-gradient table-success table-striped">

	    	<caption>
	    		

		    	<x-slot name="counter">
		    	
		    		<span class="font-monospace text-capitalize text-decoration-underline">
		    			
		    		
			    		@if (count($categories) === 1)


			    				we have {{ count($categories) }} {{ Str::singular('category') }}.


			    		@elseif (count($categories) > 1)


			    				we have {{ count($categories) }} {{ Str::pluralStudly('category') }}.


			    		@else


			    				we have no category records !


			    		@endif	

					</span>

				</x-slot>


				<x-slot name="txt_btn">

		    		<a class="fw-bolder outline-none font-monospace text-uppercase btn btn-info btn-sm rounded-0 text-light" href="{{ route('categories.create') }}">
		    			<span class="align-bottom material-icons">add</span>add new category
		    		</a>
				</x-slot>

	    	</caption>

		  <thead class="text-center">

		    <tr>
		    	<th>Category name</th>
		    	<th>Created at</th>
		    	<th>Actions</th>
		    </tr>

		  </thead>

		  <tbody>

		  	@forelse ($categories as $category)
			
			    <tr>
			    	<td class="text-center">

			    		<button type="button" class="p-2 position-relative">

			    			<a class="text-decoration-none text-dark" href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>

						  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
						    


						    {{ $category->posts->count() }} 


						    @if ($category->posts->count() === 1)


			    				{{ Str::singular('post') }}


				    		@elseif ($category->posts->count() > 1)


				    			{{ Str::pluralStudly('post') }}


				    		@else

				    				post


				    		@endif


						    <span class="visually-hidden">unread messages</span>
						  </span>
						</button>

			    	</td>

			    	<td class="text-center">
			    		{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
			    	</td>

			    	<td class="text-center">
					
						<form action="{{route('categories.destroy', $category)}}" method="POST">
		                    @csrf
		                    @method('delete')
				    		
		                    <button type="submit" class="w-bolder outline-none font-monospace text-uppercase btn btn-info btn-sm rounded-0 text-light">
			    				<span class="material-icons">
									delete_forever
								</span>
							</button>

			            </form>
			    	
			    	</td>


			    </tr>
			
			@empty
			
			    <tr class="text-center">
			    	<td colspan=6>No category saved!</td>
			    </tr>
			
			@endforelse

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

