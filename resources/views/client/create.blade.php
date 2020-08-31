@extends('layouts.app')
@section('title' , '| New Client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card ">
                <div class="card-header">Add New Client</div>
                <div class="card-body">
                    <form action="{{ route('clients.store') }}" method="post" id="client_form">
                        @csrf
                        <div class="client-info">
                            <h4 class="header">Client Personal Info</h4>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" minlength="2" required
                                        class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                        value="{{old('title')}}" id="title" autofocus autocomplete>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="phone">Contact Phone</label>
                                    <input type="text" name="phone" required
                                        class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="Contact Phone" value="{{old('phone')}}" id="phone"
                                        autocomplete="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="" selected>Choose ...</option>
                                        <option value="personal">Personal</option>
                                        <option value="company">Company</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Client Description" required>{{old('description')}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="form-row">
                                <div class="from-group col-md-6">
                                    <label for="contract_start">Contract Start Date</label>
                                    <input type="date" name="contract_start" id="contract_start" required
                                        class="form-control  @error('contract_start') is-invalid @enderror"">
                                    @error('contract_start')     
                                        <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6">
                                    <label for="contract_end">Contract End Date</label>
                                    <input type="date" name="contract_end" id="contract_end" required
                                        class="form-control @error('contract_end') is-invalid @enderror"">
                                    @error('contract_end')     
                                        <span class=" invalid-feedback" role="alert">
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
                                            @if ($service['type'] == 'facebook')
                                            <li class="list-group-item">
                                                <div class="icheck-danger">
                                                    <input type="checkbox" name="services[]" id="service-{{$service['id']}}"
                                                        value="{{$service['id']}}">
                                                    <label for="service-{{$service['id']}}">{{$service['title']}}</label>
                                                </div>
                                            </li>
                                            @endif
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
                                            <li class="list-group-item">
                                                <div class="icheck-danger">
                                                    <input type="checkbox" name="services[]" id="service-{{$service['id']}}"
                                                        value="{{$service['id']}}">
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
                                                        value="{{$service['id']}}">
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
                                                        value="{{$service['id']}}">
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
                                                        value="{{$service['id']}}">
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
                        
                        <button type="submit" class="btn btn-primary">Add New Client</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection