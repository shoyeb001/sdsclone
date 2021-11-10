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

            <div class="card" style="max-width: 45rem; margin:auto; background:#fff;">
                <div class="card-body">
                    <form action="{{route("shape.store")}}" method="POST" style="padding: 25px">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Add Shape</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Add Shape" name="name" style="margin-bottom:20px">
                        </div>
                         <p style="text-align: right"> <button type="submit" class="btn btn-success">Add</button></p>
                        </form>
                </div>
              </div>
        </section>

    </div>

@endsection




