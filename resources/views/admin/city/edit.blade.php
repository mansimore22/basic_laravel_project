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
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4 class="mb-0 text-start">City Edit</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                <a href="{{ route('citylist') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <form action="{{route('cityupdate', $city->id)}}" method="POST">
            @csrf
            <!-- Make sure to include CSRF token for Laravel forms -->
            <div class="form-group">
                <label for="country">Select Country:</label>
                <select id="country" name="country_id" class="form-control">
                    <option value="">--Select Country--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $city->state->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="state">Select State:</label>
                <select id="state" name="state_id" class="form-control">
                    <option value="">--Select State--</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}" {{ $city->state_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="city">City Name:</label>
                <input type="text" id="city" name="city_name" class="form-control" value="{{ $city->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
{{-- Ajax code to get state related to --}}
<script>
    $(document).ready(function() {
        // # means Id which is pass from the field
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