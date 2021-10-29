@extends('dashboard.layouts.app')

@section('content_title', 'Brands List')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('brands.index')}}">Brands</a></li>
    <li class="breadcrumb-item active">Brands List</li>
@endsection

@section('breadcrumb-right')
    <a href="{{ route('brands.create') }}">
        <button type="button" class="btn btn-primary"><i data-feather='plus'></i> Add New Brand</button>
    </a>
@endsection

@section('content')
    <div class="row">
                <div class="col-12">
    <div class="card">
        @if(count($brands)!= 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <span class="font-weight-bold">{{ $brand->name }}</span>
                            </td>
                            <td>{{ $brand->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{route('brands.edit',$brand->id)}}">
                                    <button type="button" class="btn btn-sm btn-info">
                                        <i data-feather='edit'></i>
                                    </button>
                                </a>
                                <form action="{{ route('brands.destroy', $brand->id) }}" method="post"
                                      style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="delete btn btn-sm btn-danger"><i data-feather='trash-2'></i></button>
                                </form><!-- end of form -->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="card-footer">
                        {{ $brands->links() }}
                </div>
            </div>
        @else
            <div class="card-body alert-danger">
                <h2 style="color: red">There Are No Brands *_*</h2>
            </div>
        @endif
    </div></div></div>
@endsection

