@extends('app')

@section('content')

    <div class="row">
        <div class="col-12">
            <h4>Нашли сейчас:</h4>
            <div class="row">
                @forelse ($videos as $video)
                    <div class="col-3">
                        <a href="/watch?v={{$video->videoId}}">
                            <img src="https://i.ytimg.com/vi/{{$video->videoId}}/mqdefault.jpg" class="img-fluid"/>
                        </a>
                        <a href="/watch?v={{$video->videoId}}">
                            {{$video->title}}
                        </a>
                    </div>
                @empty
                    <p>Нет результатов</p>
                @endforelse
            </div>
            <hr/>
            <h4>Найдено ранее:</h4>
            <div class="row">

                @forelse ($local_videos as $video)
                    <div class="col-3">
                        <a href="/watch?v={{$video->videoId}}">
                            <img src="https://i.ytimg.com/vi/{{$video->videoId}}/mqdefault.jpg" class="img-fluid"/>
                        </a>
                        <a href="/watch?v={{$video->videoId}}">
                            {{$video->title}}
                        </a>
                    </div>
                @empty
                    <p>Нет результатов</p>
                @endforelse

            </div>

        </div>
    </div>


@endsection
