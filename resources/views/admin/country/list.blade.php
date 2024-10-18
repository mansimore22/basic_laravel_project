<!DOCTYPE html>
<html lang="en">
<head>
    <title>Country Table</title>
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
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4 class="mb-0 text-start">Country List</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                <a href="{{ route('countrycreate') }}" class="btn btn-primary">ADD</a>
            </div>       
        </div>
        <div class="table-responsive"> <!-- Added this div for responsiveness -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">Sr. No.</th>
                        <th style="text-align: center;">Country Name</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Record as $value)
                    <tr>
                        <td style="text-align: center;">{{$value->id}}</td>
                        <td style="text-align: center;">{{$value->name}}</td>
                        <td style="text-align: center;">
                            <a class="btn btn-primary" href="{{route('countryedit',$value->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{route('countrydelete',$value->id)}}">Delete</a>
                        </td>
                    </tr>   
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
