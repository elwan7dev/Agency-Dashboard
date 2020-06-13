@extends('layouts.app')
@section('title' , '| Services')


@section('content-header')
    <section class="content-header cat-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Services</h1> 
                    <span class="badge badge-primary"> {{$count}} items Found</span>
                </div>
                <!-- breadcrumb -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Services</li>
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
            @if (! $allServices->isEmpty())
                <div class="card">
                    <div class="card-body card-primary card-outline">
                        <div class="row list-box mb-2">
                            {{-- col --}}
                            @if (! $fbServices->isEmpty() || ! $twServices->isEmpty())
                                <div class="col-12 col-sm-6">
                                    @if (! $fbServices->isEmpty())
                                        <div class="col-md-12 p-0 mb-3">
                                            <h4><span># </span>Facbook</h4>
                                            <ul class="list-group list-group-flush">
                                                @foreach ($fbServices as $service)
                                                        <li class="list-group-item">
                                                            <a href="#">{{$service['title']}}</a>
                                                            
                                                            <form action="{{ route('services.destroy', ['service'=>$service]) }}" method="POST" class="float-right">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger btn-sm float-right confirm"><i class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                            <a href="{{ route('services.edit', ['service'=>$service]) }}" class="btn btn-success btn-sm float-right mr-2"><i class="fas fa-edit"></i></a>
                                                            
                                                        </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (! $twServices->isEmpty())
                                        <div class="col-md-12 p-0 mb-3">
                                            <h4><span># </span>Twitter</h4>
                                            <ul class="list-group list-group-flush">
                                                @foreach ($twServices as $service)
                                                        <li class="list-group-item" title="{{$service['type']}} ">
                                                            <a href="#">{{$service['title']}}</a>  
                                                            <form action="{{ route('services.destroy', ['service'=>$service]) }}" method="POST" class="float-right">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger btn-sm float-right confirm"><i class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                            <a href="{{ route('services.edit', ['service'=>$service]) }}" class="btn btn-success btn-sm float-right mr-2"><i class="fas fa-edit"></i></a>                                            </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (! $othServices->isEmpty())
                                        <div class="col-md-12 p-0 mb-3">
                                            <h4><span># </span>Other Services</h4>
                                            <ul class="list-group list-group-flush">
                                                @foreach ($othServices as $service)
                                                        <li class="list-group-item" title="{{$service['type']}} ">
                                                            <a href="#">{{$service['title']}}</a>
                                                            {{-- The route helper will automatically extract the model's primary key: --}}
                                                            <form action="{{ route('services.destroy', ['service'=>$service]) }}" method="POST" class="float-right">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger btn-sm float-right confirm"><i class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                            <a href="{{ route('services.edit', ['service'=>$service]) }}" class="btn btn-success btn-sm float-right mr-2"><i class="fas fa-edit"></i></a>
                                                        </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                {{-- /.col-12 --}}
                            @endif
                            {{-- /.col --}}
        
                            {{-- col --}}
                            @if (! $instaServices->isEmpty() || ! $tubeServices->isEmpty())
                                <div class="col-12 col-sm-6">
                                    @if (! $instaServices->isEmpty())
                                        <div class="col-md-12 p-0 mb-3">
                                            <h4><span># </span>Instagram</h4>
                                            <ul class="list-group list-group-flush">
                                                @foreach ($instaServices as $service)
                                                        <li class="list-group-item">
                                                            <a href="#">{{$service['title']}}</a>
                                                            <form action="{{ route('services.destroy', ['service'=>$service]) }}" method="POST" class="float-right">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger btn-sm float-right confirm"><i class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                            <a href="{{ route('services.edit', ['service'=>$service]) }}" class="btn btn-success btn-sm float-right mr-2"><i class="fas fa-edit"></i></a>
                                                        </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    
                                    @if (! $tubeServices->isEmpty())
                                        <div class="col-md-12 p-0 mb-3">
                                            <h4><span># </span>Youtube</h4>
                                            <ul class="list-group list-group-flush">
                                                @foreach ($tubeServices as $service)
                                                        <li class="list-group-item" >
                                                            <a href="#" title="{{$service['type']}}" >{{$service['title']}}</a>
                                                            <form action="{{ route('services.destroy', ['service'=>$service]) }}" method="POST" class="float-right">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger btn-sm float-right confirm"><i class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                            <a href="{{ route('services.edit', ['service'=>$service]) }}" class="btn btn-success btn-sm float-right mr-2"><i class="fas fa-edit"></i></a>
                                                        </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            {{-- /.col --}}
                        </div>
                    </div>
                </div>
                
            @else
                <div class="alert alert-info">No Service Found</div>   
            @endif
            <a href="{{ route('services.create') }} " class="btn btn-primary"><i class="fas fa-plus mr-1"></i> new Service</a>

            

        </div>
        {{-- /. container --}}
    </section>
    
@endsection
