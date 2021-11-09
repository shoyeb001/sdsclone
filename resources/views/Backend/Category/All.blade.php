@extends('Backend.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content">

            @if (count($errors) > 0)
                <div class="alert alert-error alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Categories</h3>
                    <div class="box-tools">
                        <a href="javascript:void(0);" class="btn btn-primary btn-flat" data-act="ajax-modal"
                            data-title="Add Category" data-append-id="AjaxModelContent"
                            data-action-url="{{ route('addCategory') }}">
                            <i class="fa fa-plus-circle"></i> Add
                        </a>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table id="Datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>

    </div>

@endsection

@push('script')
    <script type="text/javascript">
        $('#Datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('allCategoryDatatable') }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            "order": [
                [0, 'asc']
            ],
            "pageLength": 10
        });

        var Inactive = 'Inactive';
        var Active = 'Active';

        function active_inactive_category(id, status) {
            $.ajax({
                type: "post",
                url: '{{ route('active_inactive_category') }}',
                data: {
                    _token: '<?php echo csrf_token(); ?>',
                    id: id,
                    status: status
                },
                success: function(data) {
                    var resp = JSON.parse(data);
                    $('#status' + resp.id).html(resp.html);
                    $(document).find('.child #status' + resp.id).html(resp.html);
                }
            });
        }
    </script>
@endpush
