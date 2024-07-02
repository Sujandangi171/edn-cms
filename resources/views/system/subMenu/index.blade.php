@extends('system.layouts.index')

@section('create')

@endsection
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
    <th>English</th>
    <th>Nepali</th>
    <th>Status</th>
    <th>Action</th>
@endsection

@section('data')
    @foreach ($items as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->title_eng ?? 'N/A' }}</td>
            <td>{{ $item->title_np ?? 'N/A' }}</td>
            <td>
                {!! statusBadge($item->status) !!}
            </td>
            <td>
                
                {{-- @include('system.partials.editButton')
                @include('system.partials.deleteButton') --}}
            </td>
        </tr>
    @endforeach
@endsection
