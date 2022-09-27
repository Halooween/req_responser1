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
    .create{
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
                    <h2 class="mt-5 create">Add user</h2>
                    <form action="{{ route('user.store') }}" method="post"  enctype="multipart/form-data" >
                        @csrf 
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" name="name" class="form-control " value="{{ old('name') }} " >
                            <span class="text-danger">  @error('name'){{ $message }} @enderror </span>
                        </div>

                        <div class="form-group">
                            <label >Age</label>
                            <input type="number" name="age" class="form-control " value="{{ old('age') }} " >
                            <span class="text-danger">  @error('age'){{ $message }} @enderror </span>
                        </div>

                        <div class="form-group">
                            <label> Select image to upload:</label><br>
                            <input type="file" name="image" accept=".jpg"  class="form-control " value=" {{ old('image') }} " >
                            <span class="text-danger">  @error('image'){{ $message }} @enderror </span>
                        </div>

                        <div class="form-group">
                            <label>Bio</label>
                            <textarea class="form-control" name="bio">{{ old('bio') }} </textarea>
                            <span class="text-danger">  @error('bio'){{ $message }} @enderror </span>
                        </div>


                        <input type="submit" name="create" class="btn btn-primary" value="Submit">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    </main>
</body>
</html>


