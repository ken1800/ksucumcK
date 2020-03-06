@extends('layouts.app')

@section('content')



<div class="panel panel-default">
	 	<div class="panel-body">


	 	</div>
	 </div>
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                  <table class="table table-hover">
		 		<thead>
					<th>Post Image</th>

					<th>Post Title</th>
                       @if(auth()->user()->isAdmin())
					<th>Edit</th>
					<th>Trash</th>

                    @else
                    <th>content</th>
                        @endif
					<tbody>
                       @if($posts->count()>0)

						 @foreach($posts as $post)
			              <tr>
			              	<td>
			              		<img style="width: 90px;height: 50px;" src="{{ $post->featured}}" alt="{{$post->title}}">
			              	</td>
			              	<td>
			              	      {{ $post->title }}
			              	</td>

                   @if(auth()->user()->isAdmin())
			              	 <td>
			              	 	<a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Edit</a>
			              	 </td>
                               {{--  <a class="btn btn-danger" href="{{ route('post.destroy',$post->id) }}">Trash</a>  --}}
			              	 <td>

                                <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                        {{ $post->trashed() ? 'Delete': 'Trash' }}
                                        </button>
                                 </form>


                    @else

                    <td>
				      {{ $post->body }}
			    	</td>


                    @endif
                         </td>
			              </tr>
						 @endforeach
                          @else

                          <tr>
                          	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">No Post Created yet</th>
                          </tr>

                          @endif

					</tbody>
				</thead>
			</table>
                  </div>
                </div>
              </div>
            </div>



@endsection
