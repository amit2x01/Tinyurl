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
    <title>TinyUrl - Dashboard</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>
<body>
    <header style="background: #e7e7e7;">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-6">
                    <h4>Tinyurl - Dashboard</h4>
                </div>
                <div class="col-md-6 text-right">
                <a href="{{ url('/ap/logout') }}" class="btn btn-sm btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="my-4">
            <div class="text-center">
            <form action="{{ url('/import/csv') }}" method="POST" enctype="multipart/form-data" id="csv_file_import_form">
                @csrf
                    <input type="file" name="csv_file" id="csv_file_import" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" onchange="document.getElementById('csv_file_import_form').submit();" style="position: absolute;visibility:hidden;">
                    <button class="btn btn-success" type="button" onclick="document.getElementById('csv_file_import').click();">Import Url</button>
                </form>

                @if($errors->has('csv_file'))
                    <span class="text-danger text-16 bold">{{ $errors->first('csv_file') }}</span>
                @endif
            </div>
        </section>

        <br>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url('/add/url') }}" method="POST">
                            @csrf
                            <div class="d-flex">
                                <input type="text" class="form-control form-control-sm mx-3 w-75" name="url">
                                <button class="btn btn-success btn-sm">Add New Url</button>
                            </div>
                            @if($errors->has('url'))
                                <span class="text-danger text-16 bold">{{ $errors->first('url') }}</span>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <?php $i = 0 ?>
        <section class="container">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Short Url</th>
                        <th>URL</th>
                        <th>Visits</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($urls as $url)
                       <tr>
                            <td>{{ ++$i }}</td>
                            <td><a href="{{ url($url->shorturl) }}">{{ url($url->shorturl) }}</a></td>
                            <td><a href="{{ $url->url }}">{{ $url->url }}</a></td>
                            <td>

                                <?php
                                    $visitors = DB::table('visitors')->where('visited_link_id',$url->id)->get(); 
                                    echo count($visitors);   
                                ?>
                            </td>
                            <td><a href="{{ url('delete/url?url_id='.$url->id) }}" class="btn btn-danger btn-sm">Delete Now</a></td>
                       </tr> 
                    @endforeach
                </tbody>
            </table>
        </section>

    </main>
</body>
</html>