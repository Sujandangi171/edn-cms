@extends('system.layouts.form')

@section('form')
    {{-- Contacts --}}
    <x-system.input :input="[
        'name' => 'contact',
        'label' => 'Contacts',
        'value' => $items['contact'] ?? old('key'),
        'autofocus' => true,
        'required' => true,
    ]" />

    {{-- Address --}}
    <x-system.input :input="[
        'name' => 'address',
        'label' => 'Address',
        'value' => $items['address'] ?? old('value'),
        'required' => true,
    ]" />

    {{-- Mail --}}
    <x-system.input :input="[
        'name' => 'mail',
        'placeholder' => 'E-Mail',
        'label' => 'E-Mail',
        'value' => $items['mail'] ?? old('value'),
        'required' => true,
    ]" />

    {{-- Opening Days --}}
    <x-system.input :input="[
        'name' => 'opening_days',
        'placeholder' => 'Opening Days',
        'label' => 'Opening Days',
        'value' => $items['opening_days'] ?? old('value'),
        'required' => true,
    ]" />

    {{-- Map Code --}}
    <x-system.input :input="[
        'name' => 'map_code',
        'placeholder' => 'Map Code',
        'label' => 'Map',
        'value' => $items['map_code'] ?? old('value'),
        'required' => true,
    ]" />

    {{-- Logo --}}
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Logo <span class="text text-danger">
            </span>
        </label>
        <div class="col-sm-10">
            <input type="file" class="form-control mb-2" name="logo" onchange="previewForLogo(event)" id="imageInput"
                accept="image/jpg,image/jpeg,image/png" required>
            <img id="logo" src="{{ isset($items['logo']) ? asset('uploads/site-configs/' . $items['logo']) : '' }}"
                width="400px" class="img-thumbnail" alt="...">
        </div>
    </div>

    {{-- QR Code --}}
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">QR Code <span class="text text-danger">
            </span>
        </label>
        <div class="col-sm-10">
            <input type="file" class="form-control mb-2" name="qr_code" onchange="previewForQR(event)" id="imageInput"
                accept="image/jpg,image/jpeg,image/png" required>
            <img id="qr_code"
                src="{{ isset($items['qr_code']) ? asset('uploads/site-configs/' . $items['qr_code']) : '' }}"
                width="400px" class="img-thumbnail" alt="...">
        </div>
    </div>
@endsection

@section('js')
    <script>
        function previewForQR(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var previewImg = document.getElementById('qr_code');
                    previewImg.setAttribute('src', e.target.result);
                    previewImg.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewForLogo(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var previewImg = document.getElementById('logo');
                    previewImg.setAttribute('src', e.target.result);
                    previewImg.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
