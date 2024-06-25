@extends('main')

@section('title')
    <h1>@lang('global.' . $element)</h1>
@endsection

@section('content')
    <table class="table">
        <tbody>
        @foreach($elements as $item)
            <tr>
                <td>
                    {{ $item->id }}
                </td>
                <td>
                    {{ $item->name }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
