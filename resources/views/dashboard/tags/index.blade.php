@extends('dashboard.layouts.app')

@section('content_title', 'Tags List')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('tags.index')}}">Tags</a></li>
    <li class="breadcrumb-item active">Tags List</li>
@endsection

@section('breadcrumb-right')
    <a href="{{ route('tags.create') }}">
        <button type="button" class="btn btn-primary"><i data-feather='plus'></i> Add New Tag</button>
    </a>
@endsection

@section('content')
    <div class="row">
                <div class="col-12">
    <div class="card">
        @if(count($tags)!= 0)
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
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <span class="font-weight-bold">{{ $tag->name }}</span>
                            </td>
                            <td>{{ $tag->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{route('tags.edit',$tag->id)}}">
                                    <button type="button" class="btn btn-sm btn-info">
                                        <i data-feather='edit'></i>
                                    </button>
                                </a>
                                <form action="{{ route('tags.destroy', $tag->id) }}" method="post"
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
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        @else
            <div class="card-body alert-danger">
                <h2 style="color: red">There Are No Tags *_*</h2>
            </div>
        @endif
    </div></div></div>
@endsection

