<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hanoi Weather Forecast</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        h1 {
            color: #007BFF;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>🌤 Hanoi Weather Forecast</h1>

    <?php
    $apiKey = "86623d8dfc4d4372542ad13a0dfd0189"; // OpenWeather API Key
    $city = "Hanoi";
    $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

    // Get weather data
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    // Check if the API response is valid
    if ($data && isset($data['main'])) {
        echo "<h2>Weather in " . $data['name'] . ", " . $data['sys']['country'] . "</h2>";
        echo "<p>🌡 Temperature: " . $data['main']['temp'] . "°C</p>";
        echo "<p>🌬 Wind Speed: " . $data['wind']['speed'] . " m/s</p>";
        echo "<p>🌧 Condition: " . ucfirst($data['weather'][0]['description']) . "</p>";
    } else {
        echo "<p>Error retrieving weather data.</p>";
    }
    ?>

</div>

</body>
</html>
