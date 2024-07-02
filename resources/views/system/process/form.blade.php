@extends('system.layouts.form')

@section('form')
    {{-- Rank --}}
    <x-system.input :input="[
        'name' => 'rank',
        'type' => 'number',
        'required' => true,
        'value' => $item->rank ?? old('rank'),
        'autofocus' => true,
    ]" />

    {{-- Rank --}}
    <x-system.input :input="[
        'name' => 'title',
        'required' => true,
        'value' => $item->title ?? old('title'),
    ]" />

    {{-- Description --}}
    <x-system.textarea :input="[
        'name' => 'description',
        'required' => true,
        'value' => $item->description ?? old('description'),
    ]" />

    {{-- Status --}}
    <x-system.radio :input="[
        'name' => 'status',
        'label' => 'Status',
        'options' => $status,
        'value' => $item->status ?? true,
    ]" />
@endsection
