@extends('system.layouts.form')

@section('form')
    {{-- Title --}}
    <x-system.input :input="[
        'name' => 'title',
        'required' => true,
        'value' => $item->title ?? old('title'),
        'autofocus' => true,
    ]" />

    {{-- Rank --}}
    <x-system.input :input="[
        'name' => 'rank',
        'type'=>'number',
        'value' => $item->rank ?? old('rank'),
        'autofocus' => true,
    ]" />

    {{-- Description --}}
    <x-system.textarea :input="[
        'name' => 'description',
        'required' => true,
        'value' => $item->description ?? old('description'),
    ]" />

    <input type="hidden" value="client" name="company_type">


    {{-- Image --}}
    <x-system.file :input="[
        'name' => 'image',
        'required' => true,
        'value' => $item ?? old('image'),
        'path' => 'uploads/business',
    ]" />

    {{-- Status --}}
    <x-system.radio :input="[
        'name' => 'status',
        'options' => $status,
        'value' => $item->status ?? true,
    ]" />
@endsection
