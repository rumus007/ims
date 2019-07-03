@extends('separations.master')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        Roles
                    </div>
                </div>
                <div class="page-title-actions">
                    @permission('add_roles')
                    <div>
                        <a href="{{route('roles.create')}}" class="btn-shadow btn btn-info">Add New Role</a>
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
                                <th>Role Name</th>
                                <th>Role Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($roles as $key => $value)
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$value['display_name']}}</td>
                                    <td>{{$value['description']}}</td>
                                    <td>
                                        <form>
                                            @permission('edit_roles')
                                            <button @if($value['name'] == 'Admin') disabled @endif type="submit"
                                                    formaction="{{route('roles.edit', $value->id)}}"
                                                    class="mb-2 mr-2 border-0 btn-transition btn btn-sm btn-outline-primary"
                                                    title="Edit"><i class="fa fa-edit"></i></button>
                                            @endpermission
                                            @permission('delete_roles')
                                            <button @if($value['name'] == 'Admin') disabled @endif type="submit"
                                                    formaction="{{route('roles.destroy', $value->id)}}"
                                                    onclick="return confirm('Are you sure you want to delete?')"
                                                    class="mb-2 mr-2 border-0 btn-transition btn btn-sm btn-outline-danger"
                                                    title="Delete"><i class="fa fa-trash"></i></button>
                                            @endpermission
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
@endsection