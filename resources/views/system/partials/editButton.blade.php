@if (checkPermission($indexUrl .'/*'.'/edit','PUT'))
<a href="{{ route($indexUrl . '.edit', $item->id) }}" class="btn btn-success btn-sm mr-1"> <i class="fas fa-pen"></i>
</a>
@endif
