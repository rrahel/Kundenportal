@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><img src="{{asset("public/img/logo-werbedesign_wp-logo_dark.png")}}"></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label color">E-Mail Addresse</label>

                            <div class="col-md-12">
                                <input type="email" class="form-control" style="background-color: #da5959;color: white;" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 color">Kennwort</label>

                            <div class="col-md-12">
                                <input type="password" class="form-control" style="background-color: #da5959;color: white;"name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                        
                        <div class="checkbox col-md-6 color">
                                    <label>
                                        <input type="checkbox" name="remember"> Eingeloggt bleiben
                                    </label>
                                </div>
                        
                            <div class="col-md-6">
                             <button type="submit" class="btn btn-primary" style="color: white; background-color: #da5959; border-color: #da5959;">
                                    <i class="fa fa-btn fa-sign-in"></i>Anmelden
                                </button>                               
                            </div>
                             
                        </div>
                         
                    </form>
                   
                </div>
                 
            </div>
            <a class="btn btn-link link" href="{{ url('/password/reset') }}">Kennwort vergessen?</a>
        </div>
    </div>
</div>
@endsection
