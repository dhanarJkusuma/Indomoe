    @extends('Admin.template.admin_template')

    @section('content')

    <div class="col-xs-12 content-inside">
    <div class="row">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Create {{ $data_anime->title }} Download Link</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form id="download-form" class="form-horizontal" method="POST">
          <div class="box-body">
            <div class="form-group">
              <label for="category" class="col-sm-2 control-label" id="label-form">Title Download</label>
              <input type="hidden" id="id_anime" value="{{ $data_anime->id_anime }}">
              <input type="hidden" id="id_post" name="id_post" value="{{ $data_anime->id }}">
              <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
              <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" placeholder="Title Download">
              </div>
            </div>
            <div class="form-group">
              <label for="category" class="col-sm-2 control-label">480p</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="r480p" id="r480p" placeholder="480p Link">
              </div>
            </div>
            <div class="form-group">
              <label for="category" class="col-sm-2 control-label">720p</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="r720p" id="r720p" placeholder="720p Link">
              </div>
            </div>
            <div class="form-group">
              <label for="category" class="col-sm-2 control-label">BlueRay</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="blueray" id="blueray" placeholder="Blue-Ray Link">
              </div>
            </div>
            <div class="form-group">
              <label for="category" class="col-sm-2 control-label">Direct_Link</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="direct_link" id="direct_link" placeholder="Direct Link">
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
            <h3 class="box-title"></h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="table-download" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Hosting</th>
                  <th>480p Link</th>
                  <th>720p Link</th>
                  <th>Blue-Ray Link</th>
                  <th>Direct Link</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="data-download">
                
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  

   <div class="example-modal">
      <div id="edit-form" class="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form id="update-form-download" class="form-horizontal" method="POST" action="#">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Anime</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label for="category" class="col-sm-2 control-label" id="label-form">Title Download</label>
                  <input type="hidden" id="id_download">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" id="id_anime" value="{{ $data_anime->id_anime }}">
                  <input type="hidden" id="id_post_edit" name="id_post" value="{{ $data_anime->id }}">
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title-edit" placeholder="Title Download">
                  </div>
                </div>
                <div class="form-group">
                  <label for="category" class="col-sm-2 control-label">480p</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="r480p" id="r480p-edit" placeholder="480p Link">
                  </div>
                </div>
                <div class="form-group">
                  <label for="category" class="col-sm-2 control-label">720p</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="r720p" id="r720p-edit" placeholder="720p Link">
                  </div>
                </div>
                <div class="form-group">
                  <label for="category" class="col-sm-2 control-label">BlueRay</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="blueray" id="blueray-edit" placeholder="Blue-Ray Link">
                  </div>
                </div>
                <div class="form-group">
                  <label for="category" class="col-sm-2 control-label">Direct_Link</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="direct_link" id="direct_link-edit" placeholder="Direct Link">
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
                <input type="hidden" id="id-delete">
                <p id="confirm-delete-dl"></p>
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
        var id_post = $('#id_post').val();

        var tableCat = $('#table-download').DataTable({
          "ajax" : '{{ url('admin/episode/getDownload') }}/' + id_post,
          "bProcessing": true,
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
           "columns": [
            { "data": "id" },
            { "data": "title" },
            { "data": "r480p" },
            { "data": "r720p" },
            { "data": "blueray" },
            { "data": "direct_link" },
            { "data": "action" }          
            ]
        });

        $('body').delegate('.edit-btn','click',function(){
          var id = $(this).data('id');
          getSelectedDownload(id);
        });

        $('body').delegate('.link-delete','click',function(){
          var id = $(this).data('id');
          getTitle(id);
          $('#id-delete').val(id);
        });

        $(".destroy-btn").on("click",function(){
          var id = $('#id-delete').val();
          destroyLink(id,tableCat);          
        });

        $("#download-form").on("submit", function(){
          saveLink("#download-form",tableCat);    
          return false;
        });

        $("#update-form-download").on("submit",function(){
          var id  = $('#id_download').val();
          updateLink(id,tableCat);
          return false;
        });
    });
 

    function saveLink(form,table)
    {
        $.ajax({
          url: "{{ url('admin/episode/buildDownload') }}",
          type: "POST",
          async:false,
          data: $(form).serialize(),
          success: function() {
              
              table.ajax.reload();

         },
         error: function(xhr, status, error) 
         {
           $('#title').val(xhr.responseText);
          } 
      });
    }

    function getSelectedDownload(id_download)
    {
      var csrf = $('#_token').val();
      $.ajax({
        url: "{{ url('admin/episode/getDownload/get') }}",
        type: "POST",
        async:false,
        data: { id : id_download , _token : csrf() },
        success: function(result)
        {
          $('#id_download').val(result.id);
          $('#title-edit').val(result.title);
          $('#r480p-edit').val(result.r480p);
          $('#r720p-edit').val(result.r720p);
          $('#blueray-edit').val(result.blueray);
          $('#direct_link-edit').val(result.direct_link);
        }
      });
    }

    function getTitle(id_download)
    {
      var csrf = $('#_token').val();
      $.ajax({
        url: "{{ url('admin/episode/getDownload/get') }}",
        type: "POST",
        async:false,
        data: { id : id_download , _token : csrf },
        success: function(result)
        {
          $('#confirm-delete-dl').html("Delete link " + result.title);
        }
      });
    }

    function updateLink(id,table)
    {

      var update_url = "{{ url('admin/episode/getDownload/update') }}/" + id;
      $.ajax({
          url: update_url,
          type: "POST",
          async:false,
          data: $("#update-form-download").serialize(),
          success: function() {
              $('#edit-form').modal('hide');
              table.ajax.reload();
         } 
      });
    }

    function destroyLink(id,table)
    {
      var csrf = $('#_token').val();
      $.ajax({
          url: "{{ url('admin/episode/getDownload/destroy') }}",
          type: "POST",
          async:false,
          data: { id : id , _token : csrf },
          success: function() {
              $('#delete-form').modal('hide');
              table.ajax.reload();
         } 
      });
    }


    </script>
    @stop