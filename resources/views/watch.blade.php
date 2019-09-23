@extends('app')

@section('content')
    <div class="row">
        <div class="col-12">
            <iframe width="100%" height="505" src="https://www.youtube.com/embed/{{ $v }}" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
    </div>
@endsection
