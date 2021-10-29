@extends('dashboard.layouts.app')

@section('content_title', 'Edit Admin')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admins.index')}}">Admins</a></li>
    <li class="breadcrumb-item active">Edit Admin</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal needs-validation" action="{{ route('admins.update',$admin->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                @include('dashboard.admins._form', [
                 'button' => 'Update',
                ])

            </form>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        let roles = @php echo json_encode($roles_id);@endphp;
        $('#roles').val(roles);
    </script>
@endpush
