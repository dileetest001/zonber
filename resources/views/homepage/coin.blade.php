@extends('layout')

@section('info')
    <coin-page
        :socket='socket'
        :room_id='"{{ $room_id }}"'></coin-page>
@endsection

@section('chat')
    <chat-page
        :socket='socket'
        :room_id='"{{ $room_id }}"'></chat-page>
@endsection


@section('sass')
    @include('common/sass', ['page' => 'coin'])
@endsection

@section('script')
    @include('common/script', ['page' => 'coin'])
@endsection
