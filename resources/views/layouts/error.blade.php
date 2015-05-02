<html>
    <head>
        <style>
            body
            {
                margin           : 0;
                padding          : 0;
                width            : 100%;
                height           : 100%;
                color            : #eeeeee;
                display          : table;
                font-weight      : 100;
                font-family      : sans-serif;
                background-color : #555555;
            }

            .container
            {
                text-align     : center;
                display        : table-cell;
                vertical-align : middle;
            }

            .content
            {
                text-align : center;
                display    : inline-block;
            }

            .message
            {
                font-size : 70px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="message">@yield('message')</div>
            </div>
        </div>
    </body>
</html>
