<div>
    <div class="form-group @error($name) has-error @enderror ">
        <label>{{$label}} <span class="text-danger"></span></label>
        <div class="input-group">
            <input type="{{$type}}" name="{{$name}}" class="form-control" value="{{$value}}" > 
            @isset($group)
            <div class="input-group-text">
                <span>{{$group}}</span>
            </div>
            @endisset
        </div>
        <div class="form-control-feedback">

            @error($name)    <span class="help-block">{{$message}}</span> @enderror
        </div>
    </div>
</div>