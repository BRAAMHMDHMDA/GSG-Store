@extends('dashboard.layouts.app')

@section('content_title', 'Categories List')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a></li>
    <li class="breadcrumb-item active">Categories List</li>
@endsection

@section('breadcrumb-right')
    <a href="{{ route('categories.create') }}">
        <button type="button" class="btn btn-primary"><i data-feather='plus'></i> Add New Category</button>
    </a>
@endsection

@section('content')
    <div class="card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Parent Name</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            @if($category->image)
                                <img src="{{ $category->image_path }}" class="mr-75" height="40" width="40" alt="" />
                            @endif
                            <span class="font-weight-bold">{{ $category->name }}</span>
                        </td>
                        <td>{{ $category->slug }}</td>
                        <td>{!! $category->parent['name'] !!}</td>
                        <td>
                            @if( $category->status == 'active')
                                <span class="badge badge-pill badge-light-success mr-1">Active</span>
                            @else
                                <span class="badge badge-pill badge-light-warning mr-1">Draft</span>
                            @endif
                        </td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{route('categories.edit',$category->id)}}">
                            <button type="button" class="btn btn-sm btn-info">
                                <i data-feather='edit'></i>
                            </button>
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="post"
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
            <div class="pagination justify-content-left">
           {{ $categories->links() }}
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
