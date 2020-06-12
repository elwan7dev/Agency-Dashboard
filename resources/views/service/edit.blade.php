@extends('layouts.app')
@section('title' , '| Edit service')

{{-- 
@section('content-header')
    <section class="content-header cat-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="col-sm-4">
                        <h1>Edit service</h1> 
                    </div>
                    <!-- breadcrumb -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">services</a></li>
                            <li class="breadcrumb-item active">Edit service</li>
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
                        <div class="card-header">Edit service</div>
                        <div class="card-body">
                            <form action="{{ route('services.update', ['service'=>$service]) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                    value="{{$service['title']}}" id="title" autofocus  autocomplete>
                                    @error('title')     
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{old('type')}}" autocomplete="type">
                                        <option value="">Choose ...</option>
                                        <option value="facebook" @if ($service['type'] == 'facebook')
                                            {{'selected'}}
                                        @endif>Facebook</option>
                                        <option value="twitter" @if ($service['type'] == 'twitter')
                                            {{'selected'}}
                                        @endif>Twitter</option>
                                        <option value="youtube" @if ($service['type'] == 'youtube')
                                            {{'selected'}}
                                        @endif>Youtube</option>
                                        <option value="instagram" @if ($service['type'] == 'instagram')
                                            {{'selected'}}
                                        @endif>Instagram</option>
                                        <option value="other" @if ($service['type'] == 'other')
                                            {{'selected'}}
                                        @endif>Other</option>
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
                                <textarea name="desc" id="desc" rows="3" class="form-control @error('desc') is-invalid @enderror">{{$service['description']}}</textarea>
                                @error('desc')     
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
