<!DOCTYPE html>
<html lang="en">
<head>
    <title>City Table</title>
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
            <h4>City List</h4>
            <a href="{{ route('citycreate') }}" class="btn btn-primary" style="margin-bottom: 10px;">ADD</a>
        </div>
        <div class="table-responsive"> <!-- Added this div for responsiveness -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">Sr. No.</th>
                        <th style="text-align: center;">Country</th>
                        <th style="text-align: center;">State</th>
                        <th style="text-align: center;">City</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $value)
                    <tr>
                        <td style="text-align: center;">{{$value->id}}</td>
                        <td style="text-align: center;">{{$value->country->name}}</td>
                        <td style="text-align: center;">{{$value->state->name}}</td>
                        <td style="text-align: center;">{{$value->name}}</td>
                        <td style="text-align: center;">
                            <a class="btn btn-primary" href="{{route('cityedit',$value->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{route('citydelete',$value->id)}}">Delete</a>
                        </td>
                    </tr>   
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
