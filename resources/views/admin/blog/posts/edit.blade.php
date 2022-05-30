<x-master>
    <x-slot name="tab_title">

    	EDIT POST

    </x-slot>

    <x-slot name="styles">

    	<!-- Material Icons-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">


	</x-slot>
  	


    	<x-slot name="heading">

    		POST UPDATE

    	</x-slot>

    	<x-slot name="app_menu">
    		
    		<x-app_navbar></x-app_navbar>

    	</x-slot>


        <x-slot name="counter">
             <a class="fw-bolder outline-none font-monospace text-uppercase btn btn-info btn-sm rounded-0 text-light" href="{{ route('categories.index') }}">
                <span class="p-1 align-middle material-icons">sort</span>view posts by category
            </a>
        </x-slot>


        <div class="card text-dark bg-light mb-3">
          
          <div class="card-header text-uppercase fw-bolder">edit post</div>
            
            <div class="card-body">



              <form method="POST" class="row g-3 mb-2" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">

              @csrf
              @method('PUT')

                <div class="col-md-6">

                  <label for="title" class="form-label text-uppercase">post title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Post title" value="{{ $post->title }}">
                @error('title')
                  <div class="invalid-feedback">
                        {{ $message }}
                  </div>
                @enderror
                </div>

                
                <div class="col-md-6">

                  <label for="category" class="form-label text-uppercase">category</label>
                  <select id="category" class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                    
                    <option value="option_select" disabled selected>Choose your category</option>
                    
                    @foreach ($categories as $category)
                        {{-- expr --}}
                        <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>

                    @endforeach

                                 
                  </select>

                  @error('category_id')
                    <div class="invalid-feedback">
                          {{ $message }}
                    </div>
                  @enderror

                </div>


                <div class="col-md-6">

                  <label for="image" class="form-label text-uppercase">post image</label>
                  <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                  
                  @error('image')
                    <div class="invalid-feedback">
                          {{ $message }}
                    </div>
                  @enderror

                </div>
                
                <div class="col-md-6">

                  <img class="vh-100 wh-100 img-fluid img-thumbnail rounded mx-auto d-block" src="{{ asset($post->image) }}" alt="">

                </div> 



                <div class="col-md-12">

                  <label for="htmeditor" class="form-label text-uppercase">content</label>
                  <textarea id="htmeditor" name="content" class="form-control @error('content') is-invalid @enderror">
                    {{ $post->content }}
                  </textarea>
                  
                  @error('content')
                    <div class="invalid-feedback">
                          {{ $message }}
                    </div>
                  @enderror


                </div>

    



                <div class="col-12">
                    <button type="submit" class="fw-bolder outline-none font-monospace text-uppercase btn btn-info btn-sm rounded-0 text-light" >
                      <span class="p-1 align-middle material-icons">edit</span>edit post
                    </button>
                </div>

              </form>

            </div>

        </div>



        <x-slot name="txt_btn">

            <a class="fw-bolder outline-none font-monospace text-uppercase btn btn-info btn-sm rounded-0 text-light" href="{{ route('posts.index') }}">
                <span class="p-1 align-middle material-icons">list_alt</span>view list
            </a>
        </x-slot>

    	




	<x-slot name="scripts">
		
		<script src="https://htmeditor.com/js/htmeditor.min.js" htmeditor_textarea="htmeditor"></script>

	</x-slot>





</x-master>

