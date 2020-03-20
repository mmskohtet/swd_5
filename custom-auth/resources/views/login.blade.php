@extends("template.master")
@section("content")

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-md-4">
                <div class="">
                    <h4>Login</h4>
                    <div class="border border-primary"></div>
                    <form action="{{ route("login") }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <button class="btn btn-primary">Login</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


@stop
