@extends('separations.master')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div>
                    Create New Category
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{--All content Over here--}}
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form id="category-form" class="" method="POST" action="#">
                        {{csrf_field()}}
                        <div class="position-relative row form-group"><label for="name" class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                                <input name="name" id="name" placeholder="Enter name" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label for="name" class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                                <input name="name" id="name" placeholder="Enter name" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label for="name" class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                                <input name="name" id="name" placeholder="Enter name" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label for="name" class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                                <input name="name" id="name" placeholder="Enter name" type="text" class="form-control" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection