@extends("template.master")

@section("content")

    <div class="row">
        <div class="col-12 col-md-12">

            <h4 class="text-primary">Student List</h4>

            <hr>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Nationality</th>
                    <th>Skill</th>
                    <th>Reg Time</th>
                </tr>
                </thead>
                <tbody>

                @foreach($list as $l)

                    <tr>
                        <td>{{ $l->id }}</td>
                        <td>{{ $l->photo }}</td>
                        <td>{{ $l->name }}</td>
                        <td>{{ $l->email }}</td>
                        <td>{{ $l->phone }}</td>
                        <td>{{ $l->address }}</td>
                        <td>{{ $l->gender }}</td>
                        <td>{{ $l->nationality }}</td>
                        <td>{{ $l->skill }}</td>
                        <td>{{ $l->created_at }}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>




        </div>
    </div>

@endsection
