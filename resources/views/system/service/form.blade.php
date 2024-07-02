@extends('system.layouts.form')

@section('form')
    {{-- English --}}
    <x-system.input :input="[
        'name' => 'title',
        'label' => 'Title',
        'required' => true,
        'value' => $item->title ?? old('title'),
        'autofocus' => true,
    ]" />

    {{-- Description --}}
    <x-system.textarea :input="[
        'name' => 'description',
        'label' => 'Description',
        'required' => true,
        'value' => $item->description ?? old('description'),
        'autofocus' => true,
    ]" />

    {{-- Icon --}}
    <x-system.input :input="[
        'name' => 'icon',
        'label' => 'Icon',
        'required' => true,
        'value' => $item->icon ?? old('icon'),
        'autofocus' => true,
    ]" />

       {{-- Rank --}}
       <x-system.input :input="[
        'name' => 'rank',
        'required' => true,
        'value' => $item->rank ?? old('rank'),
    ]" />

    {{-- Status --}}
    <x-system.radio :input="[
        'name' => 'status',
        'label' => 'Status',
        'options' => $status,
        'value' => $item->status ?? true,
    ]" />
@endsection
