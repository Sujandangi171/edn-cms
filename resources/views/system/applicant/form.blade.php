@extends('system.layouts.form')

@section('form')
    {{-- Title --}}
    <x-system.input :input="[
        'name' => 'title',
        'label' => 'Title',
        'required' => true,
        'value' => $item->title ?? old('title'),
        'autofocus' => true,
    ]" />

    {{-- Link --}}
    <x-system.input :input="[
        'name' => 'link',
        'label' => 'Link',
        'value' => $item->link ?? old('link'),
    ]" />

    <x-system.input :input="[
        'name' => 'title',
        'label' => 'Title',
        'required' => true,
        'value' => $item->title ?? old('title'),
        'autofocus' => true,
    ]" />


    {{-- Image --}}
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Image <span class="text text-danger">
            </span>
        </label>
        <div class="col-sm-10">
            <input type="file" class="form-control mb-2" name="image" onchange="previewImage(event)" id="imageInput"
                accept="image/jpg,image/jpeg,image/png">


            <img id="preview" src="{{ isset($item) ? asset('uploads/business/' . $item->files()->value('title')) : '' }}"
                width="150px" class="img-thumbnail" alt="...">

        </div>
    </div>

    {{-- Status --}}
    <x-system.radio :input="[
        'name' => 'status',
        'label' => 'Status',
        'options' => $status,
        'value' => $item->status ?? true,
    ]" />

    <input type="hidden" value="partner" name="company_type">
@endsection

@section('js')
    <script>
        function previewImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var previewImg = document.getElementById('preview');
                    previewImg.setAttribute('src', e.target.result);
                    previewImg.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
