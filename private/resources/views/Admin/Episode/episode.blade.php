    @extends('Admin.template.admin_template')

    @section('content')

    <div class="example-modal">
      <div id="success-dialog" class="modal modal-success" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Notification Dialog</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                  Episode Anime successfully added.
              </div><!-- /.box-body -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div><!-- /.example-modal -->


    <div class="row">
      <div class="col-md-10 col-md-offset-1" style="padding-top:40px;">
        <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Search Episodes</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form method="POST" id="episode-add" action="{{ url('admin/episode/build') }}" >
            <!-- text input -->
            <div class="form-group">
                <div class="form-group">
                    <label>Keyword Title Anime</label>
                    <select class="form-control select2 anime" name="id_anime" id="id-anime" style="width: 100%;padding-bottom:10px;">
                      <?php  $i=1; ?>
                      @foreach($anime as $t)
                        @if($i==1)
                          <option value="{{ $t->id }}" selected="selected">{{ $t->title }}</option>
                        @else
                          <option value="{{ $t->id }}" >{{ $t->title }}</option>
                          <?php $i++; ?>
                        @endif
                      @endforeach
                    
                    </select>
                  </div>  
            </div>
          </form>
        </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>
    
    <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">List Episode</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="table-episode" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title Episode</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="data-episode">
                
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->

    <div  class="example-modal">
      <div id="delete-form" class="modal modal-danger" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
         <form method="POST" action="#">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Confirmation Delete</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <input type="hidden" name="id" id="delete-id">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                Delete this Episode ? 
              </div><!-- /.box-body -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline destroy-btn">Yes</button>
            </div>
          </div><!-- /.modal-content -->
          </form>
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div><!-- /.example-modal -->
    
    <div class="example-modal">
      <div id="title-form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form id="update_title" class="form-horizontal" method="POST" action="#">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Title</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <input type="hidden" id="id_title" name="id">
                <input type="hidden" name="_token" id="_token_title" value="{{ csrf_token() }}">
                  
                    <div class="form-group">
                      <label>Anime Title</label>
                      <select class="form-control select2 edit_anime" id="title_anime" name="id_anime" style="width: 100%;padding-bottom:10px;">

                        @foreach($title as $t)
                          <option value="{{ $t->id }}">{{ $t->title }}</option>
                        @endforeach
                      
                      </select>
                    </div>
                
              <div class="form-group">
                <label>Title Post : [FORMAT PENULISAN : (SAKURASOU EPISODE 1 SUBTITLE INDONESIA)]</label>
                <input type="text" id="title_post" class="form-control" name="title" placeholder="Title Post">
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


    <div class="example-modal">
      <div id="ss-form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form id="update_ss" class="form-horizontal"  enctype="multipart/form-data"  method="POST" action="#">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit ScreenShot</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <input type="hidden" id="id_ss" name="id">
                <input type="hidden" name="_token" id="_token_ss" value="{{ csrf_token() }}">
                <div class="form-group">
                <label class="control-label " for="anime_cover">ScreenShot 1 :</label>
                    <div class="input-group image-preview1">
                      <input type="text" class="form-control image-preview-filename1" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                      <span class="input-group-btn">
                          <!-- image-preview-clear button -->
                          <button type="button" class="btn btn-default image-preview-clear1" style="display:none;">
                              <span class="glyphicon glyphicon-remove"></span> Clear
                          </button>
                          <!-- image-preview-input -->
                          <div class="btn btn-default image-preview-input1 prev-input">
                              <span class="glyphicon glyphicon-folder-open"></span>
                              <span class="image-preview-input-title1 prev-input-title">Browse</span>
                              <input type="file" id="cover" name="image1"/> <!-- name input file -->
                          </div>
                      </span>
                    </div> 
                </div>
                 
                <div class="form-group">
                <label class="control-label " for="anime_cover">ScreenShot 2 :</label>
                    <div class="input-group image-preview2">
                      <input type="text" class="form-control image-preview-filename2" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                      <span class="input-group-btn">
                          <!-- image-preview-clear button -->
                          <button type="button" class="btn btn-default image-preview-clear2 " style="display:none;">
                              <span class="glyphicon glyphicon-remove"></span> Clear
                          </button>
                          <!-- image-preview-input -->
                          <div class="btn btn-default image-preview-input2 prev-input">
                              <span class="glyphicon glyphicon-folder-open"></span>
                              <span class="image-preview-input-title2 prev-input-title">Browse</span>
                              <input type="file" id="cover" name="image2"/> <!-- name input file -->
                          </div>
                      </span>
                    </div> 
                </div>

                <div class="form-group">
                <label class="control-label " for="anime_cover">ScreenShot 3 :</label>
                    <div class="input-group image-preview3">
                      <input type="text" class="form-control image-preview-filename3" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                      <span class="input-group-btn">
                          <!-- image-preview-clear button -->
                          <button type="button" class="btn btn-default image-preview-clear3" style="display:none;">
                              <span class="glyphicon glyphicon-remove"></span> Clear
                          </button>
                          <!-- image-preview-input -->
                          <div class="btn btn-default image-preview-input3 prev-input">
                              <span class="glyphicon glyphicon-folder-open"></span>
                              <span class="image-preview-input-title3 prev-input-title">Browse</span>
                              <input type="file" id="cover" name="image3"/> <!-- name input file -->
                          </div>
                      </span>
                    </div> 
                </div>
              <div class="progress"> <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div> </div>
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

    <script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/episode.js') }}"></script>
    <script type = "text/javascript">
      $(document).ready(function(e){
          //getCategory();
          $('.edit_anime').select2();
          $(".anime").select2();

          
          var id_anime = $('#id-anime').val();
          var tableCat = $('#table-episode').DataTable({
            "ajax" : '{{ url('admin/episode/getData') }}/' + id_anime,
            "bProcessing": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
             "columns": [
              { "data": "id" },
              { "data": "title" },
              { "data": "created_at" },
              { "data": "action" }
              ]
          });
          $('body').delegate('.link-delete','click',function(){
            var id = $(this).data('id');
            $('#delete-id').val(id);
          });

          $('body').delegate('.title-btn','click',function(){
            var id = $(this).data('id');
            $('#id_title').val(id);
            getTitleEps(id);
          });

          $('body').delegate('.ss-btn','click',function(){
            $(".image-preview-filename1").val("");   
            $(".image-preview-filename2").val("");   
            $(".image-preview-filename3").val("");
            var id = $(this).data('id');
            $('#id_ss').val(id);
          });

          $('#update_ss').on('submit',function(){
            var id = $('#id_ss').val();

            var data = new FormData($(this)[0]);
            updateSS(id,data,tableCat);
            return false;
          });

          $('#update_title').on('submit',function(){
            updateEps($('#id_title').val(),$(this),tableCat);  
            return false;
          });

          $('#delete-form').on('submit',function(){
            var id = $('#delete-id').val();
            var token = $('#token').val();
              destroyEpisode(id,token,tableCat);
              return false;
          });

          $('#id-anime').on('change',function(){
            var id_anime = $('#id-anime').val();
           tableCat.ajax.url('{{ url('admin/episode/getData') }}/' + id_anime);
           tableCat.ajax.reload();
          });

          
        });

      function destroyEpisode(id,token,table)
      {
        $.ajax({
            url: "{{ url('admin/episode/destroy') }}",
            type: "POST",
            async:false,
            data: { id : id , _token:token},
            success: function() {
                $('#delete-form').modal('hide');
                table.ajax.reload();
           },
           error: function(xhr,status,error)
           {
              alert(xhr.responseText);
           } 
        });
      }

      function getTitleEps(id)
      {
        var s_url = "{{ url('admin/episode/getTitle') }}/"+ id;         
        $.ajax({
            url: s_url,
            type: "GET",
            async: false,
            data:{},
            success:function(result)
            { 
              $(".edit_anime").select2("val", result.id_anime);
              $('#title_post').val(result.title);       
            },
            error:function(xhr,status,error)
            {
              alert(xhr.responseText);
            }
        });
      }

      function updateEps(id,form,table)
      {
        var up_url = "{{ url('admin/episode/update') }}/" + id; 
        $.ajax({
            url: up_url,
            type: "POST",
            async: false,
            data:form.serialize(),
            success:function(result)
            { 
                $('#title-form').modal('hide');
                table.ajax.reload();
            },
            error:function(xhr,status,error)
            {
              alert(xhr.responseText);
            }
        });
      }

      function updateSS(id,form,table)
      {
        $("div.progress > div.progress-bar").css({ "width": "0%" }); 
        var up_url = "{{ url('admin/episode/update/ss') }}/" + id;
        $.ajax({
          url: up_url,
          type: "POST",
          data: form,
          async: true,
          xhr: function () {
                var xhr = new window.XMLHttpRequest();
                //Upload Progress
                xhr.upload.addEventListener("progress", function (evt) {
                   if (evt.lengthComputable) {
                  var percentComplete = (evt.loaded / evt.total) * 100; $('div.progress > div.progress-bar').css({ "width": percentComplete + "%" }); } }, false);
           
                //Download progress
                 xhr.addEventListener("progress", function (evt)
                 {
                 if (evt.lengthComputable)
                  { var percentComplete = (evt.loaded / evt.total) *100;
                 $("div.progress > div.progress-bar").css({ "width": percentComplete + "%" }); } },false);
                return xhr;
                }, 
          cache: false,
          contentType: false,
          processData: false,
          success: function(s) {
            table.ajax.reload();
            $('#ss-form').modal('hide');
         },
         error: function(xhr, status, error) {
        
          } 

        });
      }



    </script>

  
    @stop