<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <!-- <a href="{{route('welcome.add')}}">Add</a> -->
        <form action="{{route('welcome.save')}}" method="post">
            @csrf
            <button type="submit">Test POST</button>
        </form>
    </div>
</body>
</html>