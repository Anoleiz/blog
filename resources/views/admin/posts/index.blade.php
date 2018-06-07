@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <a href="{{ route('admin-posts-add') }}" class="btn btn-primary">new post</a>
      <table class="table mt-2">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">State</th>
            <th scope="col">Title</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
            <tr>
              <th scope="row">{{ $post->id }}</th>
              <td>{{ $post->state }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->created_at }}</td>
              <td>{{ $post->updated_at }}</td>
              <td>
                <a href="{{ route('admin-posts-edit', ['post' => $post->id]) }}" class="btn btn-primary">edit</a>
                <a href="{{ route('admin-posts-del', ['id' => $post->id]) }}" class="btn btn-danger">del</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      {{ $posts->links() }}
    </div>
  </div>
</div>
@endsection
