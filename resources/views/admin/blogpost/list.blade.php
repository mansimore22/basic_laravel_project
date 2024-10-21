<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog Post Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>

<body>
    @include('message')
    @include('admin.navbar')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4 class="mb-0 text-start">Blog Post List</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                <a href="{{ route('blogpostcreate') }}" class="btn btn-primary">ADD</a>
            </div>
        </div>
        <form action="{{ route('blogpostlist') }}" method="GET">
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name" class="form-label">Author Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Author Name" name="name"
                            value="{{ request()->get('name') }}">
                    </div>
                </div>
                <div class="col-sm-4" style="padding-top: 25px;">
                    <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Search</button>
                    <a href="{{ route('blogpostlist') }}" class="btn btn-danger">Reset</a>
                </div>
            </div>
        </form>       
        
        
        <div class="table-responsive">
            <!-- Added this div for responsiveness -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">Sr. No.</th>
                        <th style="text-align: center;">Title</th>
                        {{-- <th style="text-align: center;">Content</th> --}}
                        <th style="text-align: center;">Author Name</th>
                        <th style="text-align: center;">Published At</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Record as $value)
                    <tr>
                        <td style="text-align: center;">{{$value->id}}</td>
                        <td style="text-align: center;">{{$value->title}}</td>
                        {{-- <td>{!! $value->content !!}</td> --}}
                        <td style="text-align: center;">{{$value->author_name}}</td>
                        <td style="text-align: center;">{{$value->published_at}}</td>
                        <td class="d-flex justify-content-between">
                            <a class="btn btn-primary btn-sm me-1" href="{{ route('blogpostedit', $value->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('blogpostdelete', $value->id) }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center my-3">
                {{-- {{ $Record->links() }} --}}
                {{ $Record->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</body>

</html>