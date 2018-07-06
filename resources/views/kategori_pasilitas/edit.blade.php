@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"><center><b>Edit Kategori Fasilitas</b></center> 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('kategori_pasilitas.update',$kategoripasilitas->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_pasilitas') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Fasilitas</label>
			  			<input type="text" name="nama_pasilitas" class="form-control" value="{{ $kategoripasilitas->nama_pasilitas }}"  required>
			  			@if ($errors->has('nama_pasilitas'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_pasilitas') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection