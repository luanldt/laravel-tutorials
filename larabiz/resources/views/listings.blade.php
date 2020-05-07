@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lastest Business Listings</div>

                <div class="card-body">
                    @if(count($listings))
                      <ul class="list-group">
                      @foreach($listings as $listing)
                        <li class="list-group-item">
                          <a href="/listings/{{$listing->id}}">{{$listing->name}}</a>
                        </li>
                      @endforeach
                      </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
