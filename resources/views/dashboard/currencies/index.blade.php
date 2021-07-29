@extends('dashboard.layouts.app')

@section('content_title', 'Currencies List')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('currencies.index')}}">Currencies</a></li>
    <li class="breadcrumb-item active">Currencies List</li>
@endsection

@section('breadcrumb-right')
    <a href="{{ route('currencies.create') }}">
        <button type="button" class="btn btn-primary"><i data-feather='plus'></i> Add New Currency</button>
    </a>
@endsection

@section('content')
    <div class="card">
        @if(count($currencies)!= 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Decimal Numbers</th>
                        <th>Primary</th>
{{--                        <th>Created At</th> --}}
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($currencies as $currency)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <span class="font-weight-bold">{{ $currency->name }}</span>
                            </td>
                            <td>{{ $currency->code }}</td>
                            <td>{{ $currency->decimal_numbers }}</td>
                            <td>
                                @if( $currency->is_primary == true)
                                    <span class="badge badge-pill badge-light-success mr-1">Primary</span>
                                @else
                                    <span class="badge badge-pill badge-light-warning mr-1">Non Primary</span>
                                @endif
                            </td>
{{--                            <td>{{ $currency->created_at->diffForHumans() }}</td>--}}
                            <td>
                                <a href="{{route('currencies.edit',$currency->id)}}">
                                    <button type="button" class="btn btn-sm btn-info">
                                        <i data-feather='edit'></i>
                                    </button>
                                </a>
                                <form action="{{ route('currencies.destroy', $currency->id) }}" method="post"
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
                        {{ $currencies->links() }}
                    </div>
                </div>
            </div>
        @else
            <div class="card-body alert-danger">
                <h2 style="color: red">There Are No Currencies *_*</h2>
            </div>
        @endif
    </div>
@endsection

