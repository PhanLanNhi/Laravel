<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Add Artwork</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="wrapped w-50 mt-5">
                        <h4 class="text-success text-center"> Add Artwork</h4>
                        <form method="post" action="{{route('artworks.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="artist_name" class="form-label">Artwork's name</label>
                                <input type="text" name="artist_name" id="artist_name" class="form-control" placeholder="Enter name">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="Enter description">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Art type</label>
                                <select name="art_type" class=" form-select">
                                    <option value="art">art</option>
                                    <option value="music" >music</option>
                                    <option value="literature">literature</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="media_link" class="form-label">Media link</label>
                                <input type="text" name="media_link" id="media_link" class="form-control" placeholder="Enter media link">
                            </div>
                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Cover image</label>
                                <input type="text" name="cover_image" id="cover_image" class="form-control" placeholder="Enter cover image">
                            </div>
                            <button class="btn btn-success my-4">Save</button>
                            <a href="{{route('artworks.index')}}" class="btn btn-success my-4 ms-3">Exits</a>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>