
// window.prototype = this;

OpenModal = function (idtodo) {
    $('#idtaskedit').val(idtodo);
    $('#modal').modal('show');

    
}
Delete = function (idtodo) {
    var csrf = $('#csrf').val();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "http://localhost:8989/delete",
                data: {
                    '_token': csrf,
                    'idtask': idtodo
                },
                success: function (response) {
                    Swal.fire(
                        'Deleted!',
                        'Your Task has been deleted.',
                        'success'
                    )
                    setTimeout(function () {
                        location.reload(true);
                    }, 2000);
                }
            });
        }
    })
}
$('#saveedit').click(function () {
    var taskedit = $('#edittask').val();
    var idtask = $('#idtaskedit').val();
    var csrf = $('#csrf').val();
    if (taskedit.length > 0) {
        $.ajax({
            type: "post",
            url: "http://localhost:8989/update",
            data: {
                '_token': csrf,
                'taskedit': taskedit,
                'idtask': idtask
            },
            success: function (response) {
                Swal.fire({
                    icon: 'sucess',
                    title: 'Nice work',
                    text: 'Task as been saved'
                })
                setTimeout(function () {
                    location.reload(true);
                }, 2000);
            }
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'The task field needs to be filled'
        })
    }
});
$('#registertask').click(function (e) {
    var task = $('#todoname').val();
    var csrf = $('#csrf').val();
    console.log(csrf);
    if (task.length > 0){
        $.ajax({
            
            type: "post",
            url: "http://localhost:8989/save",
            data: {
                '_token': csrf,
                'task' : task
            },
            success: function (response) {
                Swal.fire({
                    icon: 'sucess',
                    title: 'Nice work',
                    text: 'Task as been saved'
                })
                setTimeout(function () {
                    location.reload(true);
                }, 2000);
            }
        });
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'The task field needs to be filled'
        })
    }

});
