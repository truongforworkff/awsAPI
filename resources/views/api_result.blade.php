<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Result</title>
    <style>
        .product {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
        }
        .product img {
            max-width: 100px;
        }
        .product-title {
            font-size: 1.2em;
            font-weight: bold;
        }
        .product-price {
            color: green;
        }
    </style>
</head>
<body>
    <h1>API Result</h1>
    <div id="products"></div>

    <script>
        async function fetchData() {
            try {
                let response = await fetch('/api/fetch-data');
                let data = await response.json();

                if (data.error) {
                    document.getElementById('products').innerHTML = `<p>Error: ${data.error}</p>`;
                } else {
                    let productsHtml = data.search_results.map(result => {
                        return `
                            <div class="product">
                                <img src="${result.image}" alt="${result.title}">
                                <div class="product-title">${result.title}</div>
                                <div class="product-authors">
                                    Authors: ${result.authors.map(author => `<a href="${author.link}">${author.name}</a>`).join(', ')}
                                </div>
                                <div class="product-price">Price: ${result.price.raw}</div>
                                <div><a href="${result.link}" target="_blank">View on Amazon</a></div>
                            </div>
                        `;
                    }).join('');

                    document.getElementById('products').innerHTML = productsHtml;
                }
            } catch (error) {
                document.getElementById('products').innerHTML = `<p>Error: ${error.message}</p>`;
            }
        }

        window.onload = fetchData;
    </script>
</body>
</html>
