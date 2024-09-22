
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather Forecast</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css'); ?>">
</head>
<body>
    <div class="container">
        <h1>Weather Forecast</h1>
        <form method="post" action="<?php echo site_url('weather/fetch'); ?>">
            <input type="text" name="city" placeholder="Enter city name" required>
            <button type="submit">Get Weather</button>
        </form>
        <?php if ($weather): ?>
            <h2>Weather in <?php echo $weather['name']; ?></h2>
            <p>Temperature: <?php echo $weather['main']['temp']; ?> °C</p>
            <p>Humidity: <?php echo $weather['main']['humidity']; ?> %</p>
            <p>Description: <?php echo $weather['weather'][0]['description']; ?></p>
            <img src="http://openweathermap.org/img/w/<?php echo $weather['weather'][0]['icon']; ?>.png" alt="Weather icon">
        <?php elseif ($error): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
