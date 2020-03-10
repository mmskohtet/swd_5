@extends("template.master")
@section("title") Add Certificate @endsection
@section("content")

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4><i class="fas fa-book fa-fw"></i> Add New Certificate</h4>
                <form action="{{ route('certificate.store') }}" method="post" enctype="multipart/form-data" class="border border-faded rounded p-2">
                    @csrf
                    <div class="form-inline d-flex justify-content-between">
                        <input type="file" name="photo" accept="image/png,image/jpeg" class="form-control p-1">
                        <input type="text" name="name" class="form-control" placeholder="Student Name">
                        <input type="text" name="nrc" class="form-control" placeholder="NRC Number">
                        <button class="btn btn-primary">
                            <i class="fas fa-plus-circle fa-fw"></i>
                            Add Certificate
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @stop
