@extends('system.layouts.show')

@section('title')
    <h3> {{ $$moduleName ?? '' }} Details</h3>
@endsection

@section('content-first-left')
    {{-- Name --}}
    <x-system.detail :input="[
        'label' => 'Name',
        'value' => $item->name ?? 'N/A',
    ]" />

    {{-- Email --}}
    <x-system.detail :input="[
        'label' => 'Email',
        'value' => $item->email ?? 'N/A',
    ]" />

    {{-- Subject --}}
    <x-system.detail :input="[
        'label' => 'Subject',
        'value' => $item->subject ?? 'N/A',
    ]" />

    {{-- Date --}}
    <x-system.detail :input="[
        'label' => 'Message',
        'value' => $item->created_at ?? 'N/A',
    ]" />
@endsection

@section('content-second')
<hr>
    <h3 class="border-bottom">Message</h3>
    {!! $item->message !!}
@endsection
