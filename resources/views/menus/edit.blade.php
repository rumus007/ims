@extends('backend.layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8">  
      <div class="well">
        <p class="lead"><a href="{{ url('admin/menus')}}" class="btn btn-default pull-right">Go Back</a> Menu</p>
		
		{!! Form::model($item, array('url' => "admin/menus/edit/{$item->id}", 'class' => 'form-horizontal','files' => true)) !!}
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
		     
               {!!  Form::select('menu_position', array('top' => 'Top', 'bottom' => 'Bottom','footerbottom' => 'Footer Bottom'), null, array('class' => 'form-control'))!!}
		    </div>
		</div>
		<div class="form-group">
              <label for="url" class="col-lg-4 control-label">Login (Before/ After)</label>
              <div class="col-lg-8">
                <!-- {!! Form::text('url',null,array('class'=>'form-control')) !!} -->
               {!!  Form::select('login_condition', array('1' => 'Before', '2' => 'After'), null, array('class' => 'form-control'))!!}
                
              </div>
          </div>
		<div class="form-group">
		    <label for="url" class="col-lg-4 control-label">Icon Class <a href="http://fontawesome.io" target="_blank">Click</a></label>
		    <div class="col-lg-8">
		      <!-- {!! Form::file('icon',null,array('class'=>'form-control')) !!} -->
		       {!! Form::text('icon',null,array('class'=>'form-control','placeholder' =>'fa-user')) !!}

		    </div>
		</div>
		<div class="form-group">
		    <div class="col-md-6 col-md-offset-6 text-right">
		      <button type="submit" class="btn btn-lg btn-default">Update item</button>
		    </div>
		</div>
		{!! Form::close() !!}
      </div>
    </div>
    
  </div>
@stop

