<div class="card text-dark bg-light mb-3">
  
  <div class="card-header text-uppercase fw-bolder">add posts</div>
    
    <div class="card-body">


      <form method="POST" class="row g-3 mb-2" action="{{ route('posts.store') }}" enctype="multipart/form-data">

      @csrf


        <div class="col-md-6">

          <label for="title" class="form-label text-uppercase">post title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Post title" value="{{ old('title') }}" >
        @error('title')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
        @enderror
        </div>


        <div class="col-md-3">

          <label for="image" class="form-label text-uppercase">post image</label>
          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}">
          
          @error('image')
            <div class="invalid-feedback">
                  {{ $message }}
            </div>
          @enderror

        </div> 

        
        <div class="col-md-3">

          <label for="category" class="form-label text-uppercase">category</label>
          <select id="category" class="form-select @error('category_id') is-invalid @enderror" name="category_id">
            
            <option value="option_select" disabled selected>Choose your category</option>
            
              {{ $categories_data_keys }}

              {{--   <option disabled selected>No data for category here!</option> --}}
              
          </select>

          @error('category_id')
            <div class="invalid-feedback">
                  {{ $message }}
            </div>
          @enderror

        </div>
  

        <div class="col-12">

          <label for="htmeditor" class="form-label text-uppercase">content</label>
          <textarea id="htmeditor" name="content" class="form-control @error('content') is-invalid @enderror">
            {{ old('content') }}
          </textarea>
          
          @error('content')
            <div class="invalid-feedback">
                  {{ $message }}
            </div>
          @enderror


        </div>



        <div class="col-12">
            <button type="submit" class="fw-bolder outline-none font-monospace text-uppercase btn btn-info btn-sm rounded-0 text-light" >
              {{ $btn_action_add_post }}
            </button>
        </div>

      </form>

    </div>

  </div>

</div>