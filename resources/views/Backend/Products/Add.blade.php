<form id="validation2" action="{{route('saveProducts')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="modal-body clearfix">
        <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Name<span class="requiredAsterisk">*</span></label>
            <div class="col-sm-9">
                <input type="text" name="name" class="validate[required] form-control" value="{{old('name')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Type</label>
            <div class="col-sm-9">
                <select class="form-control validate[required] select2" name="product_category" data-placeholder="Please Select type Aritist or Writer">
                    <option value=""></option>
                    @foreach ($allCategory as $category)
                    @if( $loop->index == 0)
                    <option value="{{ $category->id }}" <?php {echo 'selected';} ?>>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}" <?php ?>>{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Image<span class="requiredAsterisk">*</span></label>
            <div class="col-sm-9">
                <input type="file" name="filename[]" class="form-control" multiple>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Shape<span class="requiredAsterisk">*</span></label>
            <div class="col-sm-9">
                <select name="type" class="form-control" required>
                    <option>Select Type</option>
                    @php 
                    $shape = App\Models\Shape::get();
                    @endphp

                    @foreach($shape as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Price<span class="requiredAsterisk">*</span></label>
            <div class="col-sm-9">
                <input type="number" name="price" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Description<span class="requiredAsterisk">*</span></label>
            <div class="col-sm-9">
                <textarea  name="description" class="form-control" rows="4" required></textarea>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><span class="fa fa-close"></span> Close</button>
        <button type="submit" class="btn btn-primary btn-flat"><span class="fa fa-check-circle"></span> Save</button>
    </div>
</form>

<script type="text/javascript">
    jQuery("#validation2").validationEngine({promptPosition: 'inline'});
    $('.select2').select2();
</script>

