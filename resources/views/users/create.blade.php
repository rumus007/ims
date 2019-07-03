@extends('separations.master')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        Create User
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{--All content Over here--}}
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form id="user-form" class="" method="POST" action="{{route('users.store')}}">
                        {{csrf_field()}}
                            <div class="position-relative row form-group"><label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input name="name" id="name" placeholder="Enter name" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="position-relative row form-group"><label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" id="email" placeholder="Enter Valid Email" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="position-relative row form-group"><label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input name="password" id="password" placeholder="Enter Password" type="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="position-relative row form-group"><label for="roles" class="col-sm-2 col-form-label">Roles</label>
                                <div class="col-sm-10">
                                        @foreach($roles as $key => $value)
                                        <div class="position-relative form-check form-check-inline">
                                            <label for="checkbox-{{$value['id']}}" class="form-check-label">
                                                <input type="checkbox" class="form-check-input" id="checkbox-{{$value['id']}}" value="{{$value['id']}}" name="roles[]">
                                                {{$value['display_name']}}
                                            </label>
                                        </div>
                                        @endforeach
                                </div>
                            </div>
                            <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-outline-success" type="submit">Submit</button>
                                    <a class="btn btn-outline-danger" href="{{route('users.index')}}">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--@section('scripts')--}}
    {{--{!! JsValidator::formRequest('App\Http\Requests\UserRequest', '#user-form'); !!}--}}
{{--@endsection--}}