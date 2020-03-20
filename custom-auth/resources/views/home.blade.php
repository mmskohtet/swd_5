@extends("template.master")
@section("content")

    <div class="">

        {{ Auth::user() }}

    </div>

    <form action="{{ route("logout") }}" method="post" >
        @csrf
        <button class="btn btn-primary">logout</button>
    </form>

    @stop
