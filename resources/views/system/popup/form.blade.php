@extends('system.layouts.form')

@section('form')
    {{-- English --}}
    <x-system.input :input="[
        'name' => 'title',
        'value' => $item->title ?? old('title'),
        'autofocus' => true,
    ]" />

    {{-- Image --}}
    <x-system.file :input="[
        'name' => 'image',
        'required' => true,
        'value' => $item ?? old('image'),
        'path' => 'uploads/popus',
    ]" />

    {{-- Status --}}
    <x-system.radio :input="[
        'name' => 'status',
        'label' => 'Status',
        'options' => $status,
        'value' => $item->status ?? true,
    ]" />
@endsection
