<div>
    <div class="form-group @error($name) has-error @enderror">
        @isset($label)
            <label class="form-label">{{ $label }}</label>
        @endisset
        <select class="form-control form-control-sm select2" name="{{ $name }}">
            @isset($options)
                @foreach ($options as $option)
                    <option value=""> {{ $option }}</option>
                @endforeach
            @endisset

            {{ $slot }}

        </select>
        @error($name)
            <div class="form-control-feedback">

                <span class="help-block">{{ $message }}</span>
            </div>
        @enderror
    </div>
</div>
