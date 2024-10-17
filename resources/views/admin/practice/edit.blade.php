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
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4 class="mb-0 text-start">Practice Details</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                <a href="{{ route('practicelist') }}" class="btn btn-primary" style="">Back</a>
            </div>
        </div>
        <form action="{{route('practiceupdate',$Record->id)}}" method="POST">
            @csrf
            <!-- Make sure to include CSRF token for Laravel forms -->
            <div class="form-group">
                <label>Date of Birth: </label>
                <input type="date" class="form-control" name="dob" value="{{$Record->date}}" required>
            </div>

            <div class="form-group">
                <label>Website Link: </label>
                <input type="text" class="form-control" placeholder="Enter your website link" name="website"
                    pattern="(https?://.*|www\..*)"
                    title="Please enter a valid URL (starting with http://, https://, or www.)"
                    value="{{$Record->link}}" required>

            </div>

            <div class="form-group">
                <label>Skills: </label><br>
                @php
                // Convert the stored skills (comma-separated) into an array
                $selectedSkills = explode(',', $Record->skill);
                @endphp

                <input type="checkbox" name="skills[]" value="HTML" {{ in_array('HTML', $selectedSkills) ? 'checked'
                    : '' }}> HTML
                <input type="checkbox" name="skills[]" value="CSS" {{ in_array('CSS', $selectedSkills) ? 'checked' : ''
                    }} style="margin-left:10px;"> CSS
                <input type="checkbox" name="skills[]" value="JavaScript" {{ in_array('JavaScript', $selectedSkills)
                    ? 'checked' : '' }} style="margin-left:10px;"> JavaScript
                <input type="checkbox" name="skills[]" value="PHP" {{ in_array('PHP', $selectedSkills) ? 'checked' : ''
                    }} style="margin-left:10px;"> PHP
            </div>

            <div class="form-group">
                <label>Gender: </label><br>
                <input type="radio" name="gender" value="Male"{{$Record->gender == 'Male' ? 'checked' : '' }} required> Male
                <input type="radio" name="gender" value="Female"{{$Record->gender == 'Female' ? 'checked' : '' }} style="margin-left:10px;" required> Female
                <input type="radio" name="gender" value="Other"{{$Record->gender == 'Other' ? 'checked' : '' }} style="margin-left:10px;" required> Other
            </div>

            <div class="form-group">
                <label for="position">Position: </label>
                <select name="position" class="form-control" required>
                    <option value="">Select Position</option>
                    <option value="React js Developer"{{$Record->position == 'React js Developer' ? 'selected' : ''}}>React js Developer</option>
                    <option value="PHP Developer"{{$Record->position == 'PHP Developer' ? 'selected' : ''}}>PHP Developer</option>
                    <option value="Full Stack Developer"{{$Record->position == 'Full Stack Developer' ? 'selected':''}}>Full Stack Developer</option>
                    <option value="Graphic Designer"{{$Record->position == 'Graphic Designer' ? 'selected':''}}>Graphic Designer</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Update</button>
        </form>
    </div>
</body>

</html>