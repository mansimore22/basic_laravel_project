<!DOCTYPE html>
<html lang="en">

<head>
    <title>Country Added</title>
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
            <h4 class="mb-0">Country Form</h4>
            <a href="{{ route('countrylist') }}" class="btn btn-primary">Back</a>
        </div>
        <form action="{{route('countrystore')}}" method="POST">
            @csrf
            <!-- Make sure to include CSRF token for Laravel forms -->
            <div class="form-group">
                <label>Country Name:</label>
                <input type="text" class="form-control" placeholder="Enter Country" name="country" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>