<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Search Results</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border: none;
            background-color: #f7f7f7;
            border-radius: 10px;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-img-top {
            width: 100%;
            height: 250px;
            object-fit: contain;
            padding: 10px;
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .card-text {
            font-size: 1rem;
        }
        .btn-custom {
            background-color: #6f42c1;
            color: white;
        }
        .btn-custom:hover {
            background-color: #563d7c;
        }
        .card-footer {
            background: none;
            border-top: none;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Amazon Search Results</h1>
        <div class="row">
            @foreach ($searchResults as $result)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 text-center">
                        <img src="{{ $result['image'] }}" class="card-img-top" alt="{{ $result['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $result['title'] }}</h5>
                            <p class="card-text"><strong>${{ $result['price']['value'] }}</strong></p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ $result['link'] }}" target="_blank" class="btn btn-custom">Buy now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

