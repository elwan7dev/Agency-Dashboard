@extends('layouts.app')
@section('title' , '| New Client')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Client</div>
                    <div class="card-body">
                        <form action="{{ route('clients.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                            placeholder="Title" value="{{old('title')}}" id="title" autofocus  autocomplete>
                            @error('title')     
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" placeholder="Desc">{{old('desc')}}</textarea>
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
                                placeholder="Contact Phone" value="{{old('phone')}}" id="phone" autocomplete="phone">
                                @error('phone')     
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="" selected>Choose ...</option>
                                    <option value="personal">Personal</option>
                                    <option value="company" >Company</option>
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
                                <input type="date" name="contract-start" id="contract-start" class="form-control  @error('contract-start') is-invalid @enderror"">
                                @error('contract-start')     
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="from-group col-md-6">
                                <label for="contract-end">Contract End Date</label>
                                <input type="date" name="contract-end" id="contract-end" class="form-control @error('contract-start') is-invalid @enderror"">
                                @error('contract-end')     
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary  mt-3">Add Client</button>
                        </form>    
                    </div>  
                </div>  
                
            </div>
        </div>
    </div>
@endsection
