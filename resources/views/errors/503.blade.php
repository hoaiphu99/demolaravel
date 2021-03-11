<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <title>503 Error</title>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Be right back.</div>
                <br>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Have some errors!</strong>
                        <br>
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{$e}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
