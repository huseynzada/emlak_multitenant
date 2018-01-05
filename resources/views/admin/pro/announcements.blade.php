@extends('admin.masterpage')



@section('content')

    @include('admin.error')



    <a href="{{ route('announcement_insert',['announcement' => 0]) }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>



    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">

                <div class="x_title">

                    <h2>Elanlar</h2>

                    <ul class="nav navbar-right panel_toolbox">

                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                    </ul>

                    <div class="clearfix"></div>

                </div>

                <div class="x_content">

                    <form method="get" action="" class="formFinder">

                        <input type="hidden" name="page" value="{{ $request->get("page",1) }}">

                        <table class="table table-striped">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Başlıq</th>

                                    <th>Content</th>

                                    <th>Tipi</th>

                                    <th>Qiymət</th>

                                    <th>Tarix</th>

                                    <th>Əlavə edən</th>

                                    <th>Əməliyyatlar</th>

                                </tr>

                            </thead>

                            <thead>

                                <tr>

                                    <th></th>

                                    <th><input class="form-control formFind" name="header" value="{{ $request->get("header") }}" placeholder="Başlıq"></th>

                                    <th><input class="form-control formFind" name="content" value="{{ $request->get("content") }}" placeholder="Content"></th>

                                    <th><input class="form-control formFind" name="type" value="{{ $request->get("type") }}" placeholder="Tipi"></th>

                                    <th><input class="form-control formFind" name="amount" value="{{ $request->get("amount") }}" placeholder="Qiymət"></th>

                                    <th><input class="form-control formFind" name="date" value="{{ $request->get("date") }}" placeholder="Tarix"></th>

                                    <th><input class="form-control formFind" name="user" value="{{ $request->get("user") }}" placeholder="Əlavə edən"></th>

                                    <th></th>

                                    <th></th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($announcements as $announcement )

                                    <!-- <tr style="{{ $announcement->buldingType==2?'background-color:#9fd4ef':'background-color:red' }}"> -->

                                        <tr>

                                        <td>{{ $announcements->perPage() * ($announcements->currentPage() - 1) + $loop->iteration }}</td>

                                        <td>{{ $announcement->header }}</td>

                                        <td>{{ $announcement->getShortContent() }}</td>

                                        <td>{{ $announcement->getAnnouncementType() }}</td>

                                        <td>{{ $announcement->amount }}</td>

                                        <td>{{ App\Library\Date::d($announcement->created_date,'d-m-Y') }}</td>

                                        <td>{{ $announcement->author->fullname() }}</td>

                                        <th>

                                            <a href="{{ route('announcement_insert',['announcement'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>

                                            <a href="{{ route('announcement_pro_info',['announcement'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="İnfo" class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i></a>

                                            <a href="{{ route('announcement_pro_delete',['announcement'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs deleteAction"><i class="fa fa-trash"></i></a>

                                        </th>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </form>

                    <div class="row">

                        <div class="col-md-12 text-center">

                            {{ $announcements->links('admin.pagination', ['paginator' => $announcements]) }}

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