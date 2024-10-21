<!DOCTYPE html>
<html lang="en">

<head>
    <title>Comment Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom styling for buttons to ensure proper spacing in small viewports */
        .action-buttons {
            display: flex;
            justify-content: center;
        }

        .action-buttons a {
            margin: 0 10px;
        }

        /* Ensuring table elements don't overflow on smaller devices */
        @media (max-width: 767px) {
            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    @include('message')
    @include('admin.navbar')
    <div class="container">
        <div class="row">
            <!-- Ensure columns are responsive on all screen sizes -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-2">
                <h4 class="mb-0 text-start">Comment List</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-2 text-right">
                <a href="{{ route('commentcreate') }}" class="btn btn-primary">ADD</a>
            </div>
        </div>

        <div class="table-responsive">
            <!-- Wrapping table in table-responsive to make it scrollable on mobile -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">Sr. No.</th>
                        <th style="text-align: center;">Title</th>
                        <th style="text-align: center;">Content</th>
                        <th style="text-align: center;">Commentor Name</th>
                        <th style="text-align: center;">Created At</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comment as $value)
                    <tr>
                        <td style="text-align: center;">{{$value->id}}</td>
                        <td style="text-align: center;">{{$value->blogpost->title}}</td>
                        <td style="text-align: center;">{{$value->content}}</td>
                        <td style="text-align: center;">{{$value->commenter_name}}</td>
                        <td style="text-align: center;">{{$value->created_at}}</td>
                        <td class="action-buttons" style="text-align: center;">
                            <a class="btn btn-primary btn-sm" href="{{ route('commentedit', $value->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('commentdelete', $value->id) }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>