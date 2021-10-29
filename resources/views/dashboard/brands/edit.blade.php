@extends('dashboard.layouts.app')

@section('content_title', 'Create Brand')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('brands.index')}}">Brands</a></li>
    <li class="breadcrumb-item active">Edit brand</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal needs-validation" action="{{ route('brands.update',$brand->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                @include('dashboard.brands._form', [
                 'button' => 'Update',
                ])

            </form>
        </div>
    </div>

@endsection
