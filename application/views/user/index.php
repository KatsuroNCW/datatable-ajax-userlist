<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Users</title>

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">


    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <script>
      $(document).ready(function() {
        var dataTable = $('#users').DataTable( {
            ajax: '<?=site_url("user/get") ?>',
            iDisplayLength: 20,
            columns: [
              {data : "id"},
              {data : "name"},
              {data : "email"},
              {data : "age"},
              {data : "date"},
              {
                "defaultContent": "<button id='edit' data-toggle='modal' data-target='#editUser'>edit</button>",
                "orderable": false
              },
              {
                "defaultContent": "<button id='delete'>delete</button>",
                "orderable": false
              }
            ],
        } );
        $('#users tbody').on( 'click', 'button#edit', function () {
            var userData = dataTable.row( $(this).parents('tr') ).data();
            $('#editUser #id').val(userData.id),
            $('#editUser #name').val(userData.name),
            $('#editUser #email').val(userData.email),
            $('#editUser #age').val(userData.age)
        } );
        $('#users tbody').on( 'click', 'button#delete', function () {
            var userData = dataTable.row( $(this).parents('tr') ).data();
            $.ajax({
                url         : "<?=site_url("user/delete") ?>",
                type        : "post",
                dataType    : 'json',
                data: {
                  user : userData
                }
            })
            .done(function() {
              $('#users').DataTable().ajax.reload();
              alert('user deleted');
            })
            .fail(function() {
              console.warn( "connection error");
            })
        } );
      } );
    </script>

  </head>
  <body>
    <div class="container">
      <h1>List of users</h1>

      <?php
      $this->load->view('user/modals/create');
      $this->load->view('user/modals/edit');
      ?>
      <table id="users" class="display" style="width:100%">
          <thead>
              <tr>
                  <th>ID</td>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Age</th>
                  <th>Date</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <tbody>
          </tbody>
      </table>

      <button type="button" class="btn btn-primary add_user" data-toggle="modal" data-target="#createUser">
        Add new user
      </button>
    </div>
  </body>
</html>
