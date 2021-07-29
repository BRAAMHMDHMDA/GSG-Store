@extends('dashboard.layouts.app')

@section('content_title', 'Create Tag')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('tags.index')}}">tags</a></li>
    <li class="breadcrumb-item active">Create New tag</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal needs-validation" action="{{ route('tags.store') }}" method="post">
                @csrf

                @include('dashboard.tags._form', [
                 'button' => 'Add',
                ])

            </form>
        </div>
    </div>

@endsection
