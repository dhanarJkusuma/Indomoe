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
          <h3 class="box-title">Add New Episode</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form method="POST" enctype="multipart/form-data" id="episode-add" action="{{ url('admin/episode/update') }}/{{ $data->id }}" >
            <!-- text input -->
            <div class="form-group">
                <div class="form-group">
                    <label>Anime Title</label>
                    <select class="form-control select2 anime" name="id_anime" style="width: 100%;padding-bottom:10px;">

                      @foreach($anime as $t)
                        <option value="{{ $t->id }}">{{ $t->title }}</option>
                      @endforeach
                    
                    </select>
                  </div>
              
            </div>
            
            <div class="form-group">
              <label>Title Post</label>
              <input type="text" id="title_post" class="form-control" name="title" placeholder="Title Post" value="{{ $data->title }}">
            </div>

            <!-- textarea -->
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control"  id="desc" rows="3" name="description"  placeholder="Anime Description">{{ $data->description }}</textarea>
            </div>
            
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
                          <input type="file" id="cover" name="image1" value="{{ $data->screenshot1 }}" /> <!-- name input file -->
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

            
            <div class="col-md-6 col-md-offset-3">
              <button type="submit" class="btn btn-primary btn-block">Change Episode</button>
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
            $("#id_anime").val("{{ $data->id_anime }}");
            $(".anime").select2();
            $(".image-preview-filename1").val("");   
            $(".image-preview-filename2").val("");   
            $(".image-preview-filename3").val("");   
        });
    </script>
    <script>
        $(document).on('click', '#close-preview1', function(){ 

              $('.image-preview1').popover('hide');
              // Hover befor close the preview
              $('.image-preview1').hover(
                  function () {
                     $('.image-preview1').popover('show');
                  }, 
                   function () {
                     $('.image-preview1').popover('hide');
                  }
              );    
          });

        $(function() {
              // Create the close button
              var closebtn = $('<button/>', {
                  type:"button",
                  text: 'x',
                  id: 'close-preview1',
                  style: 'font-size: initial;',
              });
              closebtn.attr("class","close pull-right");
              // Set the popover default content
              $('.image-preview1').popover({
                  trigger:'manual',
                  html:true,
                  title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
                  content: "There's no image",
                  placement:'bottom'
              });
              // Clear event
              $('.image-preview-clear1').click(function(){
                  $('.image-preview1').attr("data-content","").popover('hide');
                  $('.image-preview-filename1').val("");
                  $('.image-preview-clear1').hide();
                  $('.image-preview-input1 input:file').val("");
                  $(".image-preview-input-title1").text("Browse"); 
              }); 
              // Create the preview image
              $(".image-preview-input1 input:file").change(function (){     
                  var img = $('<img/>', {
                      id: 'dynamic',
                      width:250,
                      height:200
                  });      
                  var file = this.files[0];
                  var reader = new FileReader();
                  // Set preview image into the popover data-content
                  reader.onload = function (e) {
                      $(".image-preview-input-title1").text("Change");
                      $(".image-preview-clear1").show();
                      $(".image-preview-filename1").val(file.name);            
                      img.attr('src', e.target.result);
                      $(".image-preview1").attr("data-content",$(img)[0].outerHTML).popover("show");
                  }        
                  reader.readAsDataURL(file);
                 });  
              });
    </script>

    <script>
      $(document).on('click', '#close-preview2', function(){ 

              $('.image-preview2').popover('hide');
              // Hover befor close the preview
              $('.image-preview2').hover(
                  function () {
                     $('.image-preview2').popover('show');
                  }, 
                   function () {
                     $('.image-preview2').popover('hide');
                  }
              );    
          });

        $(function() {
              // Create the close button
              var closebtn = $('<button/>', {
                  type:"button",
                  text: 'x',
                  id: 'close-preview2',
                  style: 'font-size: initial;',
              });
              closebtn.attr("class","close pull-right");
              // Set the popover default content
              $('.image-preview2').popover({
                  trigger:'manual',
                  html:true,
                  title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
                  content: "There's no image",
                  placement:'bottom'
              });
              // Clear event
              $('.image-preview-clear2').click(function(){
                  $('.image-preview2').attr("data-content","").popover('hide');
                  $('.image-preview-filename2').val("");
                  $('.image-preview-clear2').hide();
                  $('.image-preview-input2 input:file').val("");
                  $(".image-preview-input-title2").text("Browse"); 
              }); 
              // Create the preview image
              $(".image-preview-input2 input:file").change(function (){     
                  var img = $('<img/>', {
                      id: 'dynamic',
                      width:250,
                      height:200
                  });      
                  var file = this.files[0];
                  var reader = new FileReader();
                  // Set preview image into the popover data-content
                  reader.onload = function (e) {
                      $(".image-preview-input-title2").text("Change");
                      $(".image-preview-clear2").show();
                      $(".image-preview-filename2").val(file.name);            
                      img.attr('src', e.target.result);
                      $(".image-preview2").attr("data-content",$(img)[0].outerHTML).popover("show");
                  }        
                  reader.readAsDataURL(file);
                 });  
              });
    </script>
    <script>
      $(document).on('click', '#close-preview3', function(){ 

              $('.image-preview3').popover('hide');
              // Hover befor close the preview
              $('.image-preview3').hover(
                  function () {
                     $('.image-preview3').popover('show');
                  }, 
                   function () {
                     $('.image-preview3').popover('hide');
                  }
              );    
          });

        $(function() {
              // Create the close button
              var closebtn = $('<button/>', {
                  type:"button",
                  text: 'x',
                  id: 'close-preview3',
                  style: 'font-size: initial;',
              });
              closebtn.attr("class","close pull-right");
              // Set the popover default content
              $('.image-preview3').popover({
                  trigger:'manual',
                  html:true,
                  title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
                  content: "There's no image",
                  placement:'bottom'
              });
              // Clear event
              $('.image-preview-clear3').click(function(){
                  $('.image-preview3').attr("data-content","").popover('hide');
                  $('.image-preview-filename3').val("");
                  $('.image-preview-clear3').hide();
                  $('.image-preview-input3 input:file').val("");
                  $(".image-preview-input-title3").text("Browse"); 
              }); 
              // Create the preview image
              $(".image-preview-input3 input:file").change(function (){     
                  var img = $('<img/>', {
                      id: 'dynamic',
                      width:250,
                      height:200
                  });      
                  var file = this.files[0];
                  var reader = new FileReader();
                  // Set preview image into the popover data-content
                  reader.onload = function (e) {
                      $(".image-preview-input-title3").text("Change");
                      $(".image-preview-clear3").show();
                      $(".image-preview-filename3").val(file.name);            
                      img.attr('src', e.target.result);
                      $(".image-preview3").attr("data-content",$(img)[0].outerHTML).popover("show");
                  }        
                  reader.readAsDataURL(file);
                 });  
              });
    </script>
   
    @stop