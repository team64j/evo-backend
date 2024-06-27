<h1 class="d-flex align-items-center m-0 px-3 py-2 fs-4">
    @if(!empty($help))
        <i class="fa fa-fw fs-5 me-2 text-muted {{ $icon }}"></i>
    @endif

    {{ $title ?? '' }}

    @if(!empty($help))
        <i class="fa fa-question-circle fs-6 ms-2 text-muted"
           onclick="event.target.parentElement.parentElement.querySelector('.alert').classList.toggle('d-none')"></i>
    @endif
</h1>

@if(!empty($help))
    <div class="alert alert-info mx-3 d-none">{!! $help !!}</div>
@endif
