<div class="form-group row">
      <label class="col-sm col-form-label">Category</label>
  <div class="col-sm-10">
        <select name="category" class="form-control">
            <option>--Select One--</option>
            @foreach($category as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
            @endforeach
         </select>
  </div>
</div>