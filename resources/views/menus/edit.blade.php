@extends('separations.master')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div>
                    Edit Category
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{--All content Over here--}}
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
				<form id="category-form" class="" method="POST" action="{{route('menu.update',$item->id)}}">
                        {{csrf_field()}}
                        <div class="position-relative row form-group"><label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
							<input name="title" id="title" placeholder="Enter title" type="text" class="form-control" required value="{{$item->title}}">
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label for="label" class="col-sm-2 col-form-label">Label</label>
                            <div class="col-sm-10">
                                <input name="label" id="label" placeholder="Enter label name" type="text" class="form-control" required value="{{$item->label}}">
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label for="order" class="col-sm-2 col-form-label">Order</label>
                            <div class="col-sm-10">
                                <input name="order" id="order" placeholder="Enter order" type="number" class="form-control" required value="{{$item->order}}">
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label for="position" class="col-sm-2 col-form-label">Position</label>
                            <div class="col-sm-10">
                                <input name="menu_position" id="position" placeholder="Enter position" type="text" class="form-control" required value="{{$item->menu_position}}">
                            </div>
                        </div>
                        <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-outline-success" type="submit">Submit</button>
                                    <a class="btn btn-outline-danger" href="{{route('menu.index')}}">Cancel</a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection