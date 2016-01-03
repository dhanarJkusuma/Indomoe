    @extends('Admin.template.admin_template')

    @section('content')

    <div class="col-xs-12 content-inside">
    <div class="row">       
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Anime List</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="table-anime" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Cover</th>
                  <th>Studio</th>
                  <th>Rating</th>
                  <th>Season</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="data-anime">
                
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  
    <input type="hidden" name="_token" id="get-token" value="{{ csrf_token() }}">
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
                  <p id="notif"></p>
              </div><!-- /.box-body -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div><!-- /.example-modal -->

   <div class="example-modal">
      <div id="edit-form" class="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form id="anime-form" class="form-horizontal" method="POST" action="#">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Anime</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <input type="hidden" id="id_anime" name="id">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label>Title Animes</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title Anime">
                </div>
                <div class="form-group">
                    <label>Category Anime</label>
                    <select class="form-control select2 category" multiple="multiple" name="category" id="category" data-placeholder="Select Category" style="width: 100%;">
                      
                    </select>
                </div>
                
                <div class="callout callout-info">
                    <p id="sel-cat"></p>
                </div>

                <!-- textarea -->
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" id="desc" rows="3" name="description" placeholder="Anime Description"></textarea>
                </div>
                
                <div class="form-group">
                  <label>Studio</label>
                  <input type="text" id="studio" class="form-control" name="studio" placeholder="Studio">
                </div>

                <div class="form-group">
                  <label>Season</label>
                  <div class="row">
                  <div class="col-md-6" >
                    <select class="form-control" id="season">
                      <option value="Spring">Spring</option>
                      <option value="Summer">Summer</option>
                      <option value="Fall">Fall</option>
                      <option value="Winter">Winter</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" id="year">
                      <?php  for($i=Date('Y');$i>=1990;$i--) {?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php } ?> 
                    </select>
                  </div>
                  </div>
                </div>
                <input type="hidden" name="season" id="anime_season">
                <div class="form-group">
                  <label>Rating</label>
                   <input type="text" id="rating" class="form-control" name="rating" placeholder="Rating">
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
                 <p id="title_val"></p>  
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
     <script src="{{ URL::asset('assets/plugins/textext/js/textext.core.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.plugin.ajax.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.plugin.autocomplete.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.plugin.filter.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.plugin.tags.js') }}"></script>
   
    
    <script type="text/javascript">
    $(document).ready(function(e){
        //getCategory();
        $('.category').select2();
        getCategory();
        $('#success-dialog').modal('hide');
      
        var tableCat = $('#table-anime').DataTable({
          "ajax" : '{{ url('admin/anime/getAll') }}',
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
            { "data": "category" },
            { "data": "cover"},
            { "data": "studio" },
            { "data": "rating" },
            { "data": "season" },
            { "data": "action" }          
            ]
       
        });

        $('body').delegate('.edit-btn','click',function(){
          var id = $(this).data('id');
          var csrf = $('#get-token').val();
          $('#id_anime').val(id);
          getAnime(id,csrf);
        });

        $('body').delegate('.link-delete','click',function(){
          var id = $(this).data('id');
          $('#id-delete').val(id);
          getTitle(id);
        });

        $('.destroy-btn').on('click',function(){
          var id = $('#id-delete').val();
          var csrf = $('#_token').val();
          deleteAnime(id,csrf,tableCat);
        });

        $('#anime-form').on('submit',function(){
          var id = $('#id_anime').val();
          $('#fix-category').val($('#category').val());
          var season = $('#season').val() + " " + $('#year').val();
          $('#anime_season').val(season);
          updateAnime(id,tableCat);
          return false;
        });
    });
     function getCategory()
      {
        $.ajax({
            url: "{{ url('admin/category/data') }}",
            type: "GET",
            async: false,
            success: function(s) {
              $.each( s, function( i, val ) {
                var option = document.createElement("option");
                option.value = val.category;
                option.text = val.category;
                document.getElementById('category').appendChild(option);
              });
           },
           error: function(xhr, status, error) {
           $('#desc').val(xhr.responseText);
            } 

        });
      }

    function getTitle(id_anime)
    {
       $.ajax({
            url: "{{ url('admin/anime/get') }}",
            type: "POST",
            async:false,
            data: { id_anime : id_anime },
            success: function(result)
            {
             $('#title_val').html("Delete " + result.title + " ? ");
            }
      });
    }

    function getAnime(id_anime,csrf)
    {
      $.ajax({
              url: "{{ url('admin/anime/get') }}",
              type: "POST",
              async:false,
              data: { id_anime : id_anime , _token : csrf},
              success: function(result)
              {
                $('#sel-cat').html(result.category);
                $('#title').val(result.title);
                $('#desc').val(result.description);
                $('#studio').val(result.studio);
                $('#rating').val(result.rating);
                $('#category').val(result.category);
                $('#season').val(result.season.substring(0,result.season.indexOf(" ")));
                $('#year').val(result.season.substring(result.season.indexOf(" ")+1,result.season.length));
              }
      });
    } 

    function updateAnime(id,table)
    {
      var up_url = "{{ url('admin/anime/update') }}/" + id;
      var post_data = $('#anime-form').serialize();
      $.ajax({
            url: up_url,
            type: "POST",
            data: post_data,
            async: false,
            success: function(s) {
              table.ajax.reload();
              $('#notif').html('Anime has been edited.');
              $('#edit-form').modal('hide');
              $('#success-dialog').modal('show');
           },
           error: function(xhr, status, error) {
         
            } 

        });
    }

    function deleteAnime(id,csrf,table)
    {
      var del_url = "{{ url('admin/anime/destroy') }}";
       $.ajax({
            url: del_url,
            type: "POST",
            data: { id_anime : id , _token : csrf },
            async: false,
            success: function(s) {
              table.ajax.reload();
              $('#notif').html('Data has been deleted');
              $('#delete-form').modal('hide');
              $('#success-dialog').modal('show');
           },
           error: function(xhr, status, error) {
         
            } 

        });
    }


    

    </script>
    @stop