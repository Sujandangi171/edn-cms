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

    {{-- Rank --}}
    <x-system.input :input="[
        'name' => 'rank',
        'type' => 'number',
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
