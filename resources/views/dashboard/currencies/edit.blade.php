@extends('dashboard.layouts.app')

@section('content_title', 'Create currency')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('currencies.index')}}">currencies</a></li>
    <li class="breadcrumb-item active">Edit currency</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal needs-validation" action="{{ route('currencies.update',$currency->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                @include('dashboard.currencies._form', [
                 'button' => 'Update',
                ])

            </form>
        </div>
    </div>

@endsection
