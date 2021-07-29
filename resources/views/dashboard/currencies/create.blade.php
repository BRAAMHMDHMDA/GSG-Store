@extends('dashboard.layouts.app')

@section('content_title', 'Create currency')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('currencies.index')}}">currencies</a></li>
    <li class="breadcrumb-item active">Create New currency</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal needs-validation" action="{{ route('currencies.store') }}" method="post">
                @csrf

                @include('dashboard.currencies._form', [
                 'button' => 'Add',
                ])

            </form>
        </div>
    </div>

@endsection
