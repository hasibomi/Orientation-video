<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}">
</head>
<body style="background-color: #3CBBDC;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <img src="{{ asset('assets/img/404.jpg') }}" alt="404" class="img-responsive">
            </div>
        </div>
        <p class="text-center">
            <a href="{{ url('/') }}" class="btn btn-danger">
                <span class="glyphicon glyphicon-arrow-left"></span> Get back to safety
            </a>
        </p>
    </div>
</body>
</html>