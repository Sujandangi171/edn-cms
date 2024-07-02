<div class="row">
    <div class="col-sm-3">
        <label for="name">{{ isset($input['label']) ? $input['label'] : '' }}</label>
    </div>
    <div class="col-sm-9">
        @if (isset($input['isLink']) && $input['isLink'] === true)
            <p>: &nbsp; &nbsp;{!! isset($input['value'])
                ? '<a href="' . $input['value'] . '" target="_blank">' . $input['value'] . '</a>'
                : '' !!}</p>
        @else
            <p>: &nbsp; &nbsp;{{ isset($input['value']) ? $input['value'] : '' }}</p>
        @endif
    </div>

</div>
