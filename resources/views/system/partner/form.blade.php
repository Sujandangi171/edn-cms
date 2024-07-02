@extends('system.layouts.form')

@section('form')
    {{-- Title --}}
    <x-system.input :input="[
        'name' => 'title',
        'required' => true,
        'value' => old('title') ?? ($item->title ?? ''),
        'autofocus' => true,
    ]" />

    {{-- Rank --}}
    <x-system.input :input="[
        'name' => 'rank',
        'value' => old('rank') ?? ($item->rank ?? ''),
        'autofocus' => true,
    ]" />

    {{-- Link --}}
    <x-system.input :input="[
        'name' => 'link',
        'value' => old('link') ?? ($item->link ?? ''),
    ]" />

    <x-system.input :input="[
        'name' => 'description',
        'required' => true,
        'value' => old('description') ?? ($item->description ?? ''),
        'autofocus' => true,
    ]" />


    {{-- Image --}}
    <x-system.file :input="[
        'name' => 'image',
        'required' => true,
        'fileTypes' => 'image/jpeg, image/jpg,image/png',
        'value' => $item ?? old('image'),
        'path' => 'uploads/business',
    ]" />

    {{-- Status --}}
    <x-system.radio :input="[
        'name' => 'status',
        'label' => 'Status',
        'options' => $status,
        'value' => $item->status ?? true,
    ]" />

    <input type="hidden" value="partner" name="company_type">
@endsection
