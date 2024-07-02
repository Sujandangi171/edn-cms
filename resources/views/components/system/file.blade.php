@php
    if (isset($input['fileTypes'])) {
        $test = $input['fileTypes'];
        $mime_array = explode(',', $test);
        $file_extensions = [];
        foreach ($mime_array as $mime) {
            $parts = explode('/', $mime);
            $file_extensions[] = $parts[1];
        }
        $result = implode(', ', $file_extensions);
    }
@endphp

<div>
    <div class="form-group row {{ isset($input['divClass']) ? $input['divClass'] : '' }} {{ $input['class'] ?? '' }}">
        <label for="inputName"
            class="{{ isset($input['isModal']) ? 'col-sm-4' : 'col-sm-2' }} col-form-label {{ $input['label-class'] ?? '' }}">{{ isset($input['label']) ? $input['label'] : Str::ucfirst($input['name']) }}
            <span class="text text-danger">
                {{ isset($input['required']) ? '*' : '' }}
            </span>
        </label>

        <div class="{{ isset($input['isModal']) ? 'col-sm-8' : 'col-sm-10' }}  ">
            <input type="file" class="form-control {{ $input['class'] ?? '' }} upload" name="{{ $input['name'] }}"
                id="upload" {{ (isset($input['value']) ? '' : isset($input['required'])) ? 'required' : '' }}
                onchange="previewImage(event)" accept="{{ $input['fileTypes'] ?? '' }}">

            <div class="text text-secondary" style="font-size: 15px">File must be in {{ $result ?? '' }}
                format.</div>

            <div>
                <img id="preview"
                    class="{{ !isset($input['value']) ? 'd-none' : '' }} mt-3 img-thumbnail p-2 preview"
                    src="{{ isset($input['value']) ? asset($input['path'] . '/' . $input['value']->files()->value('title')) : '' }}"
                    width="300px" class="img-thumbnail" alt="...">
            </div>

            @error($input['name'])
                <span class="text text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
