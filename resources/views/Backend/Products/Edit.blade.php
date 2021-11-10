<form id="validation2" action="{{ route('updateProducts') }}" class="form-horizontal" method="post"
    enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $id }}">
    <div class="modal-body clearfix">

        <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Previous Image<span
                    class="requiredAsterisk">*</span></label>
            <div class="col-sm-9">
                <?php
                $content = '';
                $img = json_decode($details->gallery);
                foreach($img as $photo){
                    $pic = asset('/uploads/'.$photo);
                    $content .= '<img src="'. $pic .'" alt="" style="width: 50px;height: 50px">';
                }
                ?>
                {!! $content !!}
                 </div>
        </div>

       <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Name<span class="requiredAsterisk">*</span></label>
            <div class="col-sm-9">
                <input type="text" name="name" class="validate[required] form-control" value="{{ $details->product_name }}">
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Category Type</label>
            <div class="col-sm-9">
                <select class="form-control validate[required] select2" name="product_category" data-placeholder="Please Select product category">
                    <option value=""></option>
                    @foreach ($allCategory as $category)
                    <option value="{{ $category->id }}" <?php if ($category->name == $details->product_category) {echo 'selected';} ?>>{{ $category->name }}</option>
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
            <label for="title" class="col-sm-3 control-label">shape<span class="requiredAsterisk">*</span></label>
            <div class="col-sm-9">
                <select name="type" class="form-control" required>
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
                <input type="text" name="price" class="form-control" value="{{ $details->price }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Description<span class="requiredAsterisk">*</span></label>
            <div class="col-sm-9">
                <textarea name="description" class="form-control" rows="4">{{ $details->description }}</textarea>
            </div>
        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><span class="fa fa-close"></span>
            Close</button>
        <button type="submit" class="btn btn-primary btn-flat"><span class="fa fa-check-circle"></span> Save</button>
    </div>
</form>

<script type="text/javascript">
    jQuery("#validation2").validationEngine({
        promptPosition: 'inline'
    });
    $('.select2').select2();
</script>
