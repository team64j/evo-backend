<h1 class="d-flex align-items-center m-0 px-3 py-2 fs-4">
    @isset($icon)
        <i class="fa fa-fw me-2 text-muted {{ $icon }}"></i>
    @endisset

    {{ $title ?? '' }}
</h1>
