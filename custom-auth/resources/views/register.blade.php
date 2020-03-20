@extends("template.master")

@section("content")

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-md-4">
                <div class="">
                    <h4>Register</h4>
                    <div class="border border-primary"></div>
                    <form action="{{ route("register") }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>

                        <button class="btn btn-primary">Register</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @stop
