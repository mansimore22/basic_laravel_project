<!DOCTYPE html>
<html lang="en">

<head>
    <title>Comment Add</title>
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
                <h4 class="mb-0 text-start">Comment Form</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                <a href="{{ route('commentlist') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <form action="{{route('commentstore')}}" method="POST">
            @csrf
            <!-- Make sure to include CSRF token for Laravel forms -->
            <div class="form-group">
                <label>Post Title:</label>
                <select class="form-control" name="post_id" required>
                    <option value="">Select Title</option>
                    @foreach ($blogs as $blog)
                    <option value="{{$blog->id}}">{{$blog->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Commenter Name:</label>
                <input type="text" class="form-control" placeholder="Enter Commenter" name="commenter_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>