@extends('layouts.app')

@section('content')

<div class="container-fluid">

          <!-- Content Row -->
          <div class="row">
            <!-- First Column -->
            <div class="col-lg-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">{{ isset($category)  ? 'Edit category' : 'Create category' }}</h6>
                </div>
                <div class="card-body">
                @include('partials.errors')
    <form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" method="POST" enctype="multipart/form-data">
     @csrf
      @if(isset($category))
        @method('PUT')
      @endif
      <div class="form-group">
        <label for="title">category</label>
        <input type="text" class="form-control" name="category" id='category' value="{{ isset($category) ? $category->category : '' }}">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">
                 {{ isset($category) ? 'Update': 'Add' }}
        </button>
      </div>
    </form>
  </div>
</div>


                </div>
              </div>
              </div>
              </div>
              </div>
@endsection

