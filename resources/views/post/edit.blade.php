<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      .update{
        margin-left:100px;
    }
    
      form{
        height: auto;
        width: 60%;
        margin: 100px;
      }
    </style>
</head>
<body>
    <main role="main" class="container">

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 form">
                    <h2 class="mt-5 update">Edit Post</h2>
                    
                    <form action="{{ route('user.post.update', [$user,$post->post_id]) }}" method="post" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control " value="<?php echo $post->title ?>" >
                            <span class="text-danger">  @error('title'){{ $message }} @enderror </span>
                        </div>
                        <div class="form-group">
                            <label> Select image to upload:</label><br>
                          
                            <input type="file" name="image" accept=".jpg"  class="form-control " value="<?php echo 'public/images/'.$post->image ?>" >
                            <span class="text-danger">  @error('image'){{ $message }} @enderror </span>
                            
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" placeholder="write something..">{{ $post->description }}</textarea>
                            <span class="text-danger">  @error('description'){{ $message }} @enderror </span>
                        </div>
                       
                        <div class="form-group">
                            <div class="radio">
                                <label><input type="radio" name="status"  {{  $post->status == '1' ? 'checked' : '' }} value="1" checked> Active</label>
                                <label><input type="radio" name="status"  {{  $post->status == '0' ? 'checked' : '' }} value="0"> Offline</label>
                            </div>
                        </div>


                        <input type="submit" name="create" class="btn btn-primary" value="Submit">
                        <a href="{{ route('user.post.index', $user) }}" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    </main>
</body>
</html>


