@extends('layouts.app')
@section('title', $detail->getTranslatedAttribute('title', app()->getLocale(), 'fallbackLocale'))
@section('detail')
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
              
                <h2>{{ $detail->getTranslatedAttribute('title', app()->getLocale(), 'fallbackLocale') }}</h2>
             
                {{-- @php
                    dd($detail);
                @endphp --}}
            </div>
        </div>
    </div>
</section>
@endsection
