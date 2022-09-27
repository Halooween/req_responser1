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
        .table{
          width: 80%;
        }
        .box{
            height: auto;
          width: 80%;
          margin: 100px;
        }
        .img{
        height: 150px;
        width: 150px;
        
      }

      </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 box">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left"></h2>
                     
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Status</th>
                        
                            </tr>
                        </thead>
                        <tr>
                        <td>{{ $post->post_id }}</td>
                        <td>{{ $post->title }}</td>
                        <td><img class="img"src="images/{{$post->image}}"></td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->status }}</td>

                  
                        </tr>
                    </table>
    
                   <a href="{{ route('post.index') }}"><Button class="btn btn-primary">Back</Button></a>
    
                </div>
            </div>
        </div>
    </div>
</body>
</html>