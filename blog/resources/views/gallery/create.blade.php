@extends("template.master")

@section("title") Add Photo @stop

@section("content")

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route("gallery.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ old("description") }}</textarea>
                        @error("description")
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="photo[]" multiple>
                        @error("photo.*")
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
