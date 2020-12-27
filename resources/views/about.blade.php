@extends('layouts.app')

@section('about')
    {{-- <about-component></about-component> --}}
    <section class="inner-pg about-us">
        <div class="container">
            <div class="row">
                <div class="col-12">                  
                    @foreach ($about_dataes as $page)
                        @php
                            $id = $page->id;
                            $title = $page->title;
                            $content = $page->body;
                        @endphp
                        @if ($id == 2)
                            <div class="profile-img text-center">
                                <img src="{{URL::asset('storage/'.$page->image)}}" alt="<?php echo $title; ?>" class="img-fluid">
                            </div>
                            <div class="hello"><?php echo $content;?></div>
                        @endif
                    @endforeach  
                </div>    
                </div>
            </div>
        </div>
    </section>  
@endsection
