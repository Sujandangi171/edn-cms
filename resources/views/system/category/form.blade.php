@extends('system.layouts.form')

@section('form')

{{-- English --}}
<x-system.input :input="[
        'name' => 'english',
        'label' => 'English',
        // 'required' => true,
        'value' => $item->title['en'] ?? old('english'),
        'autofocus' => true,
    ]" />

{{-- Nepali --}}
<x-system.input :input="[
        'name' => 'local',
        'label' => 'Nepali',
        // 'required' => true,
        'value' => $item->title['np'] ?? old('local'),
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