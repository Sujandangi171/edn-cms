@extends('system.layouts.index')

@section('search')
    <x-system.form :action="$indexUrl">
        <x-slot name="inputs">
            <x-system.search :input="[
                'name' => 'keyword',
                'value' => Request::input('keyword'),
                'placeholder' => 'Enter Keyword',
            ]" />
        </x-slot>
    </x-system.form>
@endsection

@section('headings')
    <th>S.N</th>
    <th>Title</th>
    @if (checkPermission($indexUrl . '/*' . '/edit', 'PUT') ||
            checkPermission($indexUrl . '/*', 'DELETE') ||
            checkPermission('permissions', 'GET'))
        <th>Action</th>
    @endif
@endsection

@section('data')
    @foreach ($items as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->name }}</td>

            @if (checkPermission($indexUrl . '/*' . '/edit', 'PUT') ||
                    checkPermission($indexUrl . '/*', 'DELETE') ||
                    checkPermission('permissions', 'GET'))
                <td>
                    @include('system.partials.editButton')
                    @include('system.partials.deleteButton')

                    <x-system.button :input="[
                        'title' => 'Permissions' . ' (' . count($item->permissions) . ')',
                        'btnType' => 'primary',
                        'icon' => 'fas fa-list',
                        'anchor' => true,
                        'disabled' => $item->is_password_set,
                        'link' => [
                            'route' => 'permissions.index',
                            'params' => 'moduleId=' . $item->id,
                        ],
                    ]" />

                </td>
            @endif
        </tr>
    @endforeach
@endsection
