{{-- <ul id="menu-main-menu" class="menu">
    @php 
        $locale = app()->getlocale();
    @endphp
    <li><a href="/{{ $locale == 'en'? 'en': 'my'}}"><i class="fas fa-home"></i></a></li>
    @php
         dd($items);
     @endphp
    @foreach($items as $menu_item)
            @php
                $submenu = $menu_item->children;
            @endphp
             
            @if(count($submenu) >= 1)
                <li class="has-dropdown">
                    <a href="/{{($locale == 'en'? 'en': 'my').$menu_item->url }}">{{ $menu_item->title }}</a>
                    <ul class="sub-menu">
                        @foreach($submenu as $item)
                            <li><a href="{{$menu_item->url}}">{{$item->title}} </a></li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li>
                    <a href="/{{($locale == 'en'? 'en': 'my').$menu_item->url}}">{{ $menu_item->title }}</a>
                </li>
            @endif
    @endforeach
    
</ul> --}}

<ul>

    @php
    
        if (Voyager::translatable($items)) {
            $items = $items->load('translations');
        }
    
    @endphp
    @php 
        $locale = app()->getlocale();
    @endphp
    <li><a href="/{{ $locale == 'en'? 'en': 'my'}}"><i class="fas fa-home"></i></a></li>
    @foreach ($items as $item)
    
        @php
    
            $originalItem = $item;
            if (Voyager::translatable($item)) {
                $item = $item->translate($options->locale);
            }
    
            $isActive = null;
            $styles = null;
            $icon = null;
    
            // Background Color or Color
            if (isset($options->color) && $options->color == true) {
                $styles = 'color:'.$item->color;
            }
            if (isset($options->background) && $options->background == true) {
                $styles = 'background-color:'.$item->color;
            }
    
            // Check if link is current
            if(url($item->link()) == url()->current()){
                $isActive = 'active';
            }
    
            // Set Icon
            if(isset($options->icon) && $options->icon == true){
                $icon = '<i class="' . $item->icon_class . '"></i>';
            }
    
        @endphp
    
        <li class="{{ $isActive }}">
            <a href="/{{($locale == 'en'? 'en': 'my').'/'.$item->link()}}" target="{{ $item->target }}" style="{{ $styles }}">
                {!! $icon !!}
                <span>{{ $item->title }}</span>
            </a>
            @if(!$originalItem->children->isEmpty())
                @include('voyager::menu.default', ['items' => $originalItem->children, 'options' => $options])
            @endif
        </li>
    @endforeach
    
    </ul>
    