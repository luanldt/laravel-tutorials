@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          @include('inc.messages')
          <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal" type="button" name="button">Add Bookmark</button>
          <hr />
          <h3>My Bookmarks</h3>
          <ul class="list-group">
            @foreach($bookmarks as $bookmark)
            <li class="list-group-item clearfix">
              <a href="{{$bookmark->url}}" target="_blank" style="position:absolute; top: 30%">
                {{$bookmark->name}}
                <span class="badge badge-secondary">{{$bookmark->description}}</span>
              </a>
              <span class="float-right button-group">
                <button type="button" class="btn btn-danger delete-bookmark" name="button" data-id="{{$bookmark->id}}">
                  <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                  </svg> Delete
                </button>
              </span>
            </li>
            @endforeach
          </ul>
        </div>


      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Bookmark</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('bookmarks.store')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="name">Bookmark Name</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="url">Bookmark URL</label>
            <input type="text" class="form-control" name="url">
          </div>
          <div class="form-group">
            <label for="description">Website Description</label>
            <textarea class="form-control" name="description"></textarea>
          </div>
          <input type="submit" value="Submit" name="submit" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
