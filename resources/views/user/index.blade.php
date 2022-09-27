@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">
    </button>
    <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">
    </button>
    <strong>{{ $message }}</strong>
</div>
@endif



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">    
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <style>
      .table{
        height: auto;
        width: 100%;
        /* margin: 100px; */
      }

      .img{
        height: 100px;
        width: 150px;
        
      }

    </style>
</head>
<body>
    <main role="main" class="container">

        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">
                            <h2 class="pull-left">User Details</h2>
                            <a href="{{ route('user.create') }}" class="btn btn-success pull-right">Add User</a>
                        </div>
    
                        <table class="table table-bordered table-striped " id="table_id">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Age</th>
                                    <th>Bio</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                            
                                <tr>
                                <td>{{ $data->user_id}}</td>
                                <td>{{ $data->name }}</td>
                                <td><img class="img"src="images/user/{{$data->image}}"></td>
                                <td>{{ $data->age}}</td>
                                <td>{{ $data->bio}}</td>
                                <td>
                                  
                                    <form method="POST" action="{{ route('user.destroy', $data->user_id) }}">
                                        @method('DELETE')
                                        @csrf

                                        <a href="{{  route('user.post.index',$data->user_id) }}" class="btn btn-info btn-sm" title="Index" data-toggle="tooltip">Posts</a>
                                        <a href="{{  route('user.edit',$data->user_id) }}" class="btn btn-info btn-sm" title="update Record" data-toggle="tooltip"><span class="fa fa-edit"></span></a>

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                   
                                </td>
    
                                </tr>
                            @endforeach
    
                            </tbody> 
                          
                        </table>
                    
                    </div>
                </div>
            </div>
        </div> 
    </main>
    
   
</body>
</html>


