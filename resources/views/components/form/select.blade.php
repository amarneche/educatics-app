<div>
    <div class="form-group @error($name) has-error @enderror">
        <label class="form-label">{{ $label }}</label>
        <select class="form-control select2" name="{{ $name }}">
            @isset($options)
                @foreach ($options as $option)
                    <option value=""> {{ $option }}</option>
                @endforeach
            @endisset

            {{ $slot }}

        </select>
        <div class="form-control-feedback">

            @error($name)
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
