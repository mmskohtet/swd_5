@extends("template.master")
@section("title") Add Certificate @endsection
@section("content")

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-book fa-fw"></i> Add New Certificate
                    <a href="{{ route('certificate.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                </h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                    <p class="alert alert-success">
                        {{ session('status') }}
                    </p>
                @endif
                <form action="{{ route('certificate.store') }}" method="post" enctype="multipart/form-data" class="border border-faded rounded p-2">
                    @csrf
                    <div class="form-inline d-flex justify-content-between">
                        <input type="file" name="photo" accept="image/png,image/jpeg" class="form-control flex-grow-1 p-1 mr-2">
                        <input type="text" name="name" class="form-control flex-grow-1 mr-2 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Student Name">

                        <input type="text" name="nrc" class="form-control flex-grow-1 mr-2 @error('nrc') is-invalid @enderror" value="{{ old('nrc') }}" placeholder="NRC Number">

                        <button class="btn btn-primary">
                            <i class="fas fa-plus-circle fa-fw"></i>
                            Add Certificate
                        </button>
                    </div>
                </form>

                <hr>



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
                                <td>{{ $l->photo }}</td>
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

                <div class="d-flex justify-content-between">
                    <div class="abc">
                        {{ $lists->links() }}
                    </div>
                    <div class="search">
                        <form action="{{ route("certificate.search") }}" method="post">
                            @csrf
                            <div class="form-inline">
                                <input type="text" name="search" class="form-control">
                                <button class="btn btn-primary ml-2">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>

    @stop
