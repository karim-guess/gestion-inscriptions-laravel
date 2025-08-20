<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inscriptions')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @yield('content')
    <script>
    let timer;
    function delayedSubmit(form) {
        clearTimeout(timer);
        timer = setTimeout(() => form.submit(), 500); // attend 0.5s après la frappe
    }
</script>
</body>
</html>
