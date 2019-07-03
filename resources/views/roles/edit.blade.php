@extends('separations.master')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        Edit Role
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{--All content Over here--}}
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form class="" id="my-form" method="post" action="{{route('roles.update', $data->id)}}">
                            {{csrf_field()}}
                            <div class="position-relative row form-group"><label for="roleName" class="col-sm-2 col-form-label">Role Name</label>
                                <div class="col-sm-10"><input name="name" id="roleName" placeholder="Enter the role name" type="text" class="form-control" value="{{$data['name']}}"></div>
                            </div>
                            <div class="position-relative row form-group"><label for="displayName" class="col-sm-2 col-form-label">Display Name</label>
                                <div class="col-sm-10"><input name="display_name" id="displayName" placeholder="Enter the display name here" type="text" class="form-control" value="{{$data['display_name']}}"></div>
                            </div>
                            <div class="position-relative row form-group"><label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10"><input name="description" id="description" placeholder="Enter description of role here here" type="text" class="form-control" value="{{$data['description']}}"></div>
                            </div>
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Permissions</h5>
                                        <table class="mb-0 table table-sm">
                                            <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>View Permissions</th>
                                                <th>Add Permissions</th>
                                                <th>Edit Permissions</th>
                                                <th>Delete Permissions</th>
                                                <th>Manage Permissions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @for($i = 0; $i < $count; $i++)
                                                <tr>
                                                    <th scope="row">{{$i + 1}}</th>
                                                    @for($j = 0; $j <=4; $j++)
                                                        <td><input type="checkbox" name="roles[]" id="checkbox-{{$permissions[5 * $i + $j]['id']}}" value="{{$permissions[5 * $i + $j]['id']}}" @if(in_array($permissions[5 * $i + $j]['id'],$perms)) checked @endif><label for="checkbox-{{$permissions[5 * $i + $j]['id']}}">{{$permissions[5 * $i + $j]['display_name']}}</label></td>
                                                    @endfor
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-outline-success" type="submit">Submit</button>
                                    <a class="btn btn-outline-danger" href="{{route('roles.index')}}">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\RoleRequest', '#my-form'); !!}
@endsection