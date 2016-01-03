    @extends('Admin.template.admin_template')

    @section('content')

    <div class="col-xs-12 content-inside">
      <div class="row">
        <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Description</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Download</a></li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Options <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('admin/episode/update') }}/{{ $data->id }}">Update</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" type="submit" data-toggle="modal" data-target="#delete-form">Delete</a></li>
                    </ul>
                  </li>
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <h3>{{ $data->title }}</h3>
                    <br/>
                    <p>{{ $data->description }}</p>
                      <table id="table-episode" class="table table-bordered table-striped">
                        <tbody class="data-episode">
                          <tr align="center">
                            <td>
                              <div class="crop">
                                <img src="{{ $data->screenshot1 }}" class="images">
                              </div>
                            </td>
                            <td>
                              <div class="crop">
                                <img src="{{ $data->screenshot2 }}" class="images">
                              </div>
                            </td>
                            <td>
                              <div class="crop">
                                <img src="{{ $data->screenshot3 }}" class="images">
                              </div>
                            </td>
                            
                          </tr>
                        </tbody>
                      </table>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <a href="{{ url('admin/episode/buildDownload')}}/{{ $data->id }}"><button type="button" class="btn btn-primary">Download Manager</button></a>
                    <table id="table-episode" class="table table-bordered table-striped">
                        <thead>
                            <th>Hosting</th>
                            <th>480p</th>
                            <th>720p</th>
                            <th>Blue-Ray</th>
                            <th>Direct_Link</th>
                        </thead>
                        <tbody class="data-episode">
                          @foreach($download as $dl)
                          <tr align="center">
                            <td class="check">
                              @if (($dl->title)!=null)
                                  {{ $dl->title }}
                              @endif   
                            </td>
                            <td class="check">
                              @if (($dl->r480p)!=null)
                                  <span class="glyphicon glyphicon-ok"></span>
                              @else
                                  <span class="glyphicon glyphicon-remove"></span>
                              @endif   
                            </td>
                            <td class="check">
                              @if (($dl->r720p)!=null)
                                  <span class="glyphicon glyphicon-ok"></span>
                              @else
                                  <span class="glyphicon glyphicon-remove"></span>
                              @endif   
                            </td>
                            <td class="check">
                              @if (($dl->blueray)!=null)
                                  <span class="glyphicon glyphicon-ok"></span>
                              @else
                                  <span class="glyphicon glyphicon-remove"></span>
                              @endif   
                            </td>
                            <td class="check">
                              @if (($dl->direct_link)!=null)
                                  <span class="glyphicon glyphicon-ok"></span>
                              @else
                                  <span class="glyphicon glyphicon-remove"></span>
                              @endif   
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->   
        </div>
      </div>     
    </div>

    <div  class="example-modal">
      <div id="delete-form" class="modal modal-danger" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
         <form method="POST" action="{{ url('admin/episode/destroy') }}">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Confirmation Delete</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <input type="hidden" name="id" value="{{ $data->id }}">
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

    @stop