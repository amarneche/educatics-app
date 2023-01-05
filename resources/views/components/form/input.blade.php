<div>
    <div class="form-group mb-3 @error($name) invalid @enderror ">
        <label class="form-label">{{ $label }} <span class="text-danger"></span></label>
        <div class="input-group">
            <input type="{{ $type }}" name="{{ $name }}" class="form-control" value="{{ $value }}">
            @isset($group)
                <div class="input-group-text">
                    <span>{{ $group }}</span>
                </div>
            @endisset
        </div>
        <div class="invalid-feedback">

            @error($name)
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
