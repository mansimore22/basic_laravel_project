<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Add</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <!-- jQuery and Summernote JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    @include('message')
    @include('admin.navbar')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4 class="mb-0 text-start">User Details</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                <a href="{{ route('userlist') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <form action="{{route('userstore')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Make sure to include CSRF token for Laravel forms -->
            <div class="form-group">
                <label>Name: </label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name"  required>
            </div>
            <div class="form-group">
                <label>Email: </label>
                <input type="text" class="form-control" placeholder="Enter Email" name="email"  required>
            </div>
            <div class="form-group">
                <label for="image">Profile Image:</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="bio">Bio:</label>
                <textarea name="bio" class="form-control summernote"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Submit</button>
        </form>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200, // Set editor height
            placeholder: 'Write something here...',
        });
    });
</script>