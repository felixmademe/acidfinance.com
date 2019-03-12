<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
            @font-face
            {
                font-family: 'Comfortaa', 'Raleway', sans-serif !important;
                src: url('https://fonts.googleapis.com/css?family=Comfortaa|Raleway');
            }
            a
            {
                color: #00C851 !important;
                text-decoration: none !important;
            }
            body
            {
                border: 10px;
                margin: 20px auto !important;
            }
            h1
            {
                color: #00C851 !important;
                text-align: center !important;
            }

        </style>
    </head>
    <body>
        <h1>Acid Finance</h1>
        <p>Simplifying and visualising finance
            <br><br>
            {{ $actionText }}
            <br><br>
            <a href="{{ $actionUrl }}">Click here</a>
        </p>
    </body>
</html>
