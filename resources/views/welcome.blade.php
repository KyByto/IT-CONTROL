<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>API de Réservation d'Hôtels</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        html, body {
            background-color: #f8fafc;
            color: #1a202c;
            font-family: 'Figtree', sans-serif;
            font-weight: 400;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            padding: 0 2rem;
        }

        .title {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2d3748;
        }

        .subtitle {
            font-size: 1.5rem;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 2rem;
        }

        .api-info {
            background-color: #e2e8f0;
            border-radius: 0.5rem;
            padding: 1.5rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .endpoints {
            text-align: left;
            margin-top: 1rem;
        }

        .endpoint {
            margin-bottom: 0.75rem;
            font-family: monospace;
            background-color: #f1f5f9;
            padding: 0.5rem;
            border-radius: 0.25rem;
        }

        .method {
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .get { color: #059669; }
        .post { color: #2563eb; }
        .put { color: #d97706; }
        .delete { color: #dc2626; }
    </style>
</head>
<body>
<div class="container">
    <h1 class="title">API de Réservation d'Hôtels</h1>
    <p class="subtitle">Une API RESTful développée avec Laravel 12</p>

    <div class="api-info">
        <h2>Points de terminaison principaux</h2>
        <div class="endpoints">
            <div class="endpoint"><span class="method post">POST</span> /api/register</div>
            <div class="endpoint"><span class="method post">POST</span> /api/login/customer</div>
            <div class="endpoint"><span class="method post">POST</span> /api/login/admin</div>
            <div class="endpoint"><span class="method get">GET</span> /api/hotels</div>
            <div class="endpoint"><span class="method get">GET</span> /api/hotels/{id}</div>
            <div class="endpoint"><span class="method post">POST</span> /api/reservations</div>
            <div class="endpoint"><span class="method get">GET</span> /api/reservations</div>
            <div class="endpoint"><span class="method get">GET</span> /api/reservations/{id}</div>
            <div class="endpoint"><span class="method put">PUT</span> /api/reservations/{id}</div>
            <div class="endpoint"><span class="method delete">DELETE</span> /api/reservations/{id}</div>
            <div class="endpoint"><span class="method post">POST</span> /api/logout</div>
        </div>
    </div>
</div>
</body>
</html>
