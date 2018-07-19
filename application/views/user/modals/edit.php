
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" class="edit-user">
        <div class="modal-body">
          <input type="hidden" id="id" name="id" value="">
          <input type="text" id="name" name="name" placeholder="Enter name">
          <input type="text" id="email" name="email" placeholder="Enter e-mail">
          <input type="number" id="age" name="age" placeholder="Enter age">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Save changes">
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(function(){
   $('.edit-user').submit(function(e){
      e.preventDefault();
      var formData = {
        'id' : $('#editUser #id').val(),
        'name' : $('#editUser #name').val(),
        'email' : $('#editUser #email').val(),
        'age' : $('#editUser #age').val()
      };
      $.ajax({
          url : "<?=site_url("user/edit") ?>",
          type : "post",
          data: {
            user : formData
          }
      })
      .done(function() {
          console.log("Ok");
          $('#editUser').modal('hide');
          $('#users').DataTable().ajax.reload();
      })
      .fail(function() {
          console.warn( "Wystąpił błąd w połączniu");
      })
   });
  });
</script>
