@extends("template.master")

@section("content")

    <div class="row">
        <div class="col-12 col-md-8">

            <h4 class="text-primary">Student Register</h4>

            <hr>

            <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="photo">Your photo</label>
                            <input type="file" class="form-control p-1" name="photo" id="photo">
                        </div>

                        <div class="form-group">
                            <label for="name">Your name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>

                        <div class="form-group">
                            <label for="email">Your email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>

                        <div class="form-group">
                            <label for="phone">Your phone</label>
                            <input type="number" class="form-control" name="phone" id="phone">
                        </div>

                        <div class="form-group">
                            <label for="address">Your address</label>
                            <textarea type="text" class="form-control" name="address" id="address" rows="3"></textarea>
                        </div>


                    </div>
                    <div class="col-6">

                        <div class="form-group border border-faded p-2 rounded">
                            <label for="">Gender</label>
                            <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="male" name="gender" value="male" class="custom-control-input">
                                <label class="custom-control-label" for="male">Male</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="female" name="gender" value="female" class="custom-control-input">
                                <label class="custom-control-label" for="female">Female</label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="nationality">Nationality</label>
                            <select name="nationality" id="nationality" class="form-control">
                                @foreach($division as $d)
                                    <option value="{{$d}}">{{$d}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group border border-faded p-2 rounded">
                            <label for="nationality">Programming Skill</label>
                            @foreach($skill as $s)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="{{$s}}" name="skill[]" id="{{ $s }}">
                                    <label class="custom-control-label" for="{{ $s }}">{{ $s }}</label>
                                </div>
                            @endforeach
                        </div>

                        <button class="btn btn-primary">
                            <i class="fas fa-user-circle"></i>
                            Register
                        </button>


                    </div>
                </div>

            </form>

        </div>
    </div>

    @endsection
