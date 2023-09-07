<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
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
        </style>
    </head>
    <body>
        @php
        $questions = [];
        // Questions listing
        $questions[] = array('question' => 'Question # 1',
            'answer' => array(
                'type' => 'radio',
                'list' => array('Answer 1-1','Answer 1-2','Answer 1-3')
            )
        );
        $questions[] = array('question' => 'Question # 2',
            'answer' => array(
                'type' => 'radio',
                'list' => array('Answer 2-1','Answer 2-2','Answer 2-3')
            )
        );
        @endphp
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel Task
                </div>
                <div class="m-b-md">
                    {!! Form::open() !!}
                        @forelse ($questions as $qk=>$question)
                            <p>
                                {{ $question['question'] }}
                                <input type="hidden" name="question[]" value="{{ $question['question'] }}">
                            </p>

                            @if($question['answer']['type'] === 'radio')
                                @foreach($question['answer']['list'] as $k=>$ans)
                                    <span style="margin:0px; padding:0px;">
                                        <input type="radio" required name="question-{{ $qk }}" id="ans-{{ $qk }}-{{ $k }}" value="{{ $ans }}" />
                                        <label for="ans-{{ $qk }}-{{ $k }}">{{ $ans }}</label>
                                    </span>
                                @endforeach
                            @endif
                            <hr>
                        @endforeach
                        <button class="pull-right" type="submit" >Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </body>
</html>
