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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Client</div>
                        <div class="card-body">
                            <form action="{{ route('clients.update', ['client'=>$client]) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                value="{{$client['title']}}" id="title" autofocus  autocomplete>
                                @error('title')     
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$client['description']}}</textarea>
                                @error('desc')     
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="phone">Contact Phone</label>
                                    <input type="text" name="phone" class="form-control @error('title') is-invalid @enderror" 
                                    value="{{$client['phone']}}" id="phone" autocomplete="phone">
                                    @error('phone')     
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Choose ...</option>
                                        <option value="personal" @if ($client['status'] == 'personal')
                                            {{'selected'}}
                                        @endif>Personal</option>
                                        <option value="company" @if ($client['status'] == 'company')
                                            {{'selected'}}
                                        @endif>Company</option>
                                    </select>
                                    @error('status')     
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="from-group col-md-6">
                                    <label for="contract-start">Contract Start Date</label>
                                <input type="date" name="contract-start" id="contract-start" class="form-control  @error('contract-start') is-invalid @enderror" 
                                    value="{{$client['contract_start']}}">
                                    @error('contract-start')     
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6">
                                    <label for="contract-end">Contract End Date</label>
                                    <input type="date" name="contract-end" id="contract-end" class="form-control @error('contract-start') is-invalid @enderror"
                                    value="{{$client['contract_end']}}">
                                    @error('contract-end')     
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary  mt-3">Save</button>
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
