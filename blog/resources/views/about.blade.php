@extends("template.master")

@section("content")
    <p class="alert alert-primary">this is about</p>

    {{ dd($categories) }}

    @endsection
