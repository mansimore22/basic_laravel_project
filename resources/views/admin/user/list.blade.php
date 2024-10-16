<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('message')
    @include('admin.navbar')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h4>User List</h4>
            <a href="{{ route('usercreate') }}" class="btn btn-primary" style="margin-bottom: 10px;">ADD</a>
        </div>
        <div class="table-responsive"> <!-- Added this div for responsiveness -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">Sr. No.</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Bio</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($Record as $value)
                    <tr>
                        <td style="text-align: center;">{{$value->id}}</td>
                        <td style="text-align: center;">{{$value->name}}</td>
                        <td style="text-align: center;">{{$value->email}}</td>
                        <td style="text-align: center;">
                            <img src="{{ asset('asset/user/' . $value->image) }}" alt="" height="50px" height="50px">
                        </td>
                        <td style="text-align: center;" height="50px" height="50px">{!! $value->bio !!}</td>
                        <td style="text-align: center;">
                            <a class="btn btn-primary" href="{{route('useredit',$value->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{route('userdelete',$value->id)}}">Delete</a>
                        </td>
                    </tr>   
                    @endforeach                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
