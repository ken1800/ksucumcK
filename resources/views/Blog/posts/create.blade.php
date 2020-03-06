
@extends('layouts.app')

@section('content')

<div class="{{ isset($post) ? 'container-fluid': 'container-fluid' }}">

          <!-- Content Row -->
          <div class="row">
            <!-- First Column -->
            <div class="col-lg-5">
              <div class="card shadow mb-3">
                <div class="card-header py-2">
                  <h6 class="m-0 font-weight-bold text-primary"> {{ isset($post) ? 'Edit post': 'Add post' }}</h6>
                </div>
                <div class="card-body">
                 @include('partials.errors')
    <form action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf

    @if(isset($post))
        @method('PUT')
      @endif

      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id='title' value="{{ isset($post) ? $post->title: '' }}">
      </div>
      <div class="form-group">
            	<label for="category">Select a Category</label>
            	<select name="category_id" id="category_id" class="form-control">
                     @foreach($categories as $category)

                      <option value="{{$category->id}}">{{$category->category}}</option>

                     @endforeach
                  </select>
            </div>


        <div class="form-group">
               <label for="tags">Select Tag</label>
               @foreach($tags as $tag)
                   <div class="checkbox">
                      <label for=""><input name="tags[]" value="{{$tag->id}}" type="checkbox">{{ $tag->tag }}</label>
                   </div>
               @endforeach

            </div>

         <div class="form-group">
                  <label for="featured">Featured Image</label>
                  <input type="file" name="featured"  class="form-control">
            </div>

        <div class="form-group">
            	<label for="body">Content</label>
            	<textarea name="body" id="body" cols="2" rows="2"placeholder="Enter your blog content" class="form-control">{{ isset($post) ? $post->body: '' }}</textarea>
            </div>


      {{--  <div class="form-group">
        <label for="position">position</label>
        <select name="position" id="position" class="form-control">
        </select>
      </div>  --}}

      <div class="form-group">
        <button type="submit" class="btn btn-success">
     {{ isset($post) ? 'Update post': 'Add post' }}
        </button>
      </div>
    </form>
  </div>
</div>


@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script>
    flatpickr('#published_at', {
      enableTime: true,
      enableSeconds: true
    })

    $(document).ready(function() {
      $('.tags-selector').select2();
    })
  </script>
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
