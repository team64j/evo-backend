@extends('page')

@section('title')
    @include('partials.title', ['icon' => $icon, 'title' => __('global.' . $element)])
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
