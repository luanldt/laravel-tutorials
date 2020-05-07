@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  {{$listing->name}}
                  <span class="float-right">
                    <a href="/listings" class="btn btn-sm btn-outline-dark">Go Back</a>
                  </span>
                </div>

                <div class="card-body">
                  <ul class="list-group">
                    <li class="list-group-item">Address: {{$listing->address}}</li>
                    <li class="list-group-item">
                      Website:
                      <a href="{{$listing->address}}" target="_blank">{{$listing->website}}</a>
                    </li>
                    <li class="list-group-item">
                      Email:
                      <a href="mailto:{{$listing->email}}" target="_blank">{{$listing->email}}</a>
                    </li>
                    <li class="list-group-item">Phone: {{$listing->phone}}</li>
                  </ul>
                  <div class="card mt-2">
                    <div class="card-body">
                      {{$listing->bio}}
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
