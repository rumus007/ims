@extends('backend.layouts.app')

@section('content')
 <h1>Add Menu Title</h1>
    {!! Form::open(['route' => "admin.menus.create", 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post','files' => true]) !!}
      <div class="form-group">
            {!! Form::label('', 'Dropdown', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-4">


              <select id="user_id" class="form-control" name="user_id">
            
           
            <option value="">parent_id</option>
  
        <option value="">Home exmpl</option>
  
</select>

            </div>
        </div><!--form control-->
        <div class="form-group">
            {!! Form::label('name', 'Title', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-4">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            </div>
        </div>
      

        <div class="well">
            <div class="pull-left">
                <a href='#' class="btn btn-danger btn-sm">{{ trans('strings.cancel_button') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-sm" value="{{ trans('strings.save_button') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!--well-->

    {!! Form::close() !!}

    <div class="clearfix"></div>
@stop