
<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" class="create-user">
        <div class="modal-body">
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
   $('.create-user').submit(function(e){
      e.preventDefault();
      var formData = {
        'name' : $('#name').val(),
        'email' : $('#email').val(),
        'age' : $('#age').val()
      };
      $.ajax({
          url         : "<?=site_url("user/create") ?>",
          type        : "post",
          dataType    : 'json',
          data: {
            user : formData
          }
      })
      .done(function() {
          console.log("Ok");
          $('#createUser').modal('hide');
          $('#users').DataTable().ajax.reload();
      })
      .fail(function() {
          console.warn( "Wystąpił błąd w połączniu");
      })
   });
  });
</script>
