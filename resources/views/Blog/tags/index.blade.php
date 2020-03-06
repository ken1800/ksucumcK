@extends('layouts.app')

@section('content')

<div class="container-fluid">

          <!-- Content Row -->
          <div class="row">
            <!-- First Column -->
            <div class="col-lg-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">{{ isset($tag)  ? 'Edit tag' : 'Create tag' }}</h6>
                </div>
                <div class="card-body">
                @include('partials.errors')
    <form action="{{ isset($tag) ? route('tag.update', $tag->id) : route('tag.store') }}" method="POST" enctype="multipart/form-data">
     @csrf
      @if(isset($tag))
        @method('PUT')
      @endif
      <div class="form-group">
        <label for="title">tag</label>
        <input type="text" class="form-control" name="tag" id='tag' value="{{ isset($tag) ? $tag->tag : '' }}">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">
                 {{ isset($tag) ? 'Update': 'Add' }}
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

