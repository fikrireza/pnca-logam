@extends('backend.layout.master')

@section('title')
  <title>Panca Logam | Menu</title>
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
        <form action="{{ route('general.menuUpdate') }}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel2">Ubah Menu</h4>
          </div>
          <div class="modal-body">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $getMenu['id'] }}">
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Produk</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea id="deskripsi_produk" class="form-control col-md-7 col-xs-12" name="produk">{{ old('produk', $getMenu['produk']) }}</textarea>
                @if($errors->has('produk'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('produk')}}</span></code>
                @endif
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar Produk Max 700x700</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" name="img_produk" type="file" accept=".jpg,.png">
                @if($errors->has('img_produk'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('img_produk')}}</span></code>
                @endif
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Servis</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea id="deskripsi_servis" class="form-control col-md-7 col-xs-12" name="servis">{{ old('servis', $getMenu['servis']) }}</textarea>
                @if($errors->has('servis'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('servis')}}</span></code>
                @endif
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar Servis Max 700x700</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" name="img_servis" type="file" accept=".jpg,.png">
                @if($errors->has('img_servis'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('img_servis')}}</span></code>
                @endif
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Scrap Produk</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea id="deskripsi_scrapproduk" class="form-control col-md-7 col-xs-12" name="scrapproduk">{{ old('servis', $getMenu['scrapproduk']) }}</textarea>
                @if($errors->has('scrapproduk'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('scrapproduk')}}</span></code>
                @endif
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar Scrap Produk Max 700x700</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" name="img_scrapproduk" type="file" accept=".jpg,.png">
                @if($errors->has('img_scrapproduk'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('img_scrapproduk')}}</span></code>
                @endif
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Scrap Servis</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea id="deskripsi_scrapservis" class="form-control col-md-7 col-xs-12" name="scrapservis">{{ old('scrapservis', $getMenu['scrapservis']) }}</textarea>
                @if($errors->has('scrapservis'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('scrapservis')}}</span></code>
                @endif
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar Scrap Servis Max 700x700</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" name="img_scrapservis" type="file" accept=".jpg,.png">
                @if($errors->has('img_scrapservis'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('img_scrapservis')}}</span></code>
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


  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Menu </h2>
          <ul class="nav panel_toolbox">
            <a class="btn btn-info btn-sm" data-toggle='modal' data-target='.modal-form-add'><i class="fa fa-pencil"></i> Ubah</a>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content table-responsive">
          <table id="kontak-table" class="table table-striped table-bordered no-footer" width="100%">
            <thead>
              <tr role="row">
                <th>Menu</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
              </tr>
            </thead>
            <tbody>
            <tr>
              <td>Produk</td>
              <td>{!! $getMenu['produk'] !!}</td>
              <td><img src="{{ asset('amadeo/images/'.$getMenu['img_produk'])}}" alt="" width="30%"></td>
            </tr>
            <tr>
              <td>Servis</td>
              <td>{!! $getMenu['servis'] !!}</td>
              <td><img src="{{ asset('amadeo/images/'.$getMenu['img_servis'])}}" alt="" width="30%"></td>
            </tr>
            <tr>
              <td>Scrap Servis</td>
              <td>{!! $getMenu['scrapservis'] !!}</td>
              <td><img src="{{ asset('amadeo/images/'.$getMenu['img_scrapservis'])}}" alt="" width="30%"></td>
            </tr>
            <tr>
              <td>Scrap Produk</td>
              <td>{!! $getMenu['scrapproduk'] !!}</td>
              <td><img src="{{ asset('amadeo/images/'.$getMenu['img_scrapproduk'])}}" alt="" width="30%"></td>
            </tr>
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
  $('#kontak-table').DataTable({
    "ordering": false
  });

  CKEDITOR.replace('produk', {
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
  CKEDITOR.replace('servis', {
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
  CKEDITOR.replace('scrapproduk', {
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
  CKEDITOR.replace('scrapservis', {
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



@if(Session::has('false-form'))
<script>
$('.modal-form-add').modal('show');
</script>
@endif

@endsection
