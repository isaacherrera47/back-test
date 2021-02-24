<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
          integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ=="
          crossorigin="anonymous"/>
    <title>Front test</title>
    <style>
        #app {
            font-family: Avenir, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-align: center;
            color: #2c3e50;
            margin-top: 60px;
        }
    </style>
</head>
<body>
<div id="app">
    <div class="ui container">
        <div class="ui dividing header">Image uploader</div>
        <form class="ui form {{ session('status') }}" method="post" enctype="multipart/form-data"
              action="{{route('index.post')}}">
            @csrf
            <div class="field">
                <label>Please, select the images you want to upload</label>
                <input name="image" required type="file" accept="image/png">
            </div>
            <button role="button" class="ui secondary button" type="submit">Post images</button>
            <div class="ui success message">
                <div class="header">Images uploaded</div>
                <p> Yay! Images were uploaded successfully. </p></div>
            <div class="ui error message">
                <div class="header">There was an error!</div>
                <p> It seems one or more images aren't png or are too big. </p></div>
        </form>
        <div class="ui dividing header">Gallery (uploaded images)</div>
        <div>
            <div class="ui three column grid">
                @foreach($images as $image)
                    <div class="column">
                        <div class="fluid ui card">
                            <img src="{{$image}}" class="ui image" alt="image uploaded">
                            <div class="content">
                                <div class="header">{{$image}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"
        integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw=="
        crossorigin="anonymous"></script>
<script>
    $('form').on('submit', function (e) {
        $(this).addClass('loading');
    })
</script>
</body>
</html>
