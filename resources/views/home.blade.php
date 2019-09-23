@extends('app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Последние запросы</h4>
            <ul>
                @forelse ($keys as $key)
                    <li>
                        <a href="/search?q={{$key->query}}">
                            {{ $key->query }}
                        </a>
                    </li>
                @empty
                    <li>Нет результатов</li>
                @endforelse
            </ul>

            <hr/>

            <h4>Последние видео</h4>

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

        </div>
    </div>
@endsection
