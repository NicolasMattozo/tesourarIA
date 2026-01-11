<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title ?? 'Umadpel Administração Financeira' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: #f8f9fa;
        }

        .gradient-header {
            background: linear-gradient(to right, #92400e, #b45309);
        }

        .input-focus {
            transition: all 0.2s ease;
        }

        .input-focus:focus {
            outline: none;
            border-color: #b45309;
            box-shadow: 0 0 0 3px rgba(180, 83, 9, 0.15);
        }
    </style>
</head>

<body class="min-h-screen bg-gray-50 antialiased" x-data="{ sidebarOpen: false }">
    {{ $slot }}
</body>

</html>



