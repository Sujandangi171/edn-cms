@extends('system.layouts.form')

@section('form')
    {{-- Name --}}
    <x-system.input :input="[
        'name' => 'name',
        'required' => true,
        'label' => 'Name',
        'value' => $item->name ?? old('name'),
    ]" />


    {{-- URL --}}
    <x-system.input :input="[
        'name' => 'url',
        'required' => true,
        'label' => 'URL',
        'value' => $item->url ?? old('url'),
    ]" />

    {{-- Method --}}
    <x-system.select :input="[
        'name' => 'method',
        'required' => true,
        'label' => 'Method',
        'options' => [
            'GET' => 'GET',
            'POST' => 'POST',
            'PUT' => 'PUT',
            'DELETE' => 'DELETE',
        ],
        'value' => $item->method ?? old('method'),
    ]" />

    <input type="hidden" name="module_id" value="{{ request()->moduleId }}">
@endsection
