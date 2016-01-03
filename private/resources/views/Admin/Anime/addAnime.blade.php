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
                  Anime successfully added.
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
          <h3 class="box-title">Add New Anime</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form method="POST" enctype="multipart/form-data" id="anime-add" action="#" >
            <!-- text input -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
            <!-- textarea -->
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control"  id="desc" rows="3" name="description" placeholder="Anime Description"></textarea>
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

            <div class="form-group">
              <label class="control-label " for="anime_cover">Anime Cover:</label>
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
            <div class="col-md-6 col-md-offset-3">
              <button type="submit" class="btn btn-primary btn-block">Add New</button>
            </div>

          </form>
        </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>
    <script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.core.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.plugin.ajax.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.plugin.autocomplete.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.plugin.filter.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/textext/js/textext.plugin.tags.js') }}"></script>
    <script type = "text/javascript">
        $(document).ready(function(){
            $('.category').select2();
            getCategory();
            $('#success-dialog').modal('hide');
        });
    </script>
    <script>

        $('#anime-add').on('submit',function(event){
          event.preventDefault();
          $('#fix-category').val($('#category').val());
          var season = $('#season').val() + " " + $('#year').val();
          $('#anime_season').val(season);
  
          var formData = new FormData($(this)[0]);

          saveAnime(formData);          
          
          return false;
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

      function saveAnime(form)
      {
                
          $.ajax({
            url: "{{ url('admin/anime/addAnime') }}",
            type: "POST",
            data: form,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(s) {
              $('#success-dialog').modal('show');
              resetField();
           },
           error: function(xhr, status, error) {
           $('#desc').val(xhr.responseText);
            } 

        });
      }

      function resetField()
      {
        $('#title').val('');
        $('#category').val('');
        $('#desc').val('');
        $('#studio').val('');
        $('#rating').val('');
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