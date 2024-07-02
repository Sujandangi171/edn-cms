@extends('system.layouts.form')

@section('form')
    {{-- Has Content? --}}
    <x-system.radio :input="[
        'name' => 'has_content',
        'options' => [['value' => 1, 'label' => 'Yes'], ['value' => 0, 'label' => 'No']],
        'value' => $item->has_content ?? 0,
    ]" />


    <div class="toggle-content {{ isset($item) && $item->has_content ? '' : 'd-none' }}">
        {{-- Title --}}
        <x-system.input :input="[
            'name' => 'title',
            'value' => $item->title ?? old('title'),
            'autofocus' => true,
        ]" />

        {{-- Short Description --}}
        <x-system.input :input="[
            'name' => 'short_description',
            'label' => 'Short Description',
            'value' => $item->short_description ?? old('short_description'),
        ]" />

    </div>

    {{-- Rank --}}
    <x-system.input :input="[
        'name' => 'rank',
        'type' => 'number',
        'required' => true,
        'value' => $item->rank ?? old('rank'),
    ]" />

    {{-- Image --}}
    <x-system.file :input="[
        'name' => 'image',
        'required' => true,
        'value' => $item ?? old('image'),
        'path' => 'uploads/sliders',
    ]" />

    {{-- Status --}}
    <x-system.radio :input="[
        'name' => 'status',
        'options' => $status,
        'value' => $item->status ?? true,
    ]" />
@endsection

@section('js')
    <script>
        $(document).on('change', '#has_content', function() {
            let value = $(this).val();
            if (value == 0) {
                $('.toggle-content').addClass('d-none');
            } else {
                $('.toggle-content').removeClass('d-none');
            }
        })
    </script>
@endsection
