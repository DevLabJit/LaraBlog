<div class="card text-dark bg-light mb-3">
  
  <div class="card-header text-uppercase fw-bolder">add categories</div>
    
    <div class="card-body">


      <form method="POST" class="row g-3 mb-2" action="{{ route('categories.store') }}">

      @csrf


        <div class="col-md-12">

          <label for="name" class="form-label text-uppercase">category name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Category name" value="{{ old('name') }}" >

          @error('name')
            <div class="invalid-feedback">
                  {{ $message }}
            </div>
          @enderror

        </div>


        <div class="col-12">
            
            <button type="submit" class="fw-bolder outline-none font-monospace text-uppercase btn btn-info btn-sm rounded-0 text-light" >
              {{ $btn_action_add_category ?? 'no button created' }}
            </button>

        </div>

      </form>

    </div>

  </div>

</div>