  @if (Auth::check())
    @extends('Admin.template.admin_template')

    @section('content')

    <div class="col-xs-12 content-inside">
    <div class="row">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">User Registering...</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form id="category-form" action="{{ url('admin/user/build') }}" class="form-horizontal" method="POST">
          <div class="box-body">
           {!! csrf_field() !!}
            <div class="form-group">
              <label for="category" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
              </div>
            </div>
            <div class="form-group">
              <label for="category" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="category" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="role" class="col-sm-2 control-label">Role</label>
              <div class="col-sm-10">
                <select class="form-control" id="role" name="role">
                  <option value="superadmin">SuperAdmin</option>
                  <option value="admin">Admin</option>
                </select>
              </div>
            </div>
          </div><!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Create</button>
          </div><!-- /.box-footer -->
        </form>
      </div><!-- /.box -->
    </div>
    </div>
    <script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>  
    @stop

  @else
    @extends('errors.template_error')
    <h1>NOT Auth... GO out!</h1>
  
  @endif
