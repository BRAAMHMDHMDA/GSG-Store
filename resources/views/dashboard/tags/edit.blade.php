@extends('dashboard.layouts.app')

@section('content_title', 'Create Tag')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('tags.index')}}">Tags</a></li>
    <li class="breadcrumb-item active">Edit Tag</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal needs-validation" action="{{ route('tags.update',$tag->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                @include('dashboard.tags._form', [
                 'button' => 'Update',
                ])

            </form>
        </div>
    </div>

@endsection
