@extends('client.layouts.app')
@section('title')
    Home
@endsection
@section('content')
    @include('client.home.index.brands')
    @include('client.home.index.categories')
@endsection
