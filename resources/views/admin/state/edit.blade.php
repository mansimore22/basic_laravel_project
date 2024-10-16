<!DOCTYPE html>
<html lang="en">

<head>
    <title>State Edit</title>
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
            <h4 class="mb-0">State Form</h4>
            <a href="{{ route('statelist') }}" class="btn btn-primary">Back</a>
        </div>
        <form action="{{route('stateupdate',$state->id)}}" method="POST">
            @csrf
            <!-- Make sure to include CSRF token for Laravel forms -->
            <div class="form-group">
                <label>Country:</label>
                <select class="form-control" name="country_id" required>
                    <option value="">Select Country</option>
                    @foreach ($countries as $coun)
                    <option value="{{$coun->id}}"{{$state->country_id == $coun->id ? 'selected' : ''}}>{{$coun->name}}</option> 
                    @endforeach                    
                </select>
            </div>
            <div class="form-group">
                <label>State Name:</label>
                <input type="text" class="form-control" placeholder="Enter State" name="state" value="{{old('state',$state->name)}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>