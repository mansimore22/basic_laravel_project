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
    <style>
        .action-buttons {
            display: flex;
            justify-content: center;
        }
        .action-buttons a {
            margin: 0 10px;
        }
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
            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                <h4 class="mb-0 text-start">Blog Post Details</h4>
            </div>
        </div>
        <!-- Search Form -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">Sr. No.</th>
                        <th style="text-align: center;">Title</th>
                        <th style="text-align: center;">Content</th>
                        <th style="text-align: center;">Author Name</th>
                        <th style="text-align: center;">Comment</th>
                        <th style="text-align: center;">Commenter Name</th>
                        <th style="text-align: center;">Published At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        @if (!$blog->comments->isEmpty())  <!-- Check if the blog has comments -->
                            @foreach ($blog->comments as $comment)
                                <tr>
                                    @if ($loop->first)  <!-- Only display blog details for the first comment -->
                                        <td style="text-align: center;">{{ $blog->id }}</td>
                                        <td style="text-align: center;">{{ $blog->title }}</td>
                                        <td>{!! $blog->content !!}</td>
                                        <td style="text-align: center;">{{ $blog->author_name }}</td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif
                                    <td style="text-align: center;">{{ $comment->content }}</td>
                                    <td style="text-align: center;">{{ $comment->commenter_name }}</td>
                                    <td style="text-align: center;">{{ $blog->published_at }}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center my-3">
                {{ $blogs->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</body>
</html>
