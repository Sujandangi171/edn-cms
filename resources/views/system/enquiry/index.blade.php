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

@section('create')
@endsection

@section('headings')
    <th>S.N</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
@endsection

@section('data')
    @foreach ($items as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->name ?? 'N/A' }}</td>
            <td>{{ $item->email ?? 'N/A' }}</td>
            <td>
                @include('system.partials.deleteButton')
                @include('system.partials.showButton')
            </td>
        </tr>
    @endforeach
@endsection
