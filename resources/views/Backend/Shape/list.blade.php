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
                    <h3 class="box-title">Shapes</h3>
                    <div class="box-tools">
                        <a href="{{route("shape.add")}}" class="btn btn-primary btn-flat" >
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shapes as $shape)
                            <tr>
                            <td>{{$shape->id}}</td>
                            <td>{{$shape->name}}</td>
                            {{--<td><a href="{{route("shape.delete",$shape->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>--}}
                            <a href="{{route("shape.edit",$shape->id)}}" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>

    </div>

@endsection


