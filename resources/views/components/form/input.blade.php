<div>
    <div class="form-group mb-3 @error($name) invalid @enderror ">
        <label class="form-label">{{ $label }} <span class="text-danger"></span></label>
        <div class="input-group">
            <input type="{{ $type }}" name="{{ $name }}"
                class="form-control @error($name) is-invalid @enderror " value="{{ $value }}">

            @isset($group)
                <div class="input-group-text">
                    <span>{{ $group }}</span>
                </div>
            @else
                @error($name)
                    <div class="invalid-feedback">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
            @endisset


        </div>
        @isset($group)
            @error($name)
                <div class="invalid-feedback">
                    <span class="text-danger">{{ $message }}</span>
                </div>
            @enderror
        @endisset

    </div>
</div>
