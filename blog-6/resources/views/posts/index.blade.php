<!-- ?php 
    foreach ($posts as $post) {
        echo "<p>{$post->title}</p>";
    } -->


@foreach ($posts as $post) 
   <p> {{$post->title}}</p>
@endforeach



