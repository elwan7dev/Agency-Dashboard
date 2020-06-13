@extends('layouts.app')

@section('content')
<div class="container">
    <div class="home-stats text-center mb-4">
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


    <div class="latest">
        <div class="row">
            <div class="col-sm-6">
                <!-- TABLE: LATEST USERS -->
                <div class="card" id="users-card">
                    <div class="card-header border-transparent">
                        <i class="fas fa-users"></i> Latest Clients
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                       @if (false)
                       <table>
                            {{-- Future work --}}
                       </table>
                       @else
                        <div class='alert alert-info m-2'><b>+ </b>Future Work</div>                 
                       @endif
                    </div>
                    <!-- /.card-body -->
                               
                    <div class="card-footer clearfix">
                        <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary float-left"><i class="fas fa-plus mr-1"></i> New Client</a>
                        <a href="{{ route('clients.index') }}" class="btn btn-sm btn-secondary float-right">View All Clients</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-sm-6">
                <!--  Statistics -->
                <div class="card" id="items-card">
                    <div class="card-header border-transparent">
                        <i class="fas fa-chart-pie mr-1"></i> Statistics

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if (false)
                        <ul class="">
                           {{-- future work --}}
                        </ul>
                        @else
                            <div class='alert alert-info m-2'><b>+ </b>Future Work</div>                 
                        @endif
                    </div>
                    <!-- /.card-body -->
                            
                    <div class="card-footer text-center">
                        <a href="#" title="Future work" class="uppercase">View All Satistics</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        
    </div>
    
</div>
@endsection
