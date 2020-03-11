@extends("template.master")
@section("title") Edit Certificate @endsection
@section("content")

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-book fa-fw"></i> Edit Certificate
                    <a href="{{ route('certificate.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                </h4>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('certificate.update',$info->id) }}" method="post" enctype="multipart/form-data" class="border border-faded rounded p-2">
                    @csrf
                    @method("PATCH")
                    <div class="form-inline d-flex justify-content-between">
                        <input type="file" name="photo" accept="image/png,image/jpeg" class="form-control flex-grow-1 p-1 mr-2">
                        <input type="text" name="name" class="form-control flex-grow-1 mr-2 @error('name') is-invalid @enderror" value="{{ $info->name }}" placeholder="Student Name">

                        <input type="text" name="nrc" class="form-control flex-grow-1 mr-2 @error('nrc') is-invalid @enderror" value="{{ $info->nrc }}" placeholder="NRC Number">

                        <button class="btn btn-primary">
                            <i class="fas fa-upload fa-fw"></i>
                            Update Info
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
