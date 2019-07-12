@extends('separations.master')
@section('content')
<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div>
          Category Management
        </div>
      </div>
      @permission('add_categories')
      <div class="page-title-actions">
        <div>
        <a href="{{route('menu.create')}}" class="btn-shadow btn btn-info">Add New Category</a>
        </div>
      </div>
      @endpermission
    </div>
  </div>
  <div class="row">
    {{--All content Over here--}}
    <div class="col-lg-12">
      <div class="main-card mb-3 card">
        <div class="card-body">
          <h5 class="card-title">Category Details</h5>
          <p>Drag items to move them in a different order</p>
          <div class="box-body">
              <div class="dd" id="nestable">
                {!! $menu !!}
              </div>
              <p id="success-indicator" style="display:none; margin-right: 10px;">
                <span class="glyphicon glyphicon-ok"></span> Menu order has been saved
              </p>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Create new item Modal -->
{{-- <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {!! Form::open(array('url'=>'admin/menus/new','class'=>'form-horizontal','role'=>'form','files' => true, 'method'
      => 'post')) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Provide details of the new menu item</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="title" class="col-lg-4 control-label">Title</label>
          <div class="col-lg-8">
            {!! Form::text('title',null,array('class'=>'form-control')) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="label" class="col-lg-4 control-label">Label</label>
          <div class="col-lg-8">
            {!! Form::text('label',null,array('class'=>'form-control')) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="url" class="col-lg-4 control-label">URL</label>
          <div class="col-lg-8">
            {!! Form::text('url',null,array('class'=>'form-control')) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="url" class="col-lg-4 control-label">Position</label>
          <div class="col-lg-8">
            {!! Form::select('menu_position', array('top' => 'Top', 'bottom' => 'Top Bottom','footerbottom' => 'Footer
            Bottom'), null, array('class' => 'form-control'))!!}

          </div>
        </div>
        <div class="form-group">
          <label for="url" class="col-lg-4 control-label">Login (Before/ After)</label>
          <div class="col-lg-8">
            {!! Form::select('login_condition', array('1' => 'Before', '2' => 'After'), null, array('class' =>
            'form-control'))!!}
          </div>
        </div>
        <div class="form-group">
          <label for="url" class="col-lg-4 control-label">Icon Class <a href="http://fontawesome.io"
              target="_blank">Click</a></label>
          <div class="col-lg-8">
            {!! Form::text('icon',null,array('class'=>'form-control','placeholder' =>'fa-user')) !!}
            <!-- {!! Form::file('icon',null,array('class'=>'form-control')) !!} -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
      {!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Delete item Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {!! Form::open(array('url'=>'admin/menus/delete')) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <!-- <h4 class="modal-title">Provide details of the new menu item</h4> -->
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this menu item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <input type="hidden" name="delete_id" id="postvalue" value="" />
        <input type="submit" class="btn btn-danger" value="Delete Item" />
      </div>
      {!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> --}}
@stop