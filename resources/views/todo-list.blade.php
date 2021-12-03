<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            @if (Session::has('success'))
            <div class="alert alert-light text-center alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> {{ Session::get('success') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @error('content')
            <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> {{ $message }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @enderror
            <div class="card-body">
                <h3>Daily Todo-List</h3>
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Add your new todo">
                        <button type="submit" class="btn btn-warning btn-sm px-4"><i class="fas fa-plus"></i></button>
                    </div>
                </form>
                 {{-- if tasks count --}}
                 @if (count($todolists))
                 <ul class="list-group list-group-flush mt-3">
                     @foreach ($todolists as $todolist)
                     <li class="list-group-item">
                         <form action="{{ URL::to('delete/'.$todolist->id) }}" method="POST">
                             {{ $todolist->content }}
                             @csrf
                             <button type="submit" class="btn btn-link text-danger btn-sm float-end"><i
                                     class="fas fa-trash"></i></button>
                         </form>
                     </li>
                     @endforeach
                 </ul>
                 @else
                 <p class="text-center mt-3">No Tasks!</p>
                 @endif
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
