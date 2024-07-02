@extends('system.layouts.form')

@section('form')
    {{-- Words --}}
    <x-system.input :input="[
        'name' => 'words',
        'value' => $item->words ?? old('words'),
        'autofocus' => true,
        'required' => true,
    ]" />

    {{-- Name --}}
    <x-system.input :input="[
        'name' => 'name',
        'value' => $item->name ?? old('name'),
        'required' => true,
    ]" />

    {{-- Post --}}
    <x-system.input :input="[
        'name' => 'post',
        'value' => $item->post ?? old('post'),
    ]" />

    {{-- Company --}}
    <x-system.input :input="[
        'name' => 'company',
        'value' => $item->company ?? old('company'),
    ]" />

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
        'path' => 'uploads/testimonials',
    ]" />

    {{-- Status --}}
    <x-system.radio :input="[
        'name' => 'status',
        'label' => 'Status',
        'options' => $status,
        'value' => $item->status ?? true,
    ]" />
@endsection
