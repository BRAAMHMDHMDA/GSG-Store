@extends('dashboard.layouts.app')

@section('content_title', 'Create Brand')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('brands.index')}}">Brands</a></li>
    <li class="breadcrumb-item active">Create New Brand</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal needs-validation" action="{{ route('brands.store') }}" method="post">
                @csrf

                @include('dashboard.brands._form', [
                 'button' => 'Add',
                ])

            </form>
        </div>
    </div>

@endsection
