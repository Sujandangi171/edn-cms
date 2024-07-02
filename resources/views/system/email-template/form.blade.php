@extends('system.layouts.form')

@section('form')
    {{-- Subject --}}
    <x-system.input :input="[
        'name' => 'subject',
        'required' => true,
        'value' => $item->subject ?? old('subject'),
        'autofocus' => true,
    ]" />

    {{-- From --}}
    <x-system.input :input="[
        'name' => 'from',
        'required' => true,
        'value' => $item->from ?? old('from'),
        'autofocus' => true,
    ]" />

    {{-- Title --}}
    <x-system.input :input="[
        'name' => 'title',
        'required' => true,
        'value' => $item->title ?? old('title'),
        'autofocus' => true,
    ]" />

    {{-- Code --}}
    <x-system.input :input="[
        'name' => 'code',
        'value' => $item->code ?? old('code'),
        'autofocus' => true,
    ]" />


    {{-- Content --}}
    <x-system.textarea :input="[
        'name' => 'content',
        'label' => 'Email',
        'class' => 'editor_desc_eng',
        'value' => $item->content ?? old('content'),
    ]" />



    {{-- Status --}}
    <x-system.radio :input="[
        'name' => 'status',
        'label' => 'Status',
        'options' => $status,
        'value' => $item->status ?? true,
    ]" />
@endsection
