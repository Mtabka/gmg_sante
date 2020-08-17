$(document).ready(function() {
    reloadData();
    $('#user_form').submit(function (e) {

        e.preventDefault();
        $.ajax({
            method : 'POST',
            url : "/api/user/store",
            data : $(this).serialize(),
            success: function(data) {
                $('#user-modal').modal('hide');
                reloadData();
            }
        });
    });
    $('#task_form').submit(function (e) {
        e.preventDefault();;
        $.ajax({
            method : 'POST',
            url : "/api/task/store",
            data : $(this).serialize(),
            success: function(data) {
                $('#task-modal').modal('hide');
                reloadData();
            }
        });
    });
    $('#table_user').on('click','.edittask', function () {
        let id = $(this).data('task_id');
        $.ajax({
            method: 'GET',
            url: "/api/user/all",
        }).done(function (data) {
            $('#task_user').empty();
            $('#task_user').append('<option value="">Veuillez choisir un utilisateur</option>');
            $.each(data, function (i, item) {
                $('#task_user').append('<option value="'+item.id+'">'+item.name+' '+item.first_name+'</option>');
            });
        });
        $.ajax({
            method : 'GET',
            url : "/api/task/"+id,
            success: function(data){
                console.log(data);
                $('#task_modal_label').html('Edit Task');
                $('#task_name').val(data.name);
                $('#task_description').val(data.description);
                $('#task_user').val(data.user_id);
                $('#task_id').val(data.id);
                $('#task-modal').modal('show');
                reloadData();
            }
        });
    });
    $('#table_user').on('click','.editUser', function () {
        let id = $(this).data('user_id');
        $.ajax({
            method : 'GET',
            url : "/api/user/"+id,
            success: function(data){
                $('#user_modal_label').html('Edit User');
                $('#user_name').val(data.name);
                $('#user_first_name').val(data.first_name);
                $('#user_email').val(data.email);
                $('#user_id').val(data.id);
                $('#user-modal').modal('show');
            }
        });
    });
    $('#table_user').on('click','.deleteuser', function () {
        let id = $(this).data('user_id');
        $.ajax({
            method : 'DELETE',
            url : "/api/user/"+id,
        }).done(function (data) {
            reloadData();
        });
    });
    $('#table_user').on('click','.deletetask', function () {
        let id = $(this).data('task_id');
        $.ajax({
            method : 'DELETE',
            url : "/api/task/",
            data : {ids:[id]},
        }).done(function (data) {
            reloadData();
        });
    });
    $('#create-user').click(function () {
        $('#user_modal_label').html("Create User");
        $('#user_name').val("");
        $('#user_first_name').val("");
        $('#user_email').val("");
        $('#user_id').val("");
        $('#user-modal').modal('show');
    });
    $('#create-task').click(function () {
        $.ajax({
            method: 'GET',
            url: "/api/user/all",
        }).done(function (data) {
            $('#task_user').empty();
            $('#task_user').append('<option value="">Veuillez choisir un utilisateur</option>');
            $.each(data, function (i, item) {
                $('#task_user').append('<option value="'+item.id+'">'+item.name+' '+item.first_name+'</option>');
            });
        });
        $('#task_modal_label').html('Create Task');
        $('#task_name').val("");
        $('#task_description').val("");
        $('#task_user').val("");
        $('#task_id').val("");
        $('#task-modal').modal('show');
    });
    function reloadData() {
        $.ajax({
            method: 'GET',
            url: "/api/user/all",
        }).done(function (data) {
            $('#tab_body').empty();
            $.each(data, function (i, item) {
                var html = "<tr><td>" + item.name + "</td>" +
                    " <td>" + item.first_name + "</td>" +
                    " <td>" + item.email + "</td><td>";
                $.each(item.tasks, function (i, task) {
                    html += task.name + '   <a data-task_id="' + task.id + '" class="btn btn-link deletetask" role="button">Delete</a>'
                        + '   <a data-task_id="' + task.id + '" class="btn btn-link edittask" role="button">Edit</a><br>';
                });
                html += ' </td><td><a data-user_id="' + item.id + '" class="btn btn-link deleteuser">Delete User</a><br><a data-user_id="' + item.id + '" class="btn btn-link editUser" >Edit </a></td></tr>';
                $('#tab_body').append(html);
            });
        });
    }
});
