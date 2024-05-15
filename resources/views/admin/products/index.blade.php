@extends('admin.layouts.app')
@section('title')
    @lang('app.products')
@endsection
@section('content')
    <div class="container-xxl py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="h3 mb-0">@lang('app.products')</div>
            <div><a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm"><i class="bi-plus-lg"></i> Add</a></div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                    <tr>
                        <th>@lang('app.id')</th>
                        <th>@lang('app.user')</th>
                        <th>@lang('app.gender')</th>
                        <th>@lang('app.category')</th>
                        <th>@lang('app.brand')</th>
                        <th>@lang('app.color')</th>
                        <th>@lang('app.name')</th>
                        <th>@lang('app.price')</th>
                        <th>@lang('app.sizes')</th>
                        <th><i class="bi-gear"></i></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($objs as $obj)
                    <tr>
                        <td>{{ $obj->id }}</td>
                        <td>{{ $obj->user->getName() }}</td>
                        <td>{{ $obj->gender->getName() }}</td>
                        <td>{{ $obj->category->getName() }}</td>
                        <td>{{ $obj->brand->getName() }}</td>
                        <td>{{ $obj->color->getName() }}</td>
                        <td>
                            <a href="{{ route('products.show', $obj->slug) }}" class="text-decoration-none" target="_blank">
                                {{ $obj->name }}
                            </a>
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
