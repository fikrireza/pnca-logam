@extends('backend.layout.master')

@section('title')
  <title>Panca Logam | Email</title>
@endsection

@section('content')
  @if(Session::has('berhasil'))
  <script>
    window.setTimeout(function() {
      $(".alert-success").fadeTo(700, 0).slideUp(700, function(){
          $(this).remove();
      });
    }, 5000);
  </script>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{ Session::get('berhasil') }}</strong>
      </div>
    </div>
  </div>
  @endif


  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Email Kontak</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form action="{{ route('general.emailUpdate') }}" method="POST" class="form-horizontal form-label-left">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $getEmail['id'] }}">
            <div class="item form-group {{ $errors->has('email_to') ? 'has-error' : ''}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Email To <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="email_to" class="form-control col-md-7 col-xs-12" name="email_to" required="required" type="email" value="{{ old('emial_to', $getEmail['email_to']) }}">
                @if($errors->has('email_to'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('email_to')}}</span></code>
                @endif
              </div>
            </div>
            <div class="item form-group {{ $errors->has('email_cc') ? 'has-error' : ''}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Email CC <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="email_cc" class="form-control col-md-7 col-xs-12" name="email_cc" required="required" type="email" value="{{ old('email_cc', $getEmail['email_cc']) }}">
                @if($errors->has('email_cc'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('email_cc')}}</span></code>
                @endif
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button id="send" type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection
