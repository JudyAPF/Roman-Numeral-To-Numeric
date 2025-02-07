<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roman Numeral To Numeric</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
            word-wrap: break-word;
        }

        .result {
            font-size: 24px;
            font-weight: bold;
        }

        .even {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Roman to Numeric Converter</h1>
        <p>
            Number: <span class="result {{ $num % 2 == 0 ? 'even' : '' }}">{{ $num }}</span><br>
            In words: {{ $words }}<br>
            Roman numeral: {{ $romanNum }}
        </p>
    </div>
</body>
</html>
