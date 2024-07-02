@extends('system.layouts.index')

@section('search')
    <x-system.form :action="$indexUrl">
        <x-slot name="inputs">
            <x-system.search :input="[
                'name' => 'keyword',
                'value' => Request::input('keyword') ?? old('keyword'),
                'placeholder' => 'Enter Keyword',
            ]" />

            <x-system.select-search :input="[
                'name' => 'vacancy_type_id',
                'label' => 'Job Title',
                'options' => $types ?? [],
                'value' => Request::input('vacancy_type_id') ?? old('vacancy_type_id'),
            ]" />
        </x-slot>
    </x-system.form>
@endsection

@section('headings')
    <th>S.N</th>
    <th>Title</th>
    <th>Vacancy Type</th>
    <th>Applicants</th>
    <th>Rank</th>
    <th>Status</th>
    @if (checkPermission($indexUrl . '/*' . '/edit', 'PUT') || checkPermission($indexUrl . '/*', 'DELETE'))
        <th>Action</th>
    @endif
@endsection

@section('data')
    @foreach ($items as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->title ?? 'N/A' }}</td>
            <td>{{ $item->vacancyType->title ?? 'N/A' }}</td>
            <td>{!! $item->applicants->count() > 0
                ? '<a href="' . route('applicants.index', ['vacancy_id' => $item->id]) . '">' . $item->applicants->count() . '</a>'
                : '-' !!}
            </td>
            <td>{{ $item->rank ?? '' }}</td>
            <td>{!! statusBadge($item, $indexUrl) !!}</td>
            @if (checkPermission($indexUrl . '/*' . '/edit', 'PUT') || checkPermission($indexUrl . '/*', 'DELETE'))
                <td>
                    @include('system.partials.editButton')
                    @include('system.partials.deleteButton')
                    @include('system.partials.showButton')
                </td>
            @endif
        </tr>
    @endforeach
@endsection
