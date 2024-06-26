<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            body {
                max-width: 600px;
                margin:auto;
                font-family: sans-serif;
            }
            p {
                line-height: 1.6;
            }
            article + article {
                margin-top: 3rem;
                padding-top: 3rem;
                border-top: solid 1px #4d4c4c;
            }
        </style>
        <title>Posts</title>
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
