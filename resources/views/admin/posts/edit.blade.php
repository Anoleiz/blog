@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <form method="POST">
        @csrf

        <div class="form-group">
          <label for="titleInput1">Title</label>
          <input name="title" type="text" class="form-control" id="titleInput1" placeholder="Enter title" value="{{ old('title', $post->title) }}">
        </div>

        <div class="form-group">
          <label for="postFormControlTextarea1">Post</label>
          <textarea name="content" class="form-control" id="postFormControlTextarea1" rows="10">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="form-group">
          <label for="stateFormControlSelect2">State</label>
          <select name="state" class="form-control" id="stateFormControlSelect2">
            <option value="-1" @if(old('state', $post->state) === '-1') selected @endif>Draft</option>
            <option value="1" @if(old('state', $post->state) === '1') selected @endif>Published</option>
            <option value="0" @if(old('state', $post->state) === '0') selected @endif>Archive</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('admin-posts') }}" class="btn btn-light">Cancel</a>

      </form>
    </div>
  </div>
</div>
@endsection
