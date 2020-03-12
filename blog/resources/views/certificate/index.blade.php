@extends("template.master")
@section("title") Add Certificate @endsection
@section("content")

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-book fa-fw"></i> Certificate List
                    <a href="{{ route('certificate.create') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-plus fa-fw"></i>
                    </a>
                </h4>
                @if (session('status'))
                    <p class="alert alert-success">
                        {{ session('status') }}
                    </p>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>NRC No</th>
                            <th>Control</th>
                            <th>Register Time</th>
                        </tr>
                    </thead>
                    <tbody>

                    @if(!$lists->count())

                        <tr>
                            <td colspan="6">There is no Certificate</td>
                        </tr>

                        @else

                        @foreach($lists as $l)

                            <tr>
                                <td>{{ $l->id }}</td>
                                <td>
                                    <img src="{{ asset($l->photo) }}" style="width: 50px" class="rounded-circle" alt="">
                                </td>
                                <td>{{ $l->name }}</td>
                                <td>{{ $l->nrc }}</td>
                                <td>
                                    <form action="{{ route('certificate.destroy',$l->id) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-outline-danger" onclick="return confirm('Are U Sure to Delete?')">
                                            <i class="fas fa-trash fa-fw"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route("certificate.edit",$l->id) }}" class="btn btn-outline-success">
                                        <i class="fas fa-edit fa-fw"></i>
                                    </a>
                                </td>
                                <td>{{ $l->created_at }}</td>
                            </tr>

                            @endforeach

                    @endif


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
