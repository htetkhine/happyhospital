@extends('voyager::master')


@section('content')  
    <div class="container-fluid">  
            <div class="float-left">
                    <h1 class="page-title">
                        <i class="voyager-home"></i> Contact Information
              
                        @forelse($siteinfos as $item)

                        @empty
                            <a href="{{route('siteinfo.create')}}" class="btn btn-success"><i class="voyager-plus" style="margin-right: 7px;"></i><span>Add New</span></a>    
                        @endforelse         
           
                    </h1>                
            </div>
            <div class="float-right">
                <h2 class="page-title">
                    Slider Image Upload
                </h2>
                <a href="{{ route('image.upload') }}" class="btn btn-primary">Upload</a>
            </div>
    </div>
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">                
                <div class="panel panel-bordered">
                     <div class="panel-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <table class="table table-hover dataTable no-footer" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Address</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Action</th>
                                        </tr>                      
                                    </thead>
                                    <tbody>
                                    @foreach ($siteinfos as $siteinfo)
                                        <tr style="height: 100px">
                                            <td class="text-center">{{ $siteinfo->address }}</td>
                                            <td class="text-center">{{ $siteinfo->phone }}</td>
                                            <td class="text-center">{{ $siteinfo->email }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-primary" href="{{ route('siteinfo.edit', $siteinfo->id) }}">Edit</a>

                                                    <form action="{{ route('siteinfo.destroy', $siteinfo->id)}}" method="post" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
  
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form>
                                               
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                     </div>
                </div>             
            </div>
        </div>

    </div>
       
@endsection