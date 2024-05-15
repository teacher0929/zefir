@extends('admin.layouts.app')
@section('title')
    @lang('app.products')
@endsection
@section('content')
    <div class="container-xxl py-4">
        <div class="h4 mb-3">
            <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
                <i class="bi-chevron-left"></i> @lang('app.products')
            </a> / @lang('app.add')
        </div>
    </div>
@endsection
