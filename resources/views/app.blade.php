<!DOCTYPE html>
<html lang="en">
<head translate="no">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google" content="notranslate">
    <title>Bangsus Sistem</title>
    <link rel="stylesheet" href="/css/app.css?version={{ $version['app'] }}">
</head>
<body>
    <div id="app">
        <noscript>
            <div class="container-fluid" id="no-javascript">
                <div class="row py-5">
                    <div class="col text-center">
                        Anda harus mengaktifkan JavaScript untuk melanjutkan.
                    </div>
                </div>
            </div>
        </noscript>
        <app
            app-version="{{ $version['app'] }}"
            laravel-version="{{ $version['laravel'] }}"
            php-version="{{ $version['php'] }}"
        />
    </div>
    <script src="/js/app.js?version={{ $version['app'] }}" defer></script>
</body>
</html>