@extends('client.layouts.app')
@section('title')
    Home
@endsection
@section('content')
    @include('client.home.brands')
    @include('client.home.categories')
@endsection
