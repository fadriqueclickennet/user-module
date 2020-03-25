@extends('layouts.account')

@section('title')
{{ trans('user::auth.login') }} | @parent
@stop

@section('content')
<div class="login-logo">
    <?php if(Setting::get('core::url-logo-login')){ ?>
        <img src="{{Setting::get('core::url-logo-login')}}" alt="Logo login" width="100%" height="80px">
    <?php } else { ?>
        <a href="{{ url('/') }}">{{ setting('core::site-name') }}</a>
    <?php } ?>
</div>
<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        @include('partials.notifications')
        {!! Form::open(['route' => 'login.post']) !!}
        <div class="input-group mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control  {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="{{ trans('user::auth.email') }}" autocomplete="off"
                autofocus value="{{ old('email')}}" style="border-right: none;">
            <div class="input-group-append input-group-text"
                style='background-color: white; border-left: none; border-radius: 0px; {{ $errors->has('email') ? 'border-color: red;' : '' }}'>
                <span class="fas fa-envelope"></span>
            </div>
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="input-group mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ trans('user::auth.password') }}"
                autocomplete="off" value="{{ old('password')}}" style="border-right: none;">
            <div class="input-group-append input-group-text"
                style='background-color: white; border-left: none; border-radius: 0px; {{ $errors->has('password') ? 'border-color: red;' : '' }}'>
                <span class="fas fa-lock"></span>
            </div>
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="row align-items-center mb-3">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember_me" >
                    <label for="remember" class="pl-1 font-weight-normal" style="font-size: 90%;">
                        {{ trans('user::auth.remember me') }}
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-12 mt-2">
                <button type="submit"
                    class="btn btn-primary btn-block">{{ trans('user::auth.login') }}</button>
            </div>
            <!-- /.col -->
        </div>
        </form>
        <p class="mb-1">
            <a href="{{ route('reset')}}">{{ trans('user::auth.forgot password') }}</a>
        </p>
        @if (config('asgard.user.config.allow_user_registration'))
        <p class="mb-0">
            <a href="{{ route('register')}}" class="text-center">{{ trans('user::auth.register')}}</a>
        </p>
        @endif
    </div>
    <!-- /.login-card-body -->
</div>

@stop