@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')

   <!--  @if( \App\Library\MyHelper::has_priv('tenant', \App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD) )
        <a href="{{ route('tenant_add_edit',['tenant' => 0]) }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>
    @endif -->

     
             


    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add_to_queue</i>
              </div>
              <h4 class="card-title">Şirkətlər</h4>
            </div>
              <div class="card-body">
                  <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">

                  <div id="datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row"><div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="datatables_length"><label class="form-group">Göstər <select name="datatables_length" aria-controls="datatables" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="-1">Bütün</option></select> sıra</label></div></div><div class="col-sm-12 col-md-6"><div id="datatables_filter" class="dataTables_filter"><label class="form-group bmd-form-group bmd-form-group-sm"><input type="search" class="form-control form-control-sm" placeholder="Axtarış qeydləri" aria-controls="datatables"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                      <thead>
                          <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 152px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">ID</th>
                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 152px;" aria-label="Position: activate to sort column ascending">Şirkətin adı</th>
                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 153px;" aria-label="Office: activate to sort column ascending">Tipi</th>
                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 153px;" aria-label="Age: activate to sort column ascending">Yaranma vaxtı</th>
                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 153px;" aria-label="Date: activate to sort column ascending">Bitmə vaxtı</th>
                            <th class="disabled-sorting text-right sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 153px;" aria-label="Actions: activate to sort column ascending">Tədbirlər</th>
                        </tr>
                      </thead>
                      <tfoot>
                          <tr><th rowspan="1" colspan="1">ID</th><th rowspan="1" colspan="1">Şirkətin adı</th><th rowspan="1" colspan="1">Tipi</th><th rowspan="1" colspan="1">Yaranma vaxtı</th><th rowspan="1" colspan="1">Bitmə vaxtı</th><th class="text-right" rowspan="1" colspan="1">Tədbirlər</th></tr>
                      </tfoot>
                      <tbody>          
                       @foreach ($tenans as $tenan)   
                      <tr role="row" class="odd">
                              <td tabindex="0" class="sorting_1">{{ $tenans->perPage() * ($tenans->currentPage() - 1) + $loop->iteration }}</td>
                              <td>{{ $tenan->company_name }}</td>
                              <td>{{ $tenan->msk_type->name }}</td>
                              <td>{{ $tenan->last_date == null ? '-' : \App\Library\Date::d($tenan->last_date) }}</td>
                              <td>{{ \App\Library\Date::d($tenan->created_at, "d-m-Y H:i") }}</td>
                              <td class="text-right">
                                @if( \App\Library\MyHelper::has_priv('tenant', \App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD) )
                                  <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
                                  <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                  <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
                                @endif
                              </td>
                          </tr>
                          @endforeach
                      </tbody>

                  </table>
              </div>
          </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="datatables_info" role="status" aria-live="polite">Showing 1 to 10 of 40 entries</div>
            </div>
        <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_full_numbers" id="datatables_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item first disabled" id="datatables_first"><a href="#" aria-controls="datatables" data-dt-idx="0" tabindex="0" class="page-link">First</a></li>
                    <li class="paginate_button page-item previous disabled" id="datatables_previous"><a href="#" aria-controls="datatables" data-dt-idx="1" tabindex="0" class="page-link">Previous</a></li>
                    <li class="paginate_button page-item active"><a href="#" aria-controls="datatables" data-dt-idx="2" tabindex="0" class="page-link">1</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="datatables" data-dt-idx="3" tabindex="0" class="page-link">2</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="datatables" data-dt-idx="4" tabindex="0" class="page-link">3</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="datatables" data-dt-idx="5" tabindex="0" class="page-link">4</a></li>
                    <li class="paginate_button page-item next" id="datatables_next"><a href="#" aria-controls="datatables" data-dt-idx="6" tabindex="0" class="page-link">Next</a></li><li class="paginate_button page-item last" id="datatables_last"><a href="#" aria-controls="datatables" data-dt-idx="7" tabindex="0" class="page-link">Last</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
                  </div>
              </div><!-- end content-->
          </div><!--  end card  -->
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->

           


@endsection

<script type="text/javascript">
     

    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });


</script>

@section('css')
    {{--  bootstrap-wysiwyg --}}
    {!! Html::style('admin/assets/vendors/jquery-confirm-master/css/jquery-confirm.css') !!}
@endsection

@section('scripts')
    <!-- confirim  -->
    {!! Html::script('admin/assets/build/huseynzade/js/jquery-confirm.js') !!}

    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}
@endsection