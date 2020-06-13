@extends('layouts.app')
@section('title' , '| Edit Client')

{{-- 
@section('content-header')
    <section class="content-header cat-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="col-sm-4">
                        <h1>Edit Client</h1> 
                    </div>
                    <!-- breadcrumb -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
<li class="breadcrumb-item active">Edit Client</li>
</ol>
</div>
</div>
</div>
</div>
<!-- /.container -->
</section>
@endsection --}}

@section('content')
<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header">Edit Client</div>
                    <div class="card-body">
                        <form action="{{ route('clients.update', ['client'=>$client]) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="client-info">
                                <h4 class="header">Client Personal Info</h4>
                                <hr>
                                <div class="form-row ">
                                    <div class="form-group col-md-6">
                                        <label for="title">Title</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{$client['title']}}" id="title" autofocus autocomplete>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="phone">Contact Phone</label>
                                        <input type="text" name="phone"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{$client['phone']}}" id="phone" autocomplete="phone">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status"
                                            class="form-control @error('status') is-invalid @enderror">
                                            <option value="">Choose ...</option>
                                            <option value="personal" @if ($client['status']=='personal' ) {{'selected'}}
                                                @endif>Personal</option>
                                            <option value="company" @if ($client['status']=='company' ) {{'selected'}}
                                                @endif>Company</option>
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea name="desc" id="desc"
                                        class="form-control @error('desc') is-invalid @enderror">{{$client['description']}}</textarea>
                                    @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="from-group col-md-6">
                                        <label for="contract-start">Contract Start Date</label>
                                        <input type="date" name="contract-start" id="contract-start"
                                            class="form-control  @error('contract-start') is-invalid @enderror"
                                            value="{{$client['contract_start']}}">
                                        @error('contract-start')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="from-group col-md-6">
                                        <label for="contract-end">Contract End Date</label>
                                        <input type="date" name="contract-end" id="contract-end"
                                            class="form-control @error('contract-start') is-invalid @enderror"
                                            value="{{$client['contract_end']}}">
                                        @error('contract-end')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="services-add mt-4">
                                <h4 class="header">Add Services</h4>
                                <hr>
                                <div class="row mb-2">
                                    {{-- col --}}
                                    @if (! $fbServices->isEmpty() || ! $twServices->isEmpty())
                                    <div class="col-12 col-sm-6">
                                        @if (! $fbServices->isEmpty())
                                        <div class="col-md-12 mb-3">
                                            <h4><span># </span>Facbook</h4>
                                            <ul class="list-group list-group-flush">
                                                @foreach ($fbServices as $service)
                                                <li class="list-group-item">
                                                    <div class="icheck-danger">
                                                        <input type="checkbox" name="services[]" id="service-{{$service['id']}}"
                                                            class="float-right" value="{{$service['id']}}" 
                                                            @foreach ($clientServices as $clientService)
                                                                @if ($service['id'] == $clientService->pivot->service_id)
                                                                    {{'checked'}}
                                                                @endif
                                                            @endforeach >
                                                        <label for="service-{{$service['id']}}">{{$service['title']}}</label>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        @if (! $twServices->isEmpty())
                                        <div class="col-md-12 mb-3">
                                            <h4><span># </span>Twitter</h4>
                                            <ul class="list-group list-group-flush">
                                                @foreach ($twServices as $service)
                                                @if ($service['type'] == 'twitter')
                                                <li class="list-group-item" title="{{$service['type']}} ">
                                                    <div class="icheck-danger">
                                                        <input type="checkbox" name="services[]" id="service-{{$service['id']}}"
                                                            class="float-right" value="{{$service['id']}}" 
                                                            @foreach ($clientServices as $clientService)
                                                                @if ($service['id'] == $clientService->pivot->service_id)
                                                                    {{'checked'}}
                                                                @endif
                                                            @endforeach >
                                                        <label for="service-{{$service['id']}}">{{$service['title']}}</label>
                                                    </div>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        @if (! $othServices->isEmpty())
                                        <div class="col-md-12 mb-3">
                                            <h4><span># </span>Other Services</h4>
                                            <ul class="list-group list-group-flush">
                                                @foreach ($othServices as $service)
                                                @if ($service['type'] == 'other')
                                                <li class="list-group-item" title="{{$service['type']}} ">
                                                    <div class="icheck-danger">
                                                        <input type="checkbox" name="services[]" id="service-{{$service['id']}}"
                                                            class="float-right" value="{{$service['id']}}" 
                                                            @foreach ($clientServices as $clientService)
                                                                @if ($service['id'] == $clientService->pivot->service_id)
                                                                    {{'checked'}}
                                                                @endif
                                                            @endforeach >
                                                        <label for="service-{{$service['id']}}">{{$service['title']}}</label>
                                                    </div>
                                                </li>
                                                @endif
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
                                        <div class="col-md-12 mb-3">
                                            <h4><span># </span>Instagram</h4>
                                            <ul class="list-group list-group-flush">
                                                @foreach ($instaServices as $service)
                                                @if ($service['type'] == 'instagram')
                                                <li class="list-group-item">
                                                    <div class="icheck-danger">
                                                        <input type="checkbox" name="services[]" id="service-{{$service['id']}}"
                                                            class="float-right" value="{{$service['id']}}" 
                                                            @foreach ($clientServices as $clientService)
                                                                @if ($service['id'] == $clientService->pivot->service_id)
                                                                    {{'checked'}}
                                                                @endif
                                                            @endforeach >
                                                        <label for="service-{{$service['id']}}">{{$service['title']}}</label>
                                                    </div>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
    
                                        @if (! $tubeServices->isEmpty())
                                        <div class="col-md-12 mb-3">
                                            <h4><span># </span>Youtube</h4>
                                            <ul class="list-group list-group-flush">
                                                @foreach ($tubeServices as $service)
                                                @if ($service['type'] == 'youtube')
                                                <li class="list-group-item">
                                                    <div class="icheck-danger">
                                                        <input type="checkbox" name="services[]" id="service-{{$service['id']}}"
                                                            class="float-right" value="{{$service['id']}}" 
                                                            @foreach ($clientServices as $clientService)
                                                                @if ($service['id'] == $clientService->pivot->service_id)
                                                                    {{'checked'}}
                                                                @endif
                                                            @endforeach >
                                                        <label for="service-{{$service['id']}}">{{$service['title']}}</label>
                                                    </div>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                    @endif
                                    {{-- /.col --}}
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
                {{-- /.card --}}
            </div>
        </div>
        {{-- /.row --}}
    </div>
    {{-- /.container --}}
</section>
@endsection