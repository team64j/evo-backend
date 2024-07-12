@isset($cancel)
    <button type="button" class="btn btn-sm btn-default" onclick="Evo.actionCancel()">
        @lang('global.cancel')
    </button>
@endisset

@isset($save)
    <button type="button" class="btn btn-sm btn-success" onclick="Evo.actionSave()">
        @lang('global.save')
    </button>
@endisset

@isset($new)
    <button type="button" class="btn btn-sm btn-success" onclick="Evo.actionNew({{ json_encode($new) }})">
        {{ $new['title'] ?? __('global.new') }}
    </button>
@endisset
