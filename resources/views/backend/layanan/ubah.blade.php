@extends('backend.layout.master')

@section('title')
<title>Panca Logam | Ubah Layanan</title>
@endsection

@section('headscript')
<script src="{{asset('backend/vendors/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/vendors/ckfinder/ckfinder.js')}}"></script>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Ubah Layanan<small></small></h2>
          <ul class="nav panel_toolbox">
            <a href="{{ route('layanan.index') }}" class="btn btn-primary btn-sm">Kembali</a>
          </ul>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          <form action="{{ route('layanan.update') }}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="hidden" name="layanan_id" value="{{$get->id}}">

            <div class="item form-group {{ $errors->has('kategori') ? 'has-error' : ''}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Layanan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="kategori" class="form-control col-md-7 col-xs-12" name="kategori">
                  <option value="">--Pilih--</option>
                  <option value="PRODUK" {{ old('kategori', $get->kategori) == 'PRODUK' ? 'selected=""' : '' }}>PRODUK</option>
                  <option value="SERVIS" {{ old('kategori', $get->kategori) == 'SERVIS' ? 'selected=""' : '' }}>SERVIS</option>
                  <option value="SCRAPSERVIS" {{ old('kategori', $get->kategori) == 'SCRAPSERVIS' ? 'selected=""' : '' }}>SCRAP SERVIS</option>
                  <option value="SCRAPPROYEK" {{ old('kategori', $get->kategori) == 'SCRAPPROYEK' ? 'selected=""' : '' }}>SCRAP PROYEK</option>
                  <option value="SCRAPPRODUK" {{ old('kategori', $get->kategori) == 'SCRAPPRODUK' ? 'selected=""' : '' }}>SCRAP PRODUK</option>
                </select>
                @if($errors->has('kategori'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('kategori')}}</span></code>
                @endif
              </div>
            </div>

            <div class="item form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nama" class="form-control col-md-7 col-xs-12" name="nama" type="text" value="{{ old('nama', $get->nama) }}">
                @if($errors->has('nama'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('nama')}}</span></code>
                @endif
              </div>
            </div>

            <div class="item form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="deskripsi" class="form-control" name="deskripsi">{{ old('deskripsi', $get->deskripsi) }}</textarea>
                @if($errors->has('deskripsi'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('deskripsi')}}</span></code>
                @endif
              </div>
            </div>

            <div class="item form-group {{ $errors->has('img_url') ? 'has-error' : ''}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="img_url" class="form-control" name="img_url" type="file" accept=".jpg,.png">
                @if($errors->has('img_url'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('img_url')}}</span></code>
                @endif
              </div>
            </div>

            <div class="item form-group {{ $errors->has('type') ? 'has-error' : ''}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12"> &nbsp; </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <img width="20%" src="{{ asset('amadeo/images/'.$get->img_url) }}" alt="{{ $get->img_alt }}">
              </div>
            </div>

            <div class="ln_solid"></div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <a href="{{ route('layanan.index') }}" class="btn btn-primary">Batal</a>
                <button id="send" type="submit" class="btn btn-success">Ubah</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('script')
<script type="text/javascript">

  CKEDITOR.replace('deskripsi', {
    toolbar: [
      { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
      { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
      { name: 'editing', groups: [ 'find', 'selection' ] },
      { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
      { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
      { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
      { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
      { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
      { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
      { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
      { name: 'others', items: [ '-' ] },
      { name: 'about', items: [ 'About' ] }
    ]
  });
</script>

@endsection
