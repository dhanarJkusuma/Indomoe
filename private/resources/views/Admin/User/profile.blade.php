  @extends('Admin.template.admin_template')

  @section('content')
  <section class="content-header">
        <h1>
          User Profile
        </h1>
        
      </section>

      <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" id="dp" alt="User profile picture">
              <h3 class="profile-username text-center" ><p id="user_name">{{ Auth::user()->name }}</p></h3>
              <p class="text-muted text-center" id="user_role">{{ Auth::user()->hak_akses }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
           <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Profile Photo</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <form action="#" enctype="multipart/form-data" method="POST" id="change-dp">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label class="control-label " for="display_profile">Display Profile:</label>
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
                              <input type="file" name="dp"/> <!-- name input file -->
                          </div>
                      </span>
                    </div> 
                    <div class="box-footer">
                      <button type="submit" class="btn btn-info pull-right">Upload</button>
                    </div><!-- /.box-footer -->
                </div>
              </form>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->

        <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li><a href="#change-profile" data-toggle="tab">Edit Profile</a></li>
                  <li><a href="#change-password" data-toggle="tab">Change Password</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs">Read more</a>
                            <a class="btn btn-danger btn-xs">Delete</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-user bg-aqua"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                          <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-comments bg-yellow"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-camera bg-purple"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                    </ul>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="change-profile">
                    <form class="form-horizontal" id="change-bio" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group" id="nama_f">
                        <label for="inputName" class="col-sm-2 control-label" id="nama_l">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control inputName" name="name" id="inputName" placeholder="Name" value="{{ Auth::user()->name }}">
                        </div>
                      </div>
                      <div class="form-group" id="bio_f">
                        <label for="inputEmail" class="col-sm-2 control-label" id="bio_l">BIO</label>
                        <div class="col-sm-10">
                          <textarea class="form-control bio" name="bio" id="inputBIo" placeholder="Biography">{{ Auth::user()->description }}</textarea> 
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Edit</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="change-password">
                    <form class="form-horizontal" id="change-password_f">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control"  name="old_password" placeholder="Old Password">
                        </div>
                      </div>
                      <div class="form-group" id="ch-pss">
                        <label for="inputEmail"  class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group" id="ch-pss-c">
                        <label for="inputName" class="col-sm-2 control-label">Password Confirmation</label>
                        <div class="col-sm-10">
                          <input type="password"  class="form-control" id="password_confirmation" placeholder="Password Confirmation">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Change Password</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
      </div>
      <div class="example-modal">
        <div id="notif-form" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <form id="category-form_update" class="form-horizontal" method="POST">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Password Notification</h4>
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
          </form>
        </div><!-- /.modal -->
    </div><!-- /.example-modal -->
  </section>
  <script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    
  <script>

    $(document).ready(function(){
       $('#notif-form').modal('hide');
        setDP("{{ Auth::user()->image }}");
        $(".image-preview-filename").val(""); 
    });

    $('#change-bio').on("submit",function(e){
       e.preventDefault();
      saveBIO('#change-bio');
      return false;
    });

    $("#change-dp").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        saveDisplayProfile(formData);    
        return false;
    });

    $("#change-password_f").on("submit", function(e){
        e.preventDefault();
        var password = $('#password').val();
        var password_confirmation = $('#password_confirmation').val();
        if(password==password_confirmation)
        {
          changePassword('#change-password_f');
          $('#ch-pss-c').removeClass('has-error');
          $('#ch-pss').removeClass('has-error');
        }
        else
        {
          $('#ch-pss-c').addClass('has-error');
          $('#ch-pss').addClass('has-error');
        }
        return false;
    });

    function saveDisplayProfile(form)
    {
        var CSRF_TOKEN = $('#token').val();                    

        $.ajax({
          url: "{{ url('admin/profile/display') }}",
          type: "POST",
          async: false,
          cache: false,
          contentType: false,
          processData: false,
          data: form,
          success: function() {
             setDP("{{ Auth::user()->image }}")
         },
          error: function(xhr, status, error) {
            alert(xhr.responseText);
          } 
      });
    }

    function setDP(sourceImage)
    {
        document.getElementById("dp").src = sourceImage;
    }

    function saveBIO(form)
    {
      $.ajax({
          url: "{{ url('admin/profile/bio') }}",
          type: "POST",
          async: false,
          data: $(form).serialize(),
          success: function() {
            $('#nama_f').addClass("has-success");
            $('#bio_f').addClass("has-success");
            $('#nama_l').html("Nama <i class=\"fa fa-check\"></i>");
            $('#bio_l').html("Bio <i class=\"fa fa-check\"></i>");
            $('#user_name').text($('#inputName').val());
         },
          error: function(xhr, status, error) {
            alert(xhr.responseText);
          } 
      });
    }

    function changePassword(form)
    {

      $('#notif-form').removeClass('modal-success');
      $('#notif-form').removeClass('modal-danger');
      $.ajax({
          url: "{{ url('admin/profile/cpass') }}",
          type: "POST",
          async: false,
          data: $(form).serialize(),
          success: function(s) {
            if(s==1)
            {
              $('#notif').text('Password Changed');
              $('#notif-form').addClass('modal-success');
              $('#notif-form').modal('show');
            }
            else
            {
              $('#notif').text('Wrong Old Password !');
              $('#notif-form').addClass('modal-danger');
              $('#notif-form').modal('show');
            }
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