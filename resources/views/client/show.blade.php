@extends('layouts.app')
@section("title" , "Client Profile")


@section('content-header')
<section class="content-header cat-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>{{$client['title']}}</h1>
            </div>
            <!-- breadcrumb -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('clients.index') }}"> Clients</a>
                    </li>
                    <li class="breadcrumb-item active">{{$client['title']}}</li>

                </ol>
            </div>
        </div>
    </div>
    <!-- /.container -->
</section>
@endsection

@section('content')
<section class="content">
    <div class="container">
        <div class="row info">
            <!-- col - usre info -->
            <div class="col-md-3 personal-data">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="/default-avatar.jpg"
                                alt="Client profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$client['status']}}</h3>

                        <p class="text-muted text-center">{{$client['created_at']}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Services</b> <a class="float-right">{{count($clientServices)}} </a>
                            </li>
                            <li class="list-group-item">
                                <b>Revenue</b> <a class="float-right">0</a>
                            </li>
                            <li class="list-group-item">
                                <b>Likes</b> <a class="float-right">5000,000</a>
                            </li>
                            <li class="list-group-item">
                                <b>Views</b> <a class="float-right">1,130,287</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Basic Information</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-phone mr-1"></i>Contact Phone</strong>
                        <p class="text-muted">{{$client['phone']}}</p>
                        <hr>

                        <strong><i class="far fa-calendar-alt mr-1"></i> Contract Start Date</strong>
                        <p class="text-muted">{{$client['contract_start']}}</p>
                        <hr>

                        <strong><i class="far fa-calendar-times mr-1"></i> Contract End Date</strong>
                        <p class="text-muted">{{$client['contract_end']}}</p>
                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Description</strong>

                        <p class="text-muted">{{$client['description']}}</p>

                        <a href="{{ route('clients.edit', ['client'=>$client]) }}" class="btn btn-danger btn-block"><i class="fas fa-edit mr-2"></i><b>Edit</b></a>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->

            <div class="col-md-9 services-data">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <i class="fas fa-tag"></i> Subscribed Services
                        <a href="{{ route('clients.edit', ['client'=>$client]) }}" class="btn btn-danger btn-sm float-right"><i class="fas fa-edit mr-2"></i><b>Edit</b></a>
                    </div>
                    {{-- /.card-header --}}
                    <div class="card-body p-0">
                        @if (! $clientServices->isEmpty())
                            <ul class="services-list services-list-in-card px-2">
                                @foreach ($clientServices as $service)
                                    <li class="item">
                                        <a href="#" class="service-title">{{$service->title}}</a>
                                        <small class="text-muted">On {{$service->type}}</small>
                                        <div class="service-data">
                                            <span class="text-muted">Subscribed at {{$service->pivot->created_at}}</span>
                                            <a href="{{$service->pivot->link}}"><span class="badge badge-primary float-right">Service Link </span> </a> 
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="alert alert-danger">No Service Subscribed yet!</div>
                            <a href="{{ route('clients.edit', ['client' => $client]) }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>New Service</a>
                        @endif
                        

                    </div>
                    {{-- /.card-body --}}
                </div>
                {{-- /.card --}}
            </div>
            {{-- /.col --}}
        </div>
        <!-- /.client -->

    </div>
</section>

@endsection