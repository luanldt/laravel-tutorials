@extends('layouts.app')

@section('content')
  @if(count($albums) > 0)
    <?php
      $colcount = count($albums);
      $i = 1;
    ?>

    <div id="albums">
      <div class="row text-center">
        @foreach($albums as $album)
          @if($i == $colcount) <!-- last -->
            <div class="medium-4 columns end">
          @else
            <div class="medium-4 columns">
          @endif
          <a href="/albums/{{$album->id}}">
            <img class="thumbnail" src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
          </a>
          <br/>
          <h4>{{$album->name}}</h4>

          @if($i % 3 == 0)
            </div></div><div class="row text-center">
          @else
            </div>
          @endif
          <?php
            $i++;
          ?>
        @endforeach
      </div>
    </div>

  @else
    <p>No Albums To Display</p>
  @endif
@endsection
