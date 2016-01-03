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

    <script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.core.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.plugin.ajax.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.plugin.autocomplete.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.plugin.filter.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.plugin.tags.js') }}"></script>
    <script type = "text/javascript">
      $(document).ready(function(e){
          //getCategory();
          
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

          $('#delete-form').on('submit',function(){
            var id = $('#delete-id').val();
              destroyEpisode(id,tableCat);
              return false;
          });

          $('#id-anime').on('change',function(){
            var id_anime = $('#id-anime').val();
           tableCat.ajax.url('{{ url('admin/episode/getData') }}/' + id_anime);
           tableCat.ajax.reload();
          });

          
        });

      function destroyEpisode(id,table)
      {
        $.ajax({
            url: "{{ url('admin/episode/destroy') }}",
            type: "POST",
            async:false,
            data: { id : id},
            success: function() {
                $('#delete-form').modal('hide');
                table.ajax.reload();
           } 
        });
      }
    </script>

  
    @stop