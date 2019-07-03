@extends('backend.layouts.app')


@section ('title', 'Menu Management')

@section('page-header')
<h1>
  Menu Management
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">
    Menu Management 
  </li>
  
</ol>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 menu-page">  
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Menu
            <!-- <label for="file" class="control-lable">Upload Featured Image</label> -->
          </h3>
          <div class="pull-right">
            <a href="#newModal" class="btn btn-primary pull-right" data-toggle="modal"><i class="fa fa-plus-circle"></i>Add New Menu</a>
          </div><!-- /.box-tools -->
        </div>
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
    <div class="col-md-4">
      <div class="well">
        <p>Drag items to move them in a different order</p>
      </div>
    </div>
  </div>

  <!-- Create new item Modal -->
   <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
        {!! Form::open(array('url'=>'admin/menus/new','class'=>'form-horizontal','role'=>'form','files' => true, 'method' => 'post')) !!}
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
               {!!  Form::select('menu_position', array('top' => 'Top', 'bottom' => 'Top Bottom','footerbottom' => 'Footer Bottom'), null, array('class' => 'form-control'))!!}
                
              </div>
          </div>
          <div class="form-group">
              <label for="url" class="col-lg-4 control-label">Login (Before/ After)</label>
              <div class="col-lg-8">
               {!!  Form::select('login_condition', array('1' => 'Before', '2' => 'After'), null, array('class' => 'form-control'))!!}
              </div>
          </div>
            <div class="form-group">
                <label for="url" class="col-lg-4 control-label">Icon Class <a href="http://fontawesome.io" target="_blank">Click</a></label>
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
   </div><!-- /.modal -->
@stop

