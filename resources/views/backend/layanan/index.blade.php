@extends('backend.layout.master')

@section('title')
  <title>Panca Logam | Layanan</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
<script src="{{asset('backend/vendors/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/vendors/ckfinder/ckfinder.js')}}"></script>
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


  <div class="modal fade modal-form-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('layanan.store') }}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel2">Tambah Layanan</h4>
          </div>
          <div class="modal-body">
            {{ csrf_field() }}
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Layanan</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select id="kategori" class="form-control col-md-7 col-xs-12" name="kategori">
                  <option value="">--Pilih--</option>
                  <option value="PRODUK" {{ old('kategori') == 'PRODUK' ? 'selected=""' : '' }}>PRODUK</option>
                  <option value="SERVIS" {{ old('kategori') == 'SERVIS' ? 'selected=""' : '' }}>SERVIS</option>
                  <option value="SCRAPSERVIS" {{ old('kategori') == 'SCRAPSERVIS' ? 'selected=""' : '' }}>SCRAP SERVIS</option>
                  <option value="SCRAPPROYEK" {{ old('kategori') == 'SCRAPPROYEK' ? 'selected=""' : '' }}>SCRAP PROYEK</option>
                  <option value="SCRAPPRODUK" {{ old('kategori') == 'SCRAPPRODUK' ? 'selected=""' : '' }}>SCRAP PRODUK</option>
                </select>
                @if($errors->has('kategori'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('kategori')}}</span></code>
                @endif
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input id="nama" class="form-control col-md-7 col-xs-12" name="nama" type="text" value="{{ old('nama') }}">
                @if($errors->has('nama'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('nama')}}</span></code>
                @endif
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea id="deskripsi" class="form-control col-md-7 col-xs-12" name="deskripsi">{{ old('deskripsi') }}</textarea>
                @if($errors->has('deskripsi'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('deskripsi')}}</span></code>
                @endif
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar Max 700x700</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" name="img_url" type="file" accept=".jpg,.png">
                @if($errors->has('img_url'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('img_url')}}</span></code>
                @endif
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button id="send" type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content alert-danger">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Hapus Layanan</h4>
        </div>
        <div class="modal-body">
          <h4>Yakin ?</h4>
        </div>
        <div class="modal-footer">
          <a class="btn btn-primary" id="setDelete">Ya</a>
        </div>

      </div>
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Layanan </h2>
          <ul class="nav panel_toolbox">
            <a class="btn btn-success btn-sm" data-toggle='modal' data-target='.modal-form-add'><i class="fa fa-plus"></i> Tambah</a>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content table-responsive">
          <table id="layanan-table" class="table table-striped table-bordered no-footer" width="100%">
            <thead>
              <tr role="row">
                <th>No</th>
                <th>Layanan</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @php
              $no = 1;
            @endphp
            @foreach ($getLayanan as $key)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{!! $key->kategori !!} </td>
                <td>{!! $key->deskripsi !!}</td>
                <td><img src="{{ asset('amadeo/images/'.$key->img_url) }}" alt="{{ $key->img_alt}}" width="50%"></td>
                <td>
                  <a href="{{ route('layanan.edit', ['id' => $key->id]) }}" class="update"><span class="btn btn-xs btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Update"><i class="fa fa-pencil"></i></span></a>
                  <a href="" class="delete" data-value="{{ $key->id }}" data-toggle="modal" data-target=".modal-delete"><span class="btn btn-xs btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></span></a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-scroller/js/datatables.scroller.min.js') }}"></script>
<script type="text/javascript">
  $('#layanan-table').DataTable();

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

  $(function(){
    $('#layanan-table').on('click', 'a.delete', function(){
      var a = $(this).data('value');
      $('#setDelete').attr('href', "{{ url('/') }}/admin/layanan/hapus/"+a);
    });
  });

</script>

@if(Session::has('false-form'))
<script>
$('.modal-form-add').modal('show');
</script>
@endif

@endsection
