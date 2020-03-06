@extends('layouts.app')
@section('content')



 <!-- Begin Page Content -->
        <div class="container-fluid">


          <!-- Content Row -->
          <div class="col">

            <!-- Border Left Utilities -->
            <div class="col-lg-3">

              <div class="card mb-4 py-3 border-left-primary">
                <div class="card-body">
                   <a href="{{ route('post.list') }}"><h4>Posts: {{ $posts_count }}</h4></<a>
                    <a href="{{ route('post.create') }}">Create</a>
                </div>
              </div>
 @if(auth()->user()->isAdmin())
              <div class="card mb-4 py-3 border-left-success">
                <div class="card-body">
                <a href="{{ route('tag.list') }}"> <h4>Tags: {{ $tags_count }}</h4></a>
                 <a href="{{ route('tag.index') }}">Create</a>
                </div>
              </div>

              <div class="card mb-4 py-3 border-left-info">
                <div class="card-body">
                <a href="{{ route('category.list') }}"><h4>Categories: {{ $categories_count }} </h4></a>
                <a href="{{ route('category.index') }}">Create</a>
                </div>
              </div>

              <div class="card mb-4 py-3 border-left-success">
                <div class="card-body">
               <a href="{{ route('user.profile') }}">My profile</a>
                </div>
              </div>

            <div class="card mb-4 py-3 border-left-success">
                <div class="card-body">
                 <a href="{{ route('user.create') }}">Create a new user</a>
                </div>
              </div>




              <div class="card mb-4 py-3 border-left-warning">
              <div class="row no-gutters align-items-center">
                <div class="card-body">
                 <a href="{{ route('settings') }}">Blog settings</a>
                </div>
              </div>









@endif
            </div>
          </div>

        </div>


@endsection
