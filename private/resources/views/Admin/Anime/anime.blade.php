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
                  <th>Title</th>
                  <th>Category</th>
                  <th>Studio</th>
                  <th>Credit</th>
                  <th>Rating</th>
                  <th>Season</th>
                  <th>Status</th>
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
      <div id="success-dialog" class="modal modal-success fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
      <div id="edit-form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <select class="form-control select2 category" multiple="multiple" id="category" data-placeholder="Select Category" style="width: 100%;">
                      
                    </select>
                </div>
                <input type="hidden" name="category" id="fix-category">
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
                  <label>Credit</label>
                  <input type="text" id="credit" class="form-control" name="credit" placeholder="Credit">
                </div>            

                <div class="form-group">
                  <label>Status</label>
                  <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="status" id="status">
                      <option value="ongoing">On-Going</option>
                      <option value="finish">Finish</option>
                    </select>
                  </div>
                  </div>
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

                <div class="form-group">
                  <input type="hidden" id="year-anime" class="form-control" name="year" placeholder="Year">
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

    <div class="example-modal">
      <div id="cover-form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form id="animcover-form" class="form-horizontal" method="POST" action="#">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Cover</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <input type="hidden" id="id_cover" name="id">
                <input type="hidden" name="_token" id="_token_cover" value="{{ csrf_token() }}">
                <div class="form-group">
                <label class="control-label " for="anime_cover">Anime Cover: ( Diutamakan 5:7 || 4:5 ) [ Potrait ]  </label>
                    <div class="input-group image-preview">
                      <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                      <span class="input-group-btn">
                          <!-- image-preview-clear button -->
                          <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                              <span class="glyphicon glyphicon-remove"></span> Clear
                          </button>
                          <!-- image-preview-input -->
                          <div class="btn btn-default image-preview-input prev-input">
                              <span class="glyphicon glyphicon-folder-open"></span>
                              <span class="image-preview-input-title prev-input-title">Browse</span>
                              <input type="file" id="cover" name="image"/> <!-- name input file -->
                          </div>
                      </span>
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

    <div class="example-modal">
      <div id="status-form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form id="animstats-form" class="form-horizontal" method="POST" action="#">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Status</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <input type="hidden" id="id_status" name="id">
                <input type="hidden" name="_token" id="_token_status" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label>Status</label>
                  <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="status" id="status_up">
                      <option value="ongoing">On-Going</option>
                      <option value="finish">Finish</option>
                    </select>
                  </div>
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
    

    <div class="example-modal">
      <div id="action-form"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Action Option</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
              <div class="btn-group" role="group" aria-label="...">
                  <a href="#" id="link_cover" target="__blank"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span> Watch Cover</button></a>
                  <a href="#" data-toggle="modal" class="edit-btn" data-target="#edit-form"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>
                  <a href="#" data-toggle="modal" class="cover-btn" data-target="#cover-form"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update Cover</button></a>
                  <a href="#" data-toggle="modal" class="status-btn" data-target="#status-form"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update Status</button></a>
                  <a href="#" data-toggle="modal" class="link-delete" data-target="#delete-form"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Destroy</button></a>
              </div>
              </div><!-- /.box-body -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog --> 
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
          "scrollX" : true,
          "info": true,
          "autoWidth": true,
           "columns": [
            { "data": "title" },
            { "data": "category" },
            { "data": "studio" },
            { "data": "credit" },
            { "data": "rating" },
            { "data": "season" },
            { "data": "status" },
            { "data": "action" }          
            ]
       
        });

        $('body').delegate('.action-btn','click',function(){
          var id = $(this).data('id');
          getCover(id);
          $('.edit-btn').data('id' , id);   
          $('.cover-btn').data('id' , id);   
          $('.status-btn').data('id' , id);   
          $('.link-delete').data('id' , id);   
        });

        $('body').delegate('.edit-btn','click',function(){
          $('#action-form').modal('hide');
          var id = $(this).data('id');
          var csrf = $('#get-token').val();
          $('#category').val('');
          $('#id_anime').val(id);
          getAnime(id,csrf);
          $(".sidebar-mini").css('padding-right','0');
        });

        $('body').delegate('.cover-btn','click',function(){
          $('#action-form').modal('hide');
          var id = $(this).data('id');
          $('.image-preview-filename').val('');
          $('#id_cover').val(id);
          $(".sidebar-mini").css('padding-right','0');
        });

        $('body').delegate('.status-btn','click',function(){
          $('#action-form').modal('hide');
          var csrf = $('#_token').val();
          var id = $(this).data('id');
          $('#id_status').val(id);
          getStatus(id,csrf);
          $(".sidebar-mini").css('padding-right','0');
        });

        $('body').delegate('.link-delete','click',function(){
          $('#action-form').modal('hide');
          var csrf = $('#_token').val();
          var id = $(this).data('id');
          $('#id-delete').val(id);
          getTitle(id,csrf);
          $(".sidebar-mini").css('padding-right','0');
        });

        $('.destroy-btn').on('click',function(){
          var id = $('#id-delete').val();
          var csrf = $('#_token').val();
          deleteAnime(id,csrf,tableCat);
        });

        $('#anime-form').on('submit',function(){
          $('#fix-category').val($('#category').val());
          var id = $('#id_anime').val();
          var season = $('#season').val() + " " + $('#year').val();
          $('#anime_season').val(season);
          $('#year-anime').val($('#year').val());  
          updateAnime(id,tableCat);
          return false;
        });

        $('#animcover-form').on('submit',function(){
          var formData = new FormData($(this)[0]);
          updateCover($('#id_cover').val(),formData,tableCat);          
          return false;
        });

        $('#animstats-form').on('submit',function(e){
          e.preventDefault();
          updateStatus($('#id_status').val(),tableCat);
          return false;
        });

    });

      function getCover(id)
      {
        var cover_url = "{{ url('admin/anime/cover') }}/" + id;
        $.ajax({
          url:cover_url,
          type: "GET",
          async : false,
          success : function(s)
          {
            $('#link_cover').attr("href", s);
          }
        });
      }

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

    function getStatus(id_anime,csrf)
    {
      $.ajax({
            url: "{{ url('admin/anime/status') }}",
            type: "POST",
            async:false,
            data: { id : id_anime, _token : csrf },
            success: function(result)
            {
              $('#status_up').val(result);    
            },
            error:function(xhr,status,error)
            {
              alert(xhr.responseText);
            }

      }); 
    }

    function getTitle(id_anime,csrf)
    {
       $.ajax({
            url: "{{ url('admin/anime/get') }}",
            type: "POST",
            async:false,
            data: { id_anime : id_anime, _token : csrf },
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
                $('#credit').val(result.credit);
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

    function updateStatus(id,table)
    {
      var up_url = "{{ url('admin/anime/update/status') }}/" + id;
      var post_data = $('#animstats-form').serialize();
      $.ajax({
            url: up_url,
            type: "POST",
            data: post_data,
            async: false,
            success: function(s) {
              table.ajax.reload();
              $('#status-form').modal('hide');
           }
      });
    }

    function updateCover(id,form,table)
    {
      $.ajax({
            url: "{{ url('admin/anime/update/cover') }}/" + id,
            type: "POST",
            data: form,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(s) {
              table.ajax.reload();
              $('#anime_cover').modal('hide');
          },
           error: function(xhr, status, error) {
            alert(xhr.responseText);
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
              alert(s);
              table.ajax.reload();
              $('#notif').html('Data has been deleted');
              $('#delete-form').modal('hide');
              $('#success-dialog').modal('show');
           },
          error: function(xhr, status, error) {
              alert(xhr.responseText); 
            } 

        });
    }
    </script>
    <script>
      $(document).on('click', '#close-preview', function(){ 

          $('.image-preview').popover('hide');
          // Hover befor close the preview
          $('.image-preview').hover(
              function () {
                 $('.image-preview').popover('show');
              }, 
               function () {
                 $('.image-preview').popover('hide');
              }
          );    
      });


      $(function() {
          // Create the close button
          var closebtn = $('<button/>', {
              type:"button",
              text: 'x',
              id: 'close-preview',
              style: 'font-size: initial;',
          });
          closebtn.attr("class","close pull-right");
          // Set the popover default content
          $('.image-preview').popover({
              trigger:'manual',
              html:true,
              title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
              content: "There's no image",
              placement:'bottom'
          });
          // Clear event
          $('.image-preview-clear').click(function(){
              $('.image-preview').attr("data-content","").popover('hide');
              $('.image-preview-filename').val("");
              $('.image-preview-clear').hide();
              $('.image-preview-input input:file').val("");
              $(".image-preview-input-title").text("Browse"); 
          }); 
          // Create the preview image
          $(".image-preview-input input:file").change(function (){     
              var img = $('<img/>', {
                  id: 'dynamic',
                  width:250,
                  height:200
              });      
              var file = this.files[0];
              var reader = new FileReader();
              // Set preview image into the popover data-content
              reader.onload = function (e) {
                  $(".image-preview-input-title").text("Change");
                  $(".image-preview-clear").show();
                  $(".image-preview-filename").val(file.name);            
                  img.attr('src', e.target.result);
                  $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
              }        
              reader.readAsDataURL(file);
          });  
      });
    </script>
    @stop