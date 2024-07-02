@extends('system.layouts.form')

@section('form')
    {{-- Vacancy Title --}}
    <x-system.select :input="[
        'name' => 'vacancy_type_id',
        'required' => true,
        'label' => 'Vacancy Type',
        'options' => $types ?? [],
        'value' => $item->vacancy_type_id ?? old('vacancy_type_id'),
    ]" />

    {{-- Title --}}
    <x-system.input :input="[
        'name' => 'title',
        'label' => 'Title',
        'required' => true,
        'value' => $item->title ?? old('title'),
    ]" />

    {{-- Slug --}}
    <x-system.input :input="[
        'name' => 'slug',
        'required' => true,
        'value' => $item->slug ?? old('slug'),
    ]" />

    {{-- Short Description --}}
    <x-system.textarea :input="[
        'name' => 'short_description',
        'label' => 'Short Description',
        'required' => true,
        'value' => $item->short_description ?? old('short_description'),
    ]" />


    {{-- Department --}}
    <x-system.input :input="[
        'name' => 'department',
        'label' => 'Technology',
        'required' => true,
        'value' => $item->department ?? old('department'),
    ]" />

    {{-- No. of Openings --}}
    <x-system.input :input="[
        'name' => 'no_of_openings',
        'label' => 'No. of Openings',
        'type' => 'number',
        'required' => true,
        'value' => $item->no_of_openings ?? old('no_of_openings'),
    ]" />

    {{-- Rank --}}
    <x-system.input :input="[
        'name' => 'rank',
        'type' => 'number',
        'label' => 'Rank',
        'required' => true,
        'value' => $item->rank ?? old('rank'),
    ]" />

    {{-- End Date --}}
    <x-system.input :input="[
        'name' => 'due_date',
        'type' => 'date',
        'label' => 'Due Date',
        'required' => true,
        'value' => $item->due_date ?? old('due_date'),
    ]" />

    {{-- Content --}}
    <x-system.textarea :input="[
        'name' => 'description',
        'label' => 'Description',
        'class' => 'editor_desc_eng',
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
