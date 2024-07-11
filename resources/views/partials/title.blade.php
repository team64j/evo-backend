<h1 class="d-flex align-items-center m-0 px-3 py-2 fs-4">
    @if(!empty($icon))
        <i class="fa fa-fw fs-5 me-2 text-muted {{ $icon }}"></i>
    @endif

    {{ $slot ?? $title ?? '' }}

    @if(!empty($help))
            <i class="fa fa-question-circle fs-6 ms-2 text-muted" role="button"
               @click="showHelpTitle=!showHelpTitle"></i>
    @endif
</h1>

@if(!empty($help))
    <div class="alert alert-info mx-3" style="display: none" v-show="showHelpTitle" v-html="`{{ $help }}`"></div>
@endif
