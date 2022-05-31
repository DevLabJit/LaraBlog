<ul class="m-0 d-flex text-uppercase list-unstyled align-content-center justify-content-between align-items-center">
	

	<li class="nav-item">

		<a class="nav-link link-light" href="{{ route('categories.index') }}">
			{{ __('categories') }}
		</a>
	
	</li>

	<li class="nav-item">

		<a class="nav-link link-light" href="{{ route('categories.create') }}">
			{{ __('add category') }}
		</a>
	
	</li>

	<li class="nav-item">

		<a class="nav-link link-light" href="{{ route('posts.create') }}">
			{{ __('add post') }}
		</a>
	
	</li>


	<li class="nav-item">

		<a class="nav-link link-light" href="{{ route('posts.index') }}">
			{{ __('posts') }}
		</a>
	
	</li>



</ul>
