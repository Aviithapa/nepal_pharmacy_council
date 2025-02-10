<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .image-container {
            margin-bottom: 20px;
        }
        .image-container img {
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>

    @foreach($images as $image)
         <div class="image-container">
            <img src="{{ storage_path('app/public/noc/' . $userId . '/' . basename($image)) }}" alt="Image">
        </div>
    @endforeach

</body>
</html>
