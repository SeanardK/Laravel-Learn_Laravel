<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .container {
            max-width: 1440px;
            margin: auto;
        }
    </style>
</head>

<body>
    @if ($header)
        <x-molecule.navbar />
    @endif
    {{ $slot }}

    @if ($footer)
        <x-molecule.footer />
    @endif
</body>

</html>
