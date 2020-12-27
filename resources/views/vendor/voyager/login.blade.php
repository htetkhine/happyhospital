@extends('voyager::auth.master')

@section('content')
<div class="outer-wrapper">
    <div class="logo-wrap text-center">
        <img class="img-fluid" src="https://www.myyangon.com.mm/storage/settings/October2020/HML3crvMb33vvDYMAthx.png" alt="Logo Icon">
    </div>
    <div class="login-container">
        <form action="{{ route('voyager.login') }}" method="POST">
            @csrf
            <div class="form-group form-group-default" id="emailGroup">
                <label>{{ __('voyager::generic.email') }}</label>
                <div class="controls">
                    <input type="text" name="email" id="email" aria-describedby="emailhelp" value="{{ old('email') }}" placeholder="{{ __('example@gmail.com') }}" class="form-control" required>
                                
                    @error('email')
                        <small id="emailhelp" class="form-text text-danger font-weight-500">{{ $message }}</small>
                    @enderror                               
                 </div>
            </div>
    
            <div class="form-group form-group-default" id="passwordGroup">
                <label>{{ __('voyager::generic.password') }}</label>
                <div class="controls">
                    <input type="password" aria-describedby="passwordhelp" name="password" placeholder="{{ __('voyager::generic.password') }}" class="form-control" required>
                    @error('password')
                        <small id="passwordhelp" class="form-text text-danger font-weight-500">{{ $message }}</small>
                    @enderror  
                </div>
            </div>
    
            <div class="form-group" id="rememberMeGroup">
                <div class="controls">
                <input type="checkbox" name="remember" id="remember" value="1"><label for="remember" class="remember-me-text">{{ __('voyager::generic.remember_me') }}</label>
                </div>
            </div>
                        
            <button type="submit" class="btn btn-block login-button">
                <span class="signingin hidden"><span class="voyager-refresh"></span> {{ __('voyager::login.loggingin') }}...</span>
                <span class="signin">{{ __('voyager::generic.login') }}</span>
            </button>    
      </form>

        <div style="clear:both"></div>
        @if(!$errors->isEmpty())
        <div class="alert alert-red">
          <ul class="list-unstyled">
              @foreach($errors->all() as $err)
              <li>{{ $err }}</li>
              @endforeach
          </ul>
        </div>
        @endif
                    
    </div> <!-- .login-container -->
</div>
@endsection
