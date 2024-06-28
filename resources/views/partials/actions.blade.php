@isset($cancel)
    <button type="button" class="btn btn-sm btn-default" onclick="app.actionCancel()">
        @lang('global.cancel')
    </button>
@endisset

@isset($save)
    <button type="button" class="btn btn-sm btn-success" onclick="app.actionSave()">
        @lang('global.save')
    </button>
@endisset

@isset($new)
    <button type="button" class="btn btn-sm btn-success" onclick="app.actionNew({{ json_encode($new) }})">
        @if(empty($new))
            @lang('global.new')
        @else
            {{ $new['title'] ?? '' }}
        @endif
    </button>
@endisset
