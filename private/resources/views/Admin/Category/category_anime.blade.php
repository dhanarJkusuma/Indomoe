    @extends('Admin.template.admin_template')

    @section('content')

    <div class="col-xs-12 content-inside">
    <div class="row">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Input Category</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form id="category-form" class="form-horizontal" method="POST">
          <div class="box-body">
            <div class="form-group">
              <label for="category" class="col-sm-2 control-label">Category</label>
              <div class="col-sm-10">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control" name="category" id="category" placeholder="Category">
              </div>
            </div>
          </div><!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Create</button>
          </div><!-- /.box-footer -->
        </form>
      </div><!-- /.box -->
            
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Category Item</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="table-category" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="data-category">
                
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  

   <div  class="example-modal">
      <div id="edit-form" class="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form id="category-form_update" class="form-horizontal" method="POST">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Category</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label for="category" class="col-sm-2 control-label">Category</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id-edit">
                    <input type="text" class="form-control" name="category" id="category-edit" placeholder="Category">
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
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Confirmation Delete</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <input type="hidden" id="token-delete" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id-delete">
                Delete this data? 
              </div><!-- /.box-body -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline destroy-btn">Yes</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div><!-- /.example-modal -->

    </div>
    <script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
   
    <script type="text/javascript">
    $(document).ready(function(e){
        //getCategory();

        var tableCat = $('#table-category').DataTable({
          "ajax" : '{{ url('admin/category/getAll') }}',
          "bProcessing": true,
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
           "columns": [
            { "data": "id" },
            { "data": "category" },
            { "data": "action" }          
            ]
        });

        $('body').delegate('.edit-btn','click',function(){
          var id = $(this).data('id');
          getCategoryFirst(id);
        });

        $('body').delegate('.link-delete','click',function(){
          var id = $(this).data('id');
          $('#id-delete').val(id);
        });

        $(".destroy-btn").on("click",function(){
          var id = $('#id-delete').val();
          destroyCategory(id,tableCat);          
        });

        $("#category-form").on("submit", function(){
          saveCategory("#category-form",tableCat);    
          return false;
        });

        $("#category-form_update").on("submit",function(){
          var id_cat = $('#id-edit').val();
          updateCategory(id_cat,tableCat);
          return false;
        });
    });
 

    function saveCategory(form,table)
    {
        $.ajax({
          url: "{{ url('admin/category/add') }}",
          type: "POST",
          async:false,
          data: $(form).serialize(),
          success: function() {
              $('#category').val('');
              table.ajax.reload();
         },
         error: function(xhr, status, error) {
           $('#desc').val(xhr.responseText);
            } 
      });
    }

    function getCategory(table)
    {
      $.ajax({
        url: "{{ url('admin/category/getAll') }}",
        type: "GET",
        async:false,
        data: { },
        success: function(result)
        {
          $('.data-category').html(result);
        }
      });
    }
    
    function getCategoryFirst(id_cat)
    {
      $.ajax({
        url: "{{ url('admin/category/get') }}",
        type: "POST",
        async:false,
        data: { id : id_cat },
        success: function(result)
        {
          $('#id-edit').val(result.id);
          $('#category-edit').val(result.category);
        }
      });
    }

    function updateCategory(id_cat,table)
    {
      var update_url = "{{ url('admin/category/update') }}/" + id_cat;
      $.ajax({
          url: update_url,
          type: "POST",
          async:false,
          data: $("#category-form_update").serialize(),
          success: function() {
              $('#edit-form').modal('hide');
              table.ajax.reload();
         } 
      });
    }

    function destroyCategory(id_cat,table)
    {
      var csrf = $('#token-delete').val();
      $.ajax({
          url: "{{ url('admin/category/destroy') }}",
          type: "POST",
          async:false,
          data: { id : id_cat , _token : csrf },
          success: function() {
              $('#delete-form').modal('hide');
              table.ajax.reload();
         } 
      });
    }


    </script>
    @stop