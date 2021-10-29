<x-website-layout>
    <main class="main account">
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="d-icon-home"></i>
                        </a>
                    </li>
                    <li>Account</li>
                </ul>
            </div>
        </nav>
        <div class="page-content mt-4 mb-10 pb-6">
            <div class="container">
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
                <h2 class="title title-center mb-10">My Account</h2>
                <div class="tab tab-vertical gutter-lg">
                    <ul class="nav nav-tabs mb-4 col-lg-3 col-md-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#account">Account details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#address">Address</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#orders">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link logout" href="#">Logout</a>
                        </li>
                    </ul>
                    <div class="tab-content col-lg-9 col-md-8">
                        <div class="tab-pane active" id="account">
                            <fieldset>
                                <legend>Update My Profile:</legend>
                                <form action="{{route('website.account.update')}}" method="post" class="form">
                                @csrf
                                @method('put')

                                <label>Name *</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" required>

                                <label>Email Address *</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" required>

                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{$user->phone}}">

                                <button type="submit" class="btn btn-outline btn-primary">SAVE CHANGES</button>
                            </form>
                            </fieldset>

                            <fieldset>
                                <legend>Password Change</legend>

                                <form action="{{route('website.account.update_password')}}" method="post" class="form">
                                    @csrf
                                    @method('put')


                                    <label>Current password:</label>
                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">
                                    @error('current_password')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror

                                    <label>New password</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                                    @error('new_password')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror

                                    <label>Confirm new password</label>
                                    <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password">
                                    @error('new_confirm_password')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror

                                    <button type="submit" class="btn btn-outline btn-secondary">Change Password</button>

                                </form>
                            </fieldset>


                        </div>
                        <div class="tab-pane" id="address">
                            <p class="mb-2">The following addresses will be used on the checkout page by default.
                            </p>
                            <div class="row">
                                <div class="col-sm-6 mb-4">
                                    <div class="card card-address">
                                        <div class="card-body">
                                            <h5 class="card-title text-uppercase">Billing Address</h5>
                                            <p>John Doe<br>
                                                Riode Company<br>
                                                Steven street<br>
                                                El Carjon, CA 92020
                                            </p>
                                            <a href="#" class="btn btn-link btn-secondary btn-underline">Edit <i
                                                    class="far fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <div class="card card-address">
                                        <div class="card-body">
                                            <h5 class="card-title text-uppercase">Shipping Address</h5>
                                            <p>You have not set up this type of address yet.</p>
                                            <a href="#" class="btn btn-link btn-secondary btn-underline">Edit <i
                                                    class="far fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="orders">

                            @if(count($user->orders)!=0)
                                <table class="order-table">
                                <thead>
                                <tr>
                                    <th class="pl-2">Order</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th class="pr-2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($user->orders as $order)
                                        <tr>
                                            <td class="order-number"><a href="#">#{{$order->number}}</a></td>
                                            <td class="order-date"><time>{{$order->created_at->diffForHumans()}}</time></td>
                                            <td class="order-status"><span>{{$order->status}}</span></td>
                                            <td class="order-total"><span>${{$order->total}}</span></td>
                                            <td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">View</a></td>
                                         </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <div class="banner cta-simple">
                                    <div class="banner-content bg-white d-lg-flex align-items-center">
                                        <div class="banner-header pr-lg-7 pb-lg-0 pb-4 mb-lg-0 mb-6 mr-5">
                                            <h3 class="banner-title font-weight-bold ls-s text-uppercase">Hello,</h3>
                                            <h4 class="banner-subtitle font-weight-normal ls-s text-body">no previous order</h4>
                                        </div>

                                        <a href="{{route('website.cart.show')}}" class="btn btn-primary btn-ellipse btn-md btn-rounded">
                                            checkout your cart to make first order
                                            <i class="d-icon-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @push('scripts')

    @endpush
</x-website-layout>
