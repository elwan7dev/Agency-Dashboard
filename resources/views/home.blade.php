@extends('layouts.app')

@section('content')
<div class="container">
    <div class="home-stats text-center">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="stat bg-info">
                    Total Clients
                    <a href="{{ route('clients.index') }}">
                        <span>
                            {{count($clients)}}
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat bg-danger">
                    Total Services
                    <a href="{{ route('services.index') }}">
                        <span>
                            {{count($services)}}
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat bg-success">
                    Subscribed Process
                    <a href="#">
                        <span>
                            +
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="stat bg-warning">
                    Revenue
                    <a href="+">
                        <span>
                            +
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
