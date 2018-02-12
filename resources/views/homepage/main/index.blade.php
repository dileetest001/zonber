@extends('layout')

@section('content')
    <main-page
        :config='config'
        ></main-page>
@endsection

@section('sass')
    @include('common/sass', ['page' => 'main'])
@endsection

@section('script')
    @include('common/script', ['page' => 'main'])
@endsection

