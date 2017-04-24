<!DOCTYPE html>
<html>
    <head>
        <title>You've been banned</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: black;
                display: table;
                font-weight: bold;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 24px;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">You've been permanently banned!</div>
                <p>contact {{config('constants.mail')}} if you feel you've been wrongfully banned.</p>
            </div>
        </div>
    </body>
</html>
