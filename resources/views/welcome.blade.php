<?php

    $urls = DB::table('tinyurls')->get();
    if(count($urls) <= 0){
        $urls = [];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TinyUrl</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>
<body>
    <header style="background: #e7e7e7;">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-6">
                    <h4>Tinyurl</h4>
                </div>
            </div>
        </div>
    </header>
    <main>
        <br>
        <h2 class="text-center">Our Urls</h2>
        <?php $i = 0 ?>
        <section class="container">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Short Url</th>
                        <th>URL</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($urls as $url)
                       <tr>
                            <td>{{ ++$i }}</td>
                            <td><a href="{{ url($url->shorturl) }}">{{ url($url->shorturl) }}</a></td>
                            <td><a href="{{ $url->url }}">{{ $url->url }}</a></td>
                            
                       </tr> 
                    @endforeach
                </tbody>
            </table>
        </section>

    </main>
</body>
</html>