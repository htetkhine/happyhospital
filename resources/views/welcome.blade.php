@extends('layouts.app')

@section('home')

<section class="hospital-about" style="backgroundImage: url('{{ asset('images/dotted_map.png')}}');background-repeat: no-repeat;background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                
                @foreach ($pages as $page)
                    @php
                        $id = $page->id;
                        $title = $page->title;
                        $excerpt = $page->excerpt;
                    @endphp
                    @if ($id == 2)
                        <div class="hospital-about-content default-title" data-aos="fade-right">
                            <h2>{{ __($title) }}</h2>
                            <p><?php echo $excerpt; ?></p>
                        </div>
                        <div class="text-center btn-margin" data-aos="fade-right">
                            <a href="{{ url(app()->getlocale().'/'.'about-us')}}" title="" class="btn btn-primary">{{__('Read more')}}</a>
                        </div>
                    @endif
                @endforeach               
            </div>
        </div>
    </div>
</section>
<section class="hospital-department">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="default-title">
                    <h2 class="text-uppercase">{{ __('Departments') }}</h2>
                </div>              
            </div>
        </div>
        <div class="row">
            @foreach ($departments as $department)
                @php
                   $title = $department->title;
                   $excerpt = $department->excerpt;
                @endphp
                @if ($department->add_home == 1)
                    <div class="col-lg-4 col-md-6 col-12 mb-lg-4 mb-md-4 mb-5">
                        <div class="card general-department" data-aos="fade-right">
                            <a href="" title="<?php echo $title; ?>" class="text-decoration-none">
                                <div class=" depts-icon-parent">
                                    <img src="{{URL::asset('storage/'.$department->image)}}" alt="<?php echo $title; ?>" class="img-fluid">
                                    @if (!empty($department->add_icon))
                                        <div class="depts-icon-child">
                                            <img src="{{ URL::asset('storage/'.$department->add_icon) }}" class="img-fluid">
                                        </div>
                                    @endif                                  
                                </div>
                                <div class="card-body content-align">
                                    <h5 class="text-center"><?php echo $title; ?></h5>
                                    <p class="text-center"><?php echo $excerpt; ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="col-12 text-center btn-margin">
                <a href="{{ url(app()->getlocale().'/'.'departments')}}" class="btn btn-primary alt">{{__('Read more')}}</a>
            </div>
        </div>
    </div>
</section>

@endsection
