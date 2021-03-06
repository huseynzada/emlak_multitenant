@extends('admin.masterpage')

@section('content')
    @include('admin.error')
    @if( \App\Library\MyHelper::has_priv('users', \App\Library\MyClass::PRIV_CAN_ADD) )
        <a href="{{ route('user_add_edit',['user' => 0]) }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>
    @endif

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>İstifadəçilər</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="get" action="" class="formFinder">
                        <table class="table table-striped formFinder">
                            <thead>
                                <tr>
                                    <th width="40px">#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Login</th>
                                    <th>Group</th>
                                    @if( Auth::user()->group->super_admin == 1 )
                                        <th>Tenant</th>
                                    @endif
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><input class="form-control formFind" name="fullname" value="{{ $request->get("fullname") }}" placeholder="Full Name"></th>
                                    <th><input class="form-control formFind" name="email" value="{{ $request->get("email") }}" placeholder="Email"></th>
                                    <th><input class="form-control formFind" name="login" value="{{ $request->get("login") }}" placeholder="Login"></th>
                                    <th>
                                        <select class="form-control formFind" name="group_id">
                                            <option></option>
                                            @foreach (\App\Models\Group::realData()->get() as $type)
                                                <option value="{{ $type['id'] }}" {{ $type['id'] == $request->get("group_id") ? 'selected':'' }}> {{ $type['group_name'] }} </option>
                                            @endforeach
                                        </select>
                                    </th>
                                    @if( Auth::user()->group->super_admin == 1 )
                                        <th>
                                            <select class="form-control formFind" name="tenant">
                                                <option></option>
                                                @foreach (\App\Models\Tenant::realTenants()->get() as $type)
                                                    <option value="{{ $type['id'] }}" {{ $type['id'] == $request->get("tenant") ? 'selected':'' }}> {{ $type['company_name'] }} </option>
                                                @endforeach
                                            </select>
                                        </th>
                                    @endif
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Users as $user)
                                    <tr>
                                        <td>{{ $Users->perPage() * ($Users->currentPage() - 1) + $loop->iteration }}</td>
                                        <td>{{ $user->fullname() }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->login }}</td>
                                        <td>{{ $user->group->group_name }}</td>
                                        @if( Auth::user()->group->super_admin == 1 )
                                            <td>{{ $user->tenant->company_name }}</td>
                                        @endif
                                        <th>
                                            @if( $user->group->super_admin != 1 && \App\Library\MyHelper::has_priv('users', \App\Library\MyClass::PRIV_CAN_ADD))
                                                <a style="width:25px;" href="{{ route('user_add_edit',['user' => $user->id]) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if( Auth::user()->id != $user->id && $user->group->super_admin != 1 && \App\Library\MyHelper::has_priv('users', \App\Library\MyClass::PRIV_CAN_ADD))
                                                <a style="width:25px;" href="{{ route('user_delete',['user' => $user->id]) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs deleteAction"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $Users->appends($request->except('page'))->links('admin.pagination', ['paginator' => $Users]) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    {{--  bootstrap-wysiwyg --}}
    {!! Html::style('admin/assets/vendors/jquery-confirm-master/css/jquery-confirm.css') !!}
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}
@endsection