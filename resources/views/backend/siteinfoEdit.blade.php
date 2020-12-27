@extends('voyager::master')


@section('content') 
<div class="page-content browse container-fluid">   
       <div class="row">
           <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <form action="{{ route('siteinfo.update', $siteinfo->id) }}" method="post">
                            @csrf
                            @method('patch')
                                        
                            <h4>Upload Your Contact Information</h4>
                            <div class="row">
                                <div class="col-md-12">                        
                                        
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                            <input name="address" type="text" class="form-control input-height" id="address" aria-describedby="titleHelp" value="{{ $siteinfo->address }}"> 
                                        @error('address')
                                            <small id="titleHelp" class="form-text text-danger">{{ $errors->has('address') ?  $errors->first('address') : '' }}</small>
                                        @enderror
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                            <input name="phone" type="text" class="form-control" id="phone" aria-describedby="phoneHelp" value="{{ $siteinfo->phone }}"> 
                                        @error('phone')
                                            <small id="phoneHelp" class="form-text text-danger">{{ $errors->has('phone') ?  $errors->first('phone') : '' }}</small>
                                        @enderror 
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ $siteinfo->email }}">
                                        @error('email')
                                            <small id="emailHelp" class="form-text text-danger">{{ $errors->has('email') ?  $errors->first('email') : '' }}</small>
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
           </div>
       </div>
</div>
@endsection