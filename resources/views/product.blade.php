<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        /* CSS cho hiển thị sản phẩm */
        .product {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .product img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <h1>Search Results</h1>
    <div class="products">
        @foreach ($items as $item)
        <div class="product">
            <h2>{{ $item['Title'] }}</h2>
            <p>Price: {{ $item['Price'] }}</p>
            <a href="{{ $item['URL'] }}">View on Amazon</a><br>
            <img src="{{ $item['Image'] }}" alt="{{ $item['Title'] }}">
        </div>
        @endforeach
    </div>
</body>
</html>
