@extends('page')

@section('title')
    @component('partials.title', ['icon' => 'fa fa-newspaper'])
        {{ $model->name ?: __('global.new_template') }}
    @endcomponent
@endsection

@section('content')
    <div>
        @lang('global.templates')
    </div>
@endsection
