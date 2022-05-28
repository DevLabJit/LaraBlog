<x-master>
    <x-slot name="tab_title">

    	LIST POSTS

    </x-slot>

    <x-slot name="styles">

    	<!-- Material Icons-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
   		<link rel="stylesheet" type="text/css" href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">



	</x-slot>
  	


    	<x-slot name="heading">

    		list of all posts

    	</x-slot>

    	<x-slot name="app_menu">
    		
    		<x-app_navbar></x-app_navbar>

    	</x-slot>

    	<x-slot name="icon_listList">
    		
    		<span class="material-icons">reorder</span>

    	</x-slot>


    	<table id="PostsDataTable" class="table w-100 display caption-top">

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

			    		{{ $post->category }}

			    	</td>

			    	<td>{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
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

		  </tbody>
		  <tfoot class="table-dark text-center">

		    <tr>
		    	<th>User</th>
		    	<th>Post Title</th>
		    	<th>Status</th>
		    	<th>Category</th>
		    	<th>Created At</th>
		    	<th>Actions</th>
		    </tr>

		  </tfoot>

		</table>










	<x-slot name="scripts">
		


		<!--Bootstrap Bundle with Popper -->
		<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
   		<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>

	    <script>
			$(document).ready(function(){
			    $('#PostsDataTable').DataTable({
			    	responsive: true,
			    	autoFill: true
			    });
			});
	    </script>	

	</x-slot>





</x-master>

