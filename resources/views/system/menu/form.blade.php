@extends('system.layouts.form')

@section('form')
    {{-- English Title --}}
    <x-system.input :input="[
        'name' => 'title_eng',
        'label' => 'Title',
        'required' => true,
        'value' => $item->title_eng ?? old('title_eng'),
        'autofocus' => true,
    ]" />

    {{-- Rank --}}
    <x-system.input :input="[
        'name' => 'rank',
        'label' => 'Rank',
        'type' => 'number',
        'value' => $item->rank ?? old('rank'),
        'autofocus' => true,
    ]" />

    {{-- Href --}}
    <x-system.input :input="[
        'name' => 'href',
        'label' => 'Href',
        'value' => $item->href ?? old('href'),
        'autofocus' => true,
    ]" />

    {{-- Status --}}
    <x-system.radio :input="[
        'name' => 'status',
        'label' => 'Status',
        'options' => $status,
        'value' => $item->status ?? true,
    ]" />
@endsection
