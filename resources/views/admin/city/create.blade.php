<!DOCTYPE html>
<html lang="en">

<head>
    <title>State Added</title>
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
            <h4 class="mb-0">City Form</h4>
            <a href="{{ route('citylist') }}" class="btn btn-primary">Back</a>
        </div>
        <form action="{{route('citystore')}}" method="POST">
            @csrf
            <!-- Make sure to include CSRF token for Laravel forms -->
            <div class="form-group">
                <label>Country: </label>
                <select class="form-control" name="country_id" id="country" required>
                    <option value="">Select Country</option>
                    @foreach ($countries as $coun)
                    <option value="{{$coun->id}}">{{$coun->name}}</option> 
                    @endforeach                    
                </select>
            </div>
            <div class="form-group">
                <label>State: </label>
                <select class="form-control" name="state_id" id="state" required>
                    <option value="">Select State</option>               
                </select>
            </div>
            <div class="form-group">
                <label>City: </label>
                <input type="text" class="form-control" placeholder="Enter City" name="city_name" id="city" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
<script>
    $(document).ready(function() {
        $('#country').change(function() {
            var country_id = $(this).val();
            if(country_id) {
                $.ajax({
                    url: '{{ route("getStates", "") }}/' + country_id,
                    type: "GET",
                    success: function(data) {
                        $('#state').empty().append('<option value="">--Select State--</option>');
                        $.each(data, function(key, value) {
                            $('#state').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                $('#state').empty().append('<option value="">--Select State--</option>');
            }
        });
    });
</script>