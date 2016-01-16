    @extends('Admin.template.admin_template')

    @section('content')
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <div class="col-xs-12 content-inside">
    <div class="row">            
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">User List</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="table-user" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="data-user">
                
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  

   <div  class="example-modal">
      <div id="edit-form" class="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form id="user-update" class="form-horizontal" method="POST" action="#">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Update Auth User</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label for="role" class="col-sm-2 control-label">ACL</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id-edit">
                    <select class="form-control" id="hak_akses" name="role">
                      <option value="superadmin">SuperAdmin</option>
                      <option value="admin">Admin</option>
                    </select>

                  </div>
                </div>
              </div><!-- /.box-body -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </form>
      </div><!-- /.modal -->
    </div><!-- /.example-modal -->
    
     <div  class="example-modal">
      <div id="delete-form" class="modal modal-danger" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
          <div class="modal-content">
          <form action="#" method="POST" id="delete-post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Confirmation Delete</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <input type="hidden" id="id-delete" name="id">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                Delete this User? 
              </div><!-- /.box-body -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline destroy-btn">Yes</button>
            </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div><!-- /.example-modal -->

    </div>
    <script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
   
    <script type="text/javascript">
    $(document).ready(function(e){
        //getCategory();

        var csrf = $('#csrf-token').val();
        var tableUser = $('#table-user').DataTable({
          "ajax" : {
            url: '{{ url('admin/user/manageData') }}',
            type : "GET",
          },
          "bProcessing": true,
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
           "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "email" },
            { "data": "hak_akses"},
            { "data": "action"}

            ]
        });

        $('body').delegate('.edit-btn','click',function(){
          var id = $(this).data('id');
          getRole(id);
        });

        $('body').delegate('.link-delete','click',function(){
          var id = $(this).data('id');
          $('#id-delete').val(id);
        });

        $("#delete-post").on("submit",function(){
          var id = $('#id-delete').val();
          destroyUser($(this),tableUser);
          return false;
        });


        $("#user-update").on("submit",function(e){
          e.preventDefault();
          updateRole($(this),tableUser);          
          return false;
        });
    });
    
    function getRole(id_User)
    {
      var csrf = $('#token').val();
      $.ajax({
        url: "{{ url('admin/user/userRole') }}",
        type: "POST",
        async:false,
        data: { id : id_User , _token : csrf },
        success: function(result)
        {
          $('#id-edit').val(result.id);
          $('#hak_akses').val(result.hak_akses);
        }
      });
    }

    function updateRole(form,table)
    {
      var update_url = "{{ url('admin/user/acl') }}";
      $.ajax({
          url: update_url,
          type: "POST",
          async:false,
          data: form.serialize(),
          success: function() 
          {
              $('#edit-form').modal('hide');
              table.ajax.reload();
         }
         , error: function(xhr, status, error) 
         {
           alert(xhr.status);
          } 

      });
    }

    function destroyUser(form,table)
    {
      $.ajax({
          url: "{{ url('admin/user/destroy') }}",
          type: "POST",
          async:false,
          data: form.serialize(),
          success: function() {
              $('#delete-form').modal('hide');
              table.ajax.reload();
         } 
      });
    }


    </script>
    @stop