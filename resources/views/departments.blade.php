@extends('layouts.app')

@section('departments')
<section class="hospital-department">
    <div class="container">
        <div class="row">        
             @foreach ($departments as $department)
                @php
                    $title = $department->title;
                    $excerpt = $department->excerpt;
                    
                @endphp
                <div class="col-lg-4 col-md-6 col-12 mb-lg-4 mb-md-4 mb-5">
                    <div class="card general-department" data-aos="fade-right">
                        <a href="{{ route('single',['locale' => app()->getLocale(), 'slug' => $department->slug])}}" title="<?php echo $title; ?>" class="text-decoration-none">
                            <div class=" depts-icon-parent">
                                <img src="{{URL::asset('storage/'.$department->image)}}" alt="<?php echo $title; ?>" class="img-fluid">
                                @if (!empty($department->add_icon))
                                    <div class="depts-icon-child">
                                        <img src="{{ URL::asset('storage/'.$department->add_icon) }}" class="img-fluid">
                                    </div>
                                @endif                                  
                            </div>                        
                            <div class="card-body content-align">
                                <h5 class="text-center"><?php echo $title;?></h5>
                                <p class="text-center"><?php echo $excerpt; ?></p>
                            </div>
                        </a>
                        
                    </div>
                </div>
             @endforeach   
                
        
            <div class="col-12">
                {{ $departments->links() }}                                            
            </div>
        </div>
    </div>
</section>
@endsection
