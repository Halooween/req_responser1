@if ($message = Session::get('success'))
<div class="alert alert-success ">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">X</button>
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
                            <h2 class="pull-left">Post Details</h2>
                            
                            <a href="{{ route('user.post.create', $user) }}" class="btn btn-success pull-right"></i> Add new Post<a>
                        </div>
    
                        <table class="table table-bordered table-striped " id="table_id">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                            
                                <tr>
                                <td>{{ $data->post_id }}</td>
                                <td>{{ $data->title }}</td>
                                <td><img class="img"src='images/{{$data->image}}'></td>
                                <td>{{ $data->description}}</td>
                                <td>{{ $data->status}}</td>
                                <td>
                                  
                                    <form method="POST" action="{{ route('user.post.destroy',[$user,$data->post_id]) }}">
                                        @method('DELETE')
                                        @csrf

                                        <a href="{{  route('user.post.edit',[$user,$data->post_id]) }}" class="btn btn-info btn-sm" title="update Record" data-toggle="tooltip"><span class="fa fa-edit"></span></a>

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                   
                                </td>
    
                                </tr>
                            @endforeach
    
                            </tbody>
                          
                        </table>
                        <a href="{{ route('user.index') }}"><Button class="btn btn-primary">User</Button></a>

                    </div>
                </div>
            </div>
        </div> 
    </main>
</body>
</html>


