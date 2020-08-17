<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="/js/welcome.js"></script>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<div class="container">
    <div>
        <button type="button" class="btn btn-default" id="create-user">Create User</button>
        <button type="button" class="btn btn-primary" id="create-task">Create Task</button>
    </div>

    <h2>Users List</h2>

    <table class="table" id="table_user">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Tasks</th>
            <th></th>
        </tr>
        </thead>
        <tbody id="tab_body">

        </tbody>
    </table>
</div>
<div class="modal fade" id="user-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="user_modal_label"></h4>
            </div>
            <form id="user_form">
            <div class="modal-body">

                    <input type="hidden" class="form-control" name="id" id="user_id">
                    <div class="form-group">
                        <label for="usr">Name:</label>
                        <input type="text" class="form-control" name="name" id="user_name" required>
                    </div>
                    <div class="form-group">
                        <label for="usr">First Name:</label>
                        <input type="text" class="form-control" name="first_name" id="user_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="usr">Email:</label>
                        <input type="email" class="form-control" name="email" id="user_email" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="save_user">Save </button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="task-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="task_modal_label"></h4>
            </div>
            <form id="task_form">
            <div class="modal-body">
                <input type="hidden" class="form-control" name="id" id="task_id">
                <div class="form-group">
                    <label for="usr">Name:</label>
                    <input type="text" class="form-control" name="name" id="task_name" required>
                </div>
                <div class="form-group">
                    <label for="usr">Status:</label>
                    <input type="text" class="form-control" name="status" id="task_status" required>
                </div>
                <div class="form-group">
                    <label for="usr">Description :</label>
                    <textarea class="form-control" name="description" id="task_description" cols="30" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label for="task_user">User :</label>
                    <select class="form-control" name="user_id" id="task_user" required>

                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="save_task">Save </button>
            </div>
            </form>
        </div>
    </div>
</div>
</html>
<script>

</script>
