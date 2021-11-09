@extends('Backend.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-wrench"></i> App Settings
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                @include('Backend.Settings.settingSidebar')

                <div class="col-md-10">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">General Setting</h3>
                        </div>

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
                        <form id="validation" class="form-horizontal dashed-row"
                            action="{{ route('saveGeneralSetting', ['id' => $ID]) }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Site logo</label>
                                    <div class="col-sm-10">
                                        <div class="col-sm-2">
                                            <img src="{{ asset('uploads/generalSetting/' . $data->company_logo) }}"
                                                width="80">
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="file" name="company_logo" class="form-control" accept="image/*">
                                            <small>best size 251 x 77px</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Company Name<span
                                            class="requiredAsterisk">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="company_name" class="validate[required] form-control"
                                            value="{{ $data->company_name }}">
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i>
                                    Save</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection

