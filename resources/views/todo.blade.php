<style>
    .center {
        width: 100vw;
        height: 100vh;
        background: linear-gradient(217deg, rgba(255, 0, 0, .8), rgba(255, 0, 0, 0) 70.71%),
            linear-gradient(127deg, rgba(0, 255, 0, .8), rgba(0, 255, 0, 0) 70.71%),
            linear-gradient(336deg, rgba(0, 0, 255, .8), rgba(0, 0, 255, 0) 70.71%);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        align-content: center;


    }

    .box {
        width: 1000px;
        height: 150px;
        background: #fff;
    }

    body {
        margin: 0px;

    }
    #nome{
        color:red;
    }
    /* *{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16;
        line-height: 20px;
        color: #fff;
    } */
    *{
        font-family: fantasy;
    }
</style>

<head>
    <meta charset="UTF-8">
    <input type="hidden" name="" id="csrf" value="{{ csrf_token() }}">
    <title>ToDo</title>
</head>

@include('header')

<body>

    <div class="center">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <div class="form-group">
                        <div class="row">
                            <label for="" class="form-label">Register tasks</label>
                            <input type="text" class="form-control" name="todoname" id="todoname" placeholder="Task">
                            <button type="button" class="btn btn-primary mt-3" id="registertask">Register</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row w-100">
                <div class="col-6 d-flex justify-content-center">Tasks</div>
                <div class="col-3 d-flex justify-content-center">Edit</div>
                <div class="col-3 d-flex justify-content-center">Delete</div>
            </div>
            @if(isset($tasks))
                @foreach ($tasks as $task)
                <div class="row w-100 ">
                    <div class="col-6 d-flex justify-content-center align-items-center border ">
                        {{ $task->tasks }}
                    </div>
                    <div class="col-3 d-flex justify-content-center align-items-center border ">
                        <button type="button" class="btn btn-warning mt-3 mb-3" onclick="OpenModal({{$task->idtodo}})">Edit</button>
                    </div>
                    <div class="col-3 d-flex justify-content-center align-items-center border ">
                        <button type="button" class="btn btn-danger mt-3 mb-3"
                            onclick="Delete({{ $task->idtodo }})">Delete</button>
                    </div>
                </div>
                @endforeach    
            @endif
        </div>
    </div>
    {{-- modal --}}
    <div class="modal" tabindex="-1" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Edit Task</label>
                        <input type="hidden" name="idtaskedit" id="idtaskedit" value="">
                        <input type="text" class="form-control" name="edittask" id="edittask"
                            placeholder="Edit Task">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveedit">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
@include('footer')
