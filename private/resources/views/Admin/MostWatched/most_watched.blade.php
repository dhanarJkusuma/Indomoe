    @extends('Admin.template.admin_template')

    @section('content')

    <div class="col-xs-12 content-inside">
    <div class="row">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Add Most Watched Anime</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form id="mw-form" class="form-horizontal" method="POST">
          <div class="box-body">
            <div class="form-group">
              <label for="mw" class="col-sm-2 control-label">Anime</label>
              <div class="col-sm-10">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <select class="form-control select2 anime" name="id_anime" style="width: 100%;padding-bottom:10px;">
                      @foreach($anime as $an)
                        <option value="{{ $an->id }}">{{ $an->title }}</option>
                      @endforeach
                    </select>
              </div>
            </div>
          </div><!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Add to Most Watced Anime</button>
          </div><!-- /.box-footer -->
        </form>
      </div><!-- /.box -->
            
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Most Watched</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="table-category" class="table table-bordered table-striped">
              <thead>
                <tr>                  
                  <th>ID</th>
                  <th>Anime</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="data-mw">
                
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  
    
     <div  class="example-modal">
      <div id="delete-form" class="modal modal-danger" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
          <div class="modal-content">
          <form id="delete-mw" action="#" method="POST">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Confirmation Delete</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <input type="hidden" id="token-delete" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id"  id="id-delete">
                Delete this data? 
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
   
    <script>
      $(document).ready(function(){
           $(".anime").select2();

        var tableMw = $('#table-category').DataTable({
          "ajax" : '{{ url('admin/mostWatched/get') }}',
          "bProcessing": true,
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
           "columns": [
            { "data": "id" },
            { "data": "anime.title" },
            { "data": "action" }          
            ]
        });



        $('body').delegate('.link-delete','click',function(){
          var id = $(this).data('id');
          $('#id-delete').val(id);
        });

        $(".destroy-btn").on("click",function(){
          var id = $('#id-delete').val();
          destroyCategory(id,tableCat);          
        });

        $("#mw-form").on("submit", function(){
          saveMW($(this),tableMw);    
          return false;
        });

        $("#delete-mw").on("submit",function(){
          destroyMW($(this),tableMw);
          return false;
        });
    });
 

    function saveMW(form,table)
    {

        $.ajax({
          url: "{{ url('admin/mostWatched/build') }}",
          type: "POST",
          async:false,
          data: form.serialize(),
          success: function() {
              table.ajax.reload();
         },
         error: function(xhr, status, error) 
         {
          alert(xhr.responseText);
          } 
      });
    }

    function destroyMW(form,table)
    {
      $.ajax({
          url: "{{ url('admin/mostWatched/destroy') }}",
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