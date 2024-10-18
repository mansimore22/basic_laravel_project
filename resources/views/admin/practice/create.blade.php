<!DOCTYPE html>
<html lang="en">

<head>
    <title>Practice Add</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery and Summernote JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    @include('message')
    @include('admin.navbar')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 text-start">
                <h4 class="mb-0 ">Practice Details</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                <a href="{{ route('practicelist') }}" class="btn btn-primary" style="">Back</a>
            </div>
        </div>
        <form action="{{route('practicestore')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Make sure to include CSRF token for Laravel forms -->
            <div class="form-group">
                <label>Date of Birth: </label>
                <input type="date" class="form-control" name="dob" required>
            </div>

            <div class="form-group">
                <label>Website Link: </label>
                <input type="text" class="form-control" placeholder="Enter your website link" name="website"
                pattern="(https?://.*|www\..*)"
                title="Please enter a valid URL (starting with http://, https://, or www.)" required>

            </div>

            <div class="form-group">
                <label>Skills: </label><br>
                <input type="checkbox" name="skills[]" value="HTML" > HTML
                <input type="checkbox" name="skills[]" value="CSS" style="margin-left:10px;" > CSS
                <input type="checkbox" name="skills[]" value="JavaScript" style="margin-left:10px;" > JavaScript
                <input type="checkbox" name="skills[]" value="PHP" style="margin-left:10px;" > PHP
            </div>

            <div class="form-group">
                <label>Gender: </label><br>
                <input type="radio" name="gender" value="Male" required> Male
                <input type="radio" name="gender" value="Female" style="margin-left:10px;" required> Female
                <input type="radio" name="gender" value="Other" style="margin-left:10px;" required> Other
            </div>

            <div class="form-group">
                <label for="position">Position: </label>
                <select name="position" class="form-control" required>
                    <option value="">Select Position</option>
                    <option value="React js Developer">React js Developer</option>
                    <option value="PHP Developer">PHP Developer</option>
                    <option value="Full Stack Developer">Full Stack Developer</option>
                    <option value="Graphic Designer">Graphic Designer</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Submit</button>
        </form>
    </div>
</body>
</html>