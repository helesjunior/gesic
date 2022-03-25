@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => trans('backpack::base.welcome'),
        'content'     => trans('base.text_dashboard'),
        'button_link' => backpack_url('logout'),
        'button_text' => trans('base.logout'),
    ];
@endphp

@section('content')
@endsection
