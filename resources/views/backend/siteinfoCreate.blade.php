@extends('voyager::master')


@section('content')
    
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="imgae-upload-form">

                    <form action="{{ action('ImageUploadController@store') }}" method="POST" enctype="multipart/form-data">
                        @csrf  

                        <h4>Upload Your Contact Information</h4>
                        <div class="row">
                            <div class="col-md-12">                        
                                
                                <div class="form-group">
                                    <label for="address">Address</label>
                                        <input name="address" type="text" class="form-control input-height" id="address" aria-describedby="titleHelp" value="{{ old('address') }}"> 
                                    @error('address')
                                        <small id="titleHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                   
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                        <input name="phone" type="text" class="form-control" id="phone" aria-describedby="phoneHelp" value="{{ old('phone') }}"> 
                                    @error('phone')
                                        <small id="phoneHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror 
                                  
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                                    @error('email')
                                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                  
                                </div>                        
                            </div>
                            <div class="col-md-12">
                                <input type="submit" value="Upload" class="btn btn-primary" name="form2">                        
                            </div> 
                                                  
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
@endsection