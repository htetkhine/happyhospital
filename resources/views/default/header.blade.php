<header>
    <div class="header-social">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @php
                        $current_params = Route::current()->parameters();
                        
                    @endphp   
                    <ul class="language-menu">
                        <!-- Authentication Links -->
                            <div class="float-left">                                
                             
                            @if ($current_params['locale'] == 'en')                                
                          
                                    @foreach (config('app.available_locales') as $locale) 
                                        
                                        <li class="item {{ $current_params['locale'] == 'en' ?'active':''}}">
                                            <a href="{{ route(\Route::currentRouteName(), $current_params) }}" class="mr-3">
                                                @if ($current_params['locale'] == 'en')
                                                    {{ __('English') }}
                                                @else
                                                    {{ __('မြန်မာဘာသာ') }}
                                                @endif
                                                
                                            </a>
                                        </li>

                                        @if($current_params['locale'] == 'my')
                                        @php
                                            $current_params['locale'] = 'en';
                                        @endphp
                                        @else
                                            @php
                                                $current_params['locale'] = 'my';
                                            @endphp
                                        @endif 
                                    @endforeach
                            @else

                                    @foreach (config('app.available_locales') as $locale)
                                            
                                    <li class="item {{ $current_params['locale'] == 'my' ?'active':''}}">
                                        <a href="{{ route(\Route::currentRouteName(), $current_params) }}" class="mr-3">
                                            @if ($current_params['locale'] == 'my')
                                                {{ __('မြန်မာဘာသာ') }}
                                            @else
                                                {{ __('English') }} 
                                            @endif
                                        </a>
                                    </li>

                                    @if($current_params['locale'] == 'my')
                                    @php
                                        $current_params['locale'] = 'en';
                                    @endphp
                                    @else
                                        @php
                                            $current_params['locale'] = 'my';
                                        @endphp
                                    @endif 
                                @endforeach

                            
                            @endif
                               
                                
                            </div>
                            <div class="float-right">
                                <li class="item ml-md-4 align-self-md-center">
                                     
                                    
                                        @if($current_params['locale'] == 'my')
                                            @php
                                            $current_params['locale'] = 'en';
                                            @endphp

                                        @else
                                            @php
                                            $current_params['locale'] = 'my';
                                            @endphp

                                        @endif
                                       
                                        <language-switcher
                                            locale = "{{App()->getlocale()}}"
                                        
                                            link-en = "{{ route(\Route::currentRouteName(), $current_params) }}"                                       
                                        
                                            link-my = "{{ route(\Route::currentRouteName(), $current_params) }}"
                                    
                                        ></language-switcher>
                                                                  
                                   
                                </li> 
                            </div>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="header-logo">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-4">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                @php
                    $siteinfo = DB::table('siteinfos')->select('phone','email')->get();
                // $siteinfo = App\Siteinfo::get();
                @endphp
                <div class="col-lg-8 col-md-6 col-8">
                    <ul class="list-inline text-right">
                        <li class="list-inline-item">
                            <div class="media social-icon">
                                <img src="{{ asset('images/phone.png')}}" alt="phone" class="img-fluid">
                                <div class="media-body">
                                    <div class="social-data d-none d-lg-block">
                                        <p>{{__('Phone')}}</p>                                            
                                       <span><?php echo $siteinfo[0]->phone?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item separator">
                            <div class=" media social-icon">
                                <img src="{{ asset('images/mail.png')}}" alt="mail" class="img-fluid">
                                <div class="media-body">                                    
                                    <div class="social-data d-none d-lg-block">
                                        <p>{{__('Email')}}</p>
                                      <span><?php echo $siteinfo[0]->email?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="stellarnav">
                        {!! menu('main', 'default.menus.main') !!}
                    </div>
                </div>
                <div class="col-4">
                    
                     <!-- Right Side Of Navbar -->                    
                </div>
            </div>
        </div>
    </div>
</header>














{{-- <nav class="navbar navbar-expand-md navbar-light shadow-sm main-menu">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <div class="menu">
                {!! menu('main_menu', 'bootstrap') !!}
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                                    
                    <li class="nav-item">
                        <a href="{{route(Route::currentroutename(),'en')}}" class="nav-link">{{ __('En') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route(Route::currentroutename(),'my')}}" class="nav-link">{{ __('My') }}</a>
                    </li>
                    <li class="nav-item ml-md-4 align-self-md-center">
                        <language-switcher
                            locale = "{{App()->getlocale()}}"
                            link-en = "{{route(Route::currentRouteName(), 'en')}}"
                            link-my = "{{route(Route::currentRouteName(), 'my')}}"
                        ></language-switcher>
                    </li>                                                 
                
            </ul>
        </div>
    </div>
</nav> --}}
{{-- <slider-component></slider-component>     --}}

@php
    $images = \File::allFiles(public_path('upload/'));
@endphp

<section class="hospital-slider">
    <!-- Swiper -->
    <div class="swiper-container home-slide">
        <div class="swiper-wrapper">
            
            @foreach ($images as $key=>$image)
                <div class="swiper-slide">
                    <img src="{{ asset('upload/' . $image->getFilename()) }}" class="img-fluid">
                        <div class="carousel-caption container d-none d-lg-block">
                            <h1>ယုံကြည်ရသည့်သင့်ရဲ့ <br>ကျန်းမာရေးစောင့်ရှောက်မှု</h1>
                        </div>
                </div>
            @endforeach             
        </div>
        <!-- Add Pagination -->
        {{-- <div class="swiper-pagination"></div> --}}
        <!-- Add Arrows -->
        @if ($key >= 1)
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        @endif
      
    </div>
</section>
        


