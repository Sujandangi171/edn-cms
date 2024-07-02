<div>
    <label for="name1" class="form-label">
        {{ isset($input['label']) ? $input['label'] : Str::ucfirst($input['name']) }}

        {!! isset($input['required']) && $input['required'] === true ? '<span class="text text-danger">*</span>' : '' !!}
    </label>
    <input type="{{ $input['type'] ?? 'text' }}" id="{{ isset($input['id']) ? $input['id'] : $input['name'] ?? '' }}"
        name="{{ $input['name'] ?? '' }}" class="form-control"
        {{ isset($input['required']) && $input['required'] === true ? 'required' : '' }}
        style="border: 1px solid rgb(218, 218, 218);" value="{{ $input['value'] ?? '' }}"
        placeholder="{{ isset($input['placeholder']) ? $input['placeholder'] : Str::ucfirst($input['name']) }}">

    @error($input['name'])
        <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
