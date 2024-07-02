@extends('system.layouts.index')



<!-- Recursive function to render menu items starts -->
@php
    function renderMenu($menu)
    {
        echo '<li class="expandable">';
        echo '<div class="hitarea expandable-hitarea"></div>';
        echo '<strong><a href="?menuId=' . $menu->id . '" style="color:black">' . $menu->title_eng . '</a>';
        echo '<a href="' .
            route('menus.edit', ['menu' => $menu->id]) .
            '" style="color: green; background:none; margin:5px 5px"><i class="fa fa-pen"></i></a>
            <form method="POST" action="' .
            route('menus.destroy', ['menu' => $menu->id]) .
            '" style="display:inline">
                ' .
            csrf_field() .
            '
                ' .
            method_field('DELETE') .
            '
                <button type="submit" style="color: red; background:none; border:none; padding:0; cursor:pointer"><i class="fa fa-trash"></i></button>
            </form>';

        echo '</strong>';

        echo '</p>';
        if ($menu->children->isNotEmpty()) {
            echo '<ul>';
            foreach ($menu->children as $child) {
                renderMenu($child);
            }
            echo '</ul>';
        }
        echo '</li>';
    }

@endphp

@section('create')
    <x-system.modal :input="[
        'title' => 'Add Menu',
        'method' => 'POST',
        'route' => 'menus.store',
        'icon' => 'fa fa-plus',
        'btnColor' => 'success',
        'btn-title' => 'Add',
        'id' => 'add-menu' ?? '',
    ]">
        <x-slot name="body">
            {{-- English Title --}}
            <x-system.input :input="[
                'name' => 'title_eng',
                'placeholder' => 'Title',
                'label' => 'Title',
                'required' => true,
                'isModal' => true,
                'value' => $item->title_eng ?? old('title_eng'),
                'autofocus' => true,
            ]" />

            {{-- Rank --}}
            <x-system.input :input="[
                'name' => 'rank',
                'label' => 'Rank',
                'type' => 'number',
                'isModal' => true,
                'value' => $item->rank ?? old('rank'),
                'autofocus' => true,
            ]" />

            {{-- Href --}}
            <x-system.input :input="[
                'name' => 'href',
                'label' => 'Href',
                'isModal' => true,
                'value' => $item->href ?? old('href'),
                'autofocus' => true,
            ]" />

            {{-- Status --}}
            <x-system.radio :input="[
                'name' => 'status',
                'label' => 'Status',
                'isModal' => true,
                'options' => [['value' => 1, 'label' => 'Active'], ['value' => 0, 'label' => 'Inactive']],
                'value' => $item->status ?? true,
            ]" />

        </x-slot>
    </x-system.modal>
@endsection

<!-- Recursive function to render menu items ends -->
@section('css')
    <link rel="stylesheet" href="{{ asset('system/tree-view/jquery.treeview.css') }}" />
@endsection

@section('test')
    <div class="row elevation-2 p-4">
        <div class="col-lg-2 col-md-4">
            <ul class="treeview" id="tree">

                @foreach ($items as $menu)
                    @php renderMenu($menu); @endphp
                @endforeach
            </ul>
        </div>
        <div id="tabs" class="col-lg-10 col-md-8">
            @if (isset(request()->menuId))
                <div class="form-group row">
                    <div class="d-flex justify-content-between align-items-center border-bottom">
                        <h4>{{ $title ?? '' }}</h4>
                        <ul>
                            <li><a href="#tabs-1">Content</a></li>
                            <li><a href="#tabs-2">Sub Menu</a></li>
                        </ul>
                    </div>
                    <div id="tabs-1">
                        @include('system.menu.content')
                    </div>
                    <div id="tabs-2">
                        @include('system.menu.newMenu')
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-center align-items-center h-100" style="min-height:520px">
                    <h4>Please select a menu to continue.</h4>
                </div>
            @endif

        </div>

    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('system/tree-view/jquery.treeview.js') }}"></script>
    <script>
        $(function() {
            $('#tree').treeview({
                collapsed: true, // Set to true initially
                animated: 'medium',
                control: '#sidetreecontrol',
                prerendered: true,
                persist: 'location',
            });

            // Function to expand all nodes
            function expandAllNodes() {
                $('#tree').find('li.expandable').each(function() {
                    $(this).addClass('collapsable');
                    $(this).removeClass('expandable');
                    $(this).children('ul').show();
                });
            }

            // Call the function to expand all nodes
            expandAllNodes();
        });
    </script>

    <script>
        function previewImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var previewImg = document.getElementById('preview');
                    previewImg.setAttribute('src', e.target.result);
                    previewImg.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $(document).ready(function() {

            @if (isset($content))
                let test = `{{ $content->files()->value('title') }}`;
                if (test) {
                    $('.toggle-image').removeClass('d-none');
                }
            @endif
        })

        $(document).on('change', '#content_type_id', function() {
            let contentTypeId = $(this).val();
            console.log(contentTypeId);
            if (contentTypeId == 2) {
                $('.toggle-image').removeClass('d-none');
            } else {
                $('.toggle-image').addClass('d-none');
            }
        })
    </script>
@endsection
