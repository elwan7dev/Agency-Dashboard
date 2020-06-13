@extends('layouts.app')
@section('title' , '| Clients')


@section('content-header')
    <section class="content-header cat-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Clients</h1> 
                    <span class="badge badge-primary"> {{$count}} Clients Found</span>
                </div>
                <!-- breadcrumb -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Clients</li>
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
            <a href="{{ route('clients.create') }} " class="btn btn-primary mb-2"><i class="fas fa-plus mr-1"></i>New Client</a>

            @if(! $clients->isEmpty()) 
                <div class="table-responsive">
                    <table class="table main-table table-bordered  text-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Contact Phone</th>
                                <th scope="col">Status</th>
                                <th scope="col">Contract Start</th>
                                <th scope="col">Contract End</th>
                                <th scope="col">Join At</th>
                                <th colspan="col">Services</th>
                                <th colspan="col">Controls</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- loop on $rows array and print dynamic data --}}
                            @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{$client['id']}}</th>
                                    <td scope="row" title="Client Profile"> <a href="{{ route('clients.show', ['client'=>$client]) }}">{{$client['title']}}</a>  </td>
                                    <td>{{$client['phone']}} </td>
                                    <td>{{$client['status']}} </td>
                                    <td>{{$client['contract_start']}} </td>
                                    <td>{{$client['contract_end']}} </td>
                                    <td>{{$client['created_at']}} </td>
                                    <td>
                                        {{-- The route helper will automatically extract the model's primary key: --}}
                                        @if ($client->services->isEmpty())
                                            {{-- client doesn't subscribe any service --}}
                                            <a href="{{ route('clients.edit', ['client' => $client]) }}" class="btn btn-warning btn-sm">Add</a>
                                        @else
                                            {{-- client subscribe at least one service --}}
                                            <a href="{{ route('clients.show', ['client' => $client]) }}" class="btn btn-primary btn-sm">Show</a>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        <a href="{{ route('clients.edit', ['client' => $client]) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                        {{-- The route helper will automatically extract the model's primary key: --}}
                                        <form action="{{ route('clients.destroy', ['client'=>$client]) }}" method="POST" class="float-right">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm confirm"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info"> No Data Found</div>
            @endif
            {{ $clients->links() }}


        </div>
    </section>
    
@endsection
