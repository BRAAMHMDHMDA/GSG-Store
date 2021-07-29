@extends('dashboard.layouts.app')

@section('content_title', 'Create Category')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a></li>
    <li class="breadcrumb-item active">Edit Category</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal needs-validation" action="{{ route('categories.update',$category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                @include('dashboard.categories._form', [
                 'button' => 'Update',
                ])

            </form>
        </div>
    </div>

@endsection
