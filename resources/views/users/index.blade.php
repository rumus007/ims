@extends('separations.master')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        Users
                    </div>
                </div>
                <div class="page-title-actions">
                    @permission('add_users')
                    <div>
                        <a href="{{route('users.create')}}" class="btn-shadow btn btn-info">Add New User</a>
                    </div>
                    @endpermission
                </div>
            </div>
        </div>
        <div class="row">
            {{--All content Over here--}}
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">User Details</h5>
                        <table class="mb-0 table table-borderless" id="datatable">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($users as $key => $value)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$value['name']}}</td>
                                <td>{{$value['email']}}</td>
                                <?php
                                    $user = DB::table('users')->where('id',$value->id)->first();
//                                    $roles = DB::table('role_user')->where('id',$user->id)->get();
                                ?>
                                <td></td>
                                <td>
                                    <form>
                                        @permission('edit_users')
                                        <button type="submit" formaction="{{route('users.edit', $value->id)}}" class="mb-2 mr-2 border-0 btn-transition btn btn-sm btn-outline-primary" title="Edit"><i class="fa fa-edit"></i></button>
                                        @endpermission
                                        @permission('delete_users')
                                        <button  type="submit" formaction="{{route('users.destroy', $value->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="mb-2 mr-2 border-0 btn-transition btn btn-sm btn-outline-danger" title="Delete"><i class="fa fa-trash"></i></button>
                                        @endpermission
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection