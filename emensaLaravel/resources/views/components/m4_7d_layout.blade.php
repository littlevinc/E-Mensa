<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ??  'Layout Demo' }}</title>
    <style>

        .container {  display: grid;
            grid-template-columns: 25% minmax(50%, 1000px) 25%;
            grid-template-rows: 0.5fr 2fr 0.5fr;
            gap: 0px 0px;
            grid-auto-flow: row;
            grid-template-areas:
                ". head ."
                ". body ."
                ". footer .";
        }

        .head {
            grid-area: head;
            min-height: 100px;
        }

        .body {
            grid-area: body;
            text-align: justify;
        }

        .footer { grid-area: footer; }

    </style>
</head>
<body>

<div class="container">

    <div class="head">
       <h1> {{ $header  }} </h1>
    </div>

    <div class="body">
        {{ $main  }}
    </div>

    <div class="footer">
        <h4>{{ $footer  }}</h4>
    </div>

</div>







</body>
</html>
