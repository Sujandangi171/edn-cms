@extends('system.layouts.index')


@section('search')
    <x-system.form :action="$indexUrl">
        <x-slot name="inputs">
            <x-system.search :input="[
                'name' => 'keyword',
                'value' => Request::input('keyword') ?? old('keyword'),
                'placeholder' => 'Enter Keyword',
            ]" />
        </x-slot>
    </x-system.form>
@endsection

@section('headings')
    <th>S.N</th>
    <th>Title</th>
    <th>Description</th>
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
            <td>{{ $item->description ?? 'N/A' }}</td>
            <td>{{ $item->rank ?? 'N/A' }}</td>
            <td>{!! statusBadge($item, $indexUrl) !!}</td>
            @if (checkPermission($indexUrl . '/*' . '/edit', 'PUT') || checkPermission($indexUrl . '/*', 'DELETE'))
                <td>
                    @include('system.partials.editButton')
                    @include('system.partials.deleteButton')
                </td>
            @endif
        </tr>
    @endforeach
@endsection
