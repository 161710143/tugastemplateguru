@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"><center><b>Edit Fasilitas</b></center> 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('pasilitas.update',$pasilitas->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_pasilitas') ? ' has-error' : '' }}">
			  			<label class="control-label">Kategori fasilitas</label>
			  			<input type="text" name="nama_pasilitas" class="form-control" value="{{ $pasilitas->nama_pasilitas }}"  required>
			  			@if ($errors->has('nama_pasilitas'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_pasilitas') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
			  			<label class="control-label">Foto</label>
			  			<div class="row">
			  				<div class="col s6">
			  					<img src="{{ asset('assets/admin/images/icon/'.$pasilitas->foto )}}" style="max-width: 200px; max-height: 200px; float: left;"/>
			  				</div>
			  			</div><br>
			  			<input type="file" name="poto" class="form-control" value="{{ $pasilitas->poto }}"  required>
			  			@if ($errors->has('poto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('poto') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('kategoripasilitas_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Fasilitas</label>	
			  			<select name="kategoripasilitas_id" class="form-control">
			  				@foreach($kategori_pasilitas as $data)
			  				<option value="{{ $data->id }}" {{ $selectedKategoripasilitas == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama_pasilitas }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kategoripasilitas_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kategoripasilitas_id') }}</strong>
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