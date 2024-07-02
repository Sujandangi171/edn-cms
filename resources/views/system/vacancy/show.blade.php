@extends('system.layouts.show')

@section('title')
    <h3> {{ $$moduleName ?? '' }} Details</h3>
@endsection

@section('content-first-left')
    {{-- Job Ttle --}}
    <x-system.detail :input="[
        'label' => 'Title',
        'value' => $item->title ?? 'N/A',
    ]" />

    {{-- Department --}}
    <x-system.detail :input="[
        'label' => 'Department',
        'value' => $item->department ?? 'N/A',
    ]" />

    {{-- Address --}}
    <x-system.detail :input="[
        'label' => 'Address',
        'value' => $item->address ?? 'N/A',
    ]" />

    {{-- No of Openings --}}
    <x-system.detail :input="[
        'label' => 'Email',
        'value' => $item->no_of_openings ?? 'N/A',
    ]" />
@endsection

@section('content-first-right')
    {{-- Due Date --}}
    <x-system.detail :input="[
        'label' => 'Due Date',
        'value' => $item->due_date ?? 'N/A',
    ]" />

    {{-- Rank --}}
    <x-system.detail :input="[
        'label' => 'Rank',
        'value' => $item->rank ?? 'N/A',
    ]" />

    {{-- Rank --}}
    <x-system.detail :input="[
        'label' => 'Posted By',
        'value' => $item->user->name ?? 'N/A',
    ]" />
@endsection
