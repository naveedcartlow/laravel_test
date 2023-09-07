<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Form Reponse</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: baseline;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .pull-right{
                float:right
            }
            .pull-left{
                float:left
            }
            .button {
                border: 1px solid #e7e7e7;
                padding: 8px;
                background: #e7e7e7;
                font-size: 15px;
                text-decoration: none;
                color: #0009;
                font-weight: 700;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel Task Reponse
                </div>
                <div class="m-b-md">
                    @forelse ($data['question'] as $qk=>$question)
                    <p><b>Question:</b> {{$question}}</p>
                    <p><b>Answer:</b> {{$data['question-'.$qk]}}</p>
                    <hr>
                    @endforeach
                    <a class="button pull-right" href="/">Back To Home</a>
                </div>
            </div>
        </div>
    </body>
</html>
