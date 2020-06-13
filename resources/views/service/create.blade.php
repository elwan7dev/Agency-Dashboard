@extends('layouts.app')
@section('title' , '| New Service')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Service</div>
                    <div class="card-body">
                        <form action="{{ route('services.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                placeholder="Service's Title" value="{{old('title')}}" id="title" autofocus  autocomplete>
                                @error('title')     
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{old('type')}}" autocomplete="type">
                                    <option value="" selected>Choose ...</option>
                                    <option value="facebook">Facebook</option>
                                    <option value="twitter" >Twitter</option>
                                    <option value="youtube" >Youtube</option>
                                    <option value="instagram" >Instagram</option>
                                    <option value="other" >Other</option>
                                </select>
                                @error('type')     
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="desc" id="desc" rows="3" class="form-control @error('desc') is-invalid @enderror" placeholder="Service's Description">{{old('desc')}}</textarea>
                            @error('desc')     
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Add Service</button>
                        </form>    
                    </div>  
                </div>  
                
            </div>
        </div>
    </div>
@endsection
