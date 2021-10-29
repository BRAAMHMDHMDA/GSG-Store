@extends('dashboard.layouts.app')

@section('content_title', 'Admins List')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admins.index')}}">Admins</a></li>
    <li class="breadcrumb-item active">Admins List</li>
@endsection

@section('breadcrumb-right')
    @can('admin-create')
        <a href="{{ route('admins.create') }}">
            <button type="button" class="btn btn-primary"><i data-feather='plus'></i> Add New Admin</button>
        </a>
    @endcan
@endsection

@section('content')
    <div class="card">
        @if(count($admins)!= 0)
            <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            @if($admin->image)
                                <img src="{{ $admin->image_path }}" class="mr-75" height="40" width="40" alt="" />
                            @endif
                            <span class="font-weight-bold">{{ $admin->name }}</span>
                        </td>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->phone }}</td>
                        <td>
                            @if(!empty($admin->getRoleNames()))
                                @foreach($admin->getRoleNames() as $role)
                                    <span class="badge badge-pill badge-light-dark mr-1">{{$role}}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if( $admin->status == 'active')
                                <span class="badge badge-pill badge-light-success mr-1">Active</span>
                            @else
                                <span class="badge badge-pill badge-light-warning mr-1">Draft</span>
                            @endif
                        </td>
                        <td>{{ $admin->created_at->diffForHumans() }}</td>
                        <td>
                            @can('admin-edit')
                                <a href="{{route('admins.edit',$admin->id)}}">
                                    <button type="button" class="btn btn-sm btn-info">
                                        <i data-feather='edit'></i>
                                    </button>
                                </a>
                            @endcan
                            @can('admin-delete')
                                <form action="{{ route('admins.destroy', $admin->id) }}" method="post"
                                      style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="delete btn btn-sm btn-danger"><i data-feather='trash-2'></i></button>
                                </form><!-- end of form -->
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                {{ $admins->links() }}
            </div>
        </div>
        @else
            <div class="card-body alert-danger">
                <h2 style="color: red">There Are No Admins *_*</h2>
            </div>
        @endif
    </div>
    </div>
@endsection
