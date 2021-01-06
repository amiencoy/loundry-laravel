@extends('templates/main')
@section('css')
<link rel="stylesheet" href="{{ asset('css/manage_product/product/style.css') }}">
@endsection
@section('content')
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header d-flex justify-content-between align-items-center">
      <h4 class="page-title">Daftar Layanan</h4>
      <div class="d-flex justify-content-start">
      	<div class="dropdown">
	        <button class="btn btn-icons btn-inverse-primary btn-filter shadow-sm" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="mdi mdi-filter-variant"></i>
	        </button>
	        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
	          <h6 class="dropdown-header">Urut Berdasarkan :</h6>
	          <div class="dropdown-divider"></div>
	          <a href="#" class="dropdown-item filter-btn" data-filter="kode_barang">Kode Jasa</a>
            <a href="#" class="dropdown-item filter-btn" data-filter="jenis_barang">Jenis Jasa</a>
            <a href="#" class="dropdown-item filter-btn" data-filter="nama_barang">Nama Jasa</a>
            <a href="#" class="dropdown-item filter-btn" data-filter="berat_barang">Berat Jasa</a>
            <a href="#" class="dropdown-item filter-btn" data-filter="merek">Merek Jasa</a>
            <a href="#" class="dropdown-item filter-btn" data-filter="harga">Harga Jasa</a>
	        </div>
	      </div>
        <div class="dropdown dropdown-search">
          <button class="btn btn-icons btn-inverse-primary btn-filter shadow-sm ml-2" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-magnify"></i>
          </button>
          <div class="dropdown-menu search-dropdown" aria-labelledby="dropdownMenuIconButton1">
            <div class="row">
              <div class="col-11">
                <input type="text" class="form-control" name="search" placeholder="Cari barang">
              </div>
            </div>
          </div>
        </div>
	      <a href="{{ url('/product/new') }}" class="btn btn-icons btn-inverse-primary btn-new ml-2">
	      	<i class="mdi mdi-plus"></i>
	      </a>
      </div>
    </div>
  </div>
</div>
<div class="row modal-group">
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('/product/update') }}" method="post" name="update_form">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Jasa</h5>
            <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="edit-modal-body">
              @csrf
              <div class="row" hidden="">
                <div class="col-12">
                  <input type="text" name="id">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-md-3 col-sm-12 col-form-label font-weight-bold">Nama Jasa</label>
                <div class="col-lg-9 col-md-9 col-sm-12">
                  <input type="text" class="form-control" name="nama_barang">
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 offset-lg-3 offset-md-3 error-notice" id="nama_barang_error"></div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-md-3 col-sm-12 col-form-label font-weight-bold">Berat Jasa</label>
                <div class="col-lg-9 col-md-9 col-sm-12">
                  <div class="input-group">
                      <input type="text" class="form-control number-input input-notzero" name="berat_barang">
                      <div class="input-group-append">
                        <span class="input-group-text" >Kilogram</span>
                      </div>
                    </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-md-3 col-sm-12 col-form-label font-weight-bold">Harga Jasa</label>
                <div class="col-lg-9 col-md-9 col-sm-12">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp. </span>
                      </div>
                      <input type="text" class="form-control number-input input-notzero" name="harga">
                  </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 offset-lg-3 offset-md-3 error-notice" id="harga_error"></div>
              </div>
          </div>
          
          <div class="modal-footer" id="edit-modal-footer">
            <button type="submit" class="btn btn-update"><i class="mdi mdi-content-save"></i> Simpan</button>
          </div>
          <div class="modal-footer" id="scan-modal-footer" hidden="">
            <button type="button" class="btn btn-primary btn-sm font-weight-bold rounded-0 btn-continue">Lanjutkan</button>
            <button type="button" class="btn btn-outline-secondary btn-sm font-weight-bold rounded-0 btn-repeat">Ulangi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card card-noborder b-radius">
      <div class="card-body">
        <div class="row">
        	<div class="col-12 table-responsive">
        		<table class="table table-custom">
              <thead>
                <tr>
                  <th>Jasa</th>
                  <th>Berat</th>
                  <th>Harga</th>
                  <th>Keterangan</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
              	<tr>
                  <td>
                    <span class="kd-barang-field">{{ $product->nama_barang }}</span>
                  </td>
                  <td>{{ $product->berat_barang }}</td>
                  <td><span class="ammount-box bg-green"><i class="mdi mdi-coin"></i></span>Rp. {{ number_format($product->harga,2,',','.') }}</td>
                 
                  <td>
                    <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" data-toggle="modal" data-target="#editModal" data-edit="{{ $product->id }}">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                    <button type="button" class="btn btn-icons btn-rounded btn-secondary ml-1 btn-delete" data-delete="{{ $product->id }}">
                        <i class="mdi mdi-close"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('plugins/js/quagga.min.js') }}"></script>
<script src="{{ asset('js/manage_product/product/script.js') }}"></script>
<script type="text/javascript">
  @if ($message = Session::get('create_success'))
    swal(
        "Berhasil!",
        "{{ $message }}",
        "success"
    );
  @endif

  @if ($message = Session::get('update_success'))
    swal(
        "Berhasil!",
        "{{ $message }}",
        "success"
    );
  @endif

  @if ($message = Session::get('delete_success'))
    swal(
        "Berhasil!",
        "{{ $message }}",
        "success"
    );
  @endif  

  @if ($message = Session::get('import_success'))
    swal(
        "Berhasil!",
        "{{ $message }}",
        "success"
    );
  @endif

  @if ($message = Session::get('update_failed'))
    swal(
        "",
        "{{ $message }}",
        "error"
    );
  @endif

  @if ($message = Session::get('supply_system_status'))
    swal(
        "",
        "{{ $message }}",
        "success"
    );
  @endif

  $(document).on('click', '.filter-btn', function(e){
    e.preventDefault();
    var data_filter = $(this).attr('data-filter');
    $.ajax({
      method: "GET",
      url: "{{ url('/product/filter') }}/" + data_filter,
      success:function(data)
      {
        $('tbody').html(data);
      }
    });
  });

  $(document).on('click', '.btn-edit', function(){
    var data_edit = $(this).attr('data-edit');
    $.ajax({
      method: "GET",
      url: "{{ url('/product/edit') }}/" + data_edit,
      success:function(response)
      {
        $('input[name=id]').val(response.product.id);
        $('input[name=kode_barang]').val(response.product.kode_barang);
        $('input[name=nama_barang]').val(response.product.nama_barang);
        $('input[name=merek]').val(response.product.merek);
        $('input[name=stok]').val(response.product.stok);
        $('input[name=harga]').val(response.product.harga);
        var berat_barang = response.product.berat_barang.split(" ");
        $('input[name=berat_barang]').val(berat_barang[0]);
        $('select[name=jenis_barang] option[value="'+ response.product.jenis_barang +'"]').prop('selected', true);
        $('select[name=satuan_berat] option[value="'+ berat_barang[1] +'"]').prop('selected', true);
        validator.resetForm();
      }
    });
  });

  $(document).on('click', '.btn-delete', function(e){
    e.preventDefault();
    var data_delete = $(this).attr('data-delete');
    swal({
      title: "Apa Anda Yakin?",
      text: "Data Jasa akan terhapus, klik oke untuk melanjutkan",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.open("{{ url('/product/delete') }}/" + data_delete, "_self");
      }
    });
  });
</script>
@endsection