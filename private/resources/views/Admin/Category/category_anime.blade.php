    @extends('Admin.template.admin_template')

    @section('content')

    <div class="col-xs-12 content-inside">
    <div class="row">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Input Category</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form id="category-form" enctype="multipart/form-data" class="form-horizontal" method="POST">
          <div class="box-body">
            <div class="form-group">
              <label for="category" class="col-sm-2 control-label">Category</label>
              <div class="col-sm-10">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control" name="category" id="category" placeholder="Category">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="anime_cover">Category Cover: (Diutamakan 16:9) [Landscape] </label>
              <div class="col-sm-10">
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
                          <input type="file" id="cover" name="cover"/> <!-- name input file -->
                      </div>
                  </span>
                </div>
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
                  <th>Cover</th>
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
        <form id="category-form_update" enctype="multipart/form-data" class="form-horizontal" method="POST">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Category</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                    <div class="box-body">
                      <div class="form-group">
                        <input type="hidden" id="id-edit">
                        <label for="category" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="text" class="form-control" name="category" id="category-edit" placeholder="Category">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="anime_cover">Category Cover:</label>
                        <div class="col-sm-10">
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
                                    <input type="file" id="cover_edit" name="image1"/> <!-- name input file -->
                                </div>
                            </span>
                          </div>
                        </div> 
                      </div>
                    </div><!-- /.box-body -->
                  </form>
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
    <script>$(document).on('click', '#close-preview1', function(){ 

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

    </script>
    <script type="text/javascript">
    $(document).ready(function(e){
        //getCategory();
        $(".image-preview-filename").val("");
        $(".image-preview-filename1").val("");   
          
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
            { "data": "cover" },
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
          var formData = new FormData($(this)[0]);
          saveCategory(formData,tableCat);    
          return false;
        });

        $("#category-form_update").on("submit",function(){
          var id_cat = $('#id-edit').val();
          var formData = new FormData($(this)[0]);
          updateCategory(formData,id_cat,tableCat);
          return false;
        });
    });
 

    function saveCategory(form,table)
    {

        $.ajax({
          url: "{{ url('admin/category/add') }}",
          type: "POST",
          async:false,
          processData: false,
          contentType: false,
          data: form,
          success: function() {
              $('#category').val('');
              $(".image-preview-filename").val("");   
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
      var csrf = $('#token-delete').val();
      $.ajax({
        url: "{{ url('admin/category/get') }}",
        type: "POST",
        async:false,
        data: { id : id_cat , _token : csrf },
        success: function(result)
        {
          $('#id-edit').val(result.id);
          $('#category-edit').val(result.category);
          $('#cover_edit').value = result.cover;
        }
      });
    }

    function updateCategory(form,id_cat,table)
    {
      var update_url = "{{ url('admin/category/update') }}/" + id_cat;
      $.ajax({
          url: update_url,
          type: "POST",
          async:false,
          processData: false,
          contentType: false,
          data: form,
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