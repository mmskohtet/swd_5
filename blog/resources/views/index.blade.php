@extends("template.master")

@section("content")
    <p class="alert alert-primary">This is index</p>
    <ul>
        @foreach($categories as $c)
            <li>{{ $c }}</li>
            @endforeach
    </ul>
    @endsection
