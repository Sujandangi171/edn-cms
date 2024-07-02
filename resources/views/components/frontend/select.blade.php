<div>
    <label for="{{ $input['label'] }}" class="form-label">
        {{ isset($input['label']) ? $input['label'] : Str::ucfirst($input['name']) }}

        {!! isset($input['required']) && $input['required'] === true ? '<span class="text text-danger">*</span>' : '' !!}
    </label>

    <select name="{{ $input['name'] }}" id="{{ $input['id'] ?? $input['name'] }}"
        {{ isset($input['required']) ? 'required' : '' }} class="form-control">
        @if (!isset($input['hidePlacholder']))
            <option value="">
                {{ isset($input['placeholder']) ? $input['placeholder'] : '--Select ' . $input['label'] . '--' }}
            </option>
        @endif


        @foreach ($input['options'] as $key => $value)
            <option value="{{ $key }}" {{ $key ===  $input['value'] ? 'selected' : '' }}>
                {{ $value }}</option>
        @endforeach

        @error($input['name'])
            <span class="text text-danger">{{ $message }}</span>
        @enderror
    </select>
</div>
