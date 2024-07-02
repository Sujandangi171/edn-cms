@extends('system.layouts.index')


@section('create')
    @if (checkPermission($indexUrl . '/create', 'POST'))
        <a href="{{ route($indexUrl . '.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>
            Add</a>
    @endif
    <a href="{{ route('exportResume') }}" class="btn btn-primary btn-sm"><i class="fa fa-file-excel"></i>&nbsp;Export</a>
@endsection

@section('search')
    <x-system.form :action="$indexUrl">
        <x-slot name="inputs">
            <x-system.search :input="[
                'name' => 'keyword',
                'value' => Request::input('keyword') ?? old('keyword'),
                'placeholder' => 'Enter Keyword',
            ]" />

            <x-system.select-search :input="[
                'name' => 'vacancy_id',
                'label' => 'Job Title',
                'options' => $vacancies ?? [],
                'value' => Request::input('vacancy_id') ?? old('vacancy_id'),
            ]" />
        </x-slot>
    </x-system.form>
@endsection

@section('headings')
    <th>S.N</th>
    <th>Name</th>
    <th>Vacancy</th>
    <th>Applied At</th>
    @if (checkPermission($indexUrl . '/*' . '/edit', 'PUT') || checkPermission($indexUrl . '/*', 'DELETE'))
        <th>Action</th>
    @endif
@endsection

@section('data')
    @foreach ($items as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->first_name . ' ' . $item->middle_name . ' ' . $item->last_name }}</td>
            <td>{{ $item->vacancy->title ?? 'Interested Applicant' }}</td>
            <td>{{ convertToTime($item->created_at) }}</td>
            <td>
                @include('system.partials.showButton')
            </td>

        </tr>
    @endforeach
@endsection
