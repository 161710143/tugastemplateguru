@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Pasilitas
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('pasilitas.store') }}" method="post" enctype="multipart/form-data" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Fasilitas</label>	
			  			<input type="text" name="nama" class="form-control"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('poto') ? ' has-error' : '' }}">
			  			<label class="control-label">Foto</label>	
			  			<input type="file" id="foto" name="poto" class="validate" accept="image/*" required>
			  			@if ($errors->has('poto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('poto') }}</strong>
                            </span>
                        @endif
					</div>
<div class="form-group {{ $errors->has('kategoripasilitas_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Kategori Fasilitas</label>
			  			<select name="kategoripasilitas_id" class="form-control">
			  				@foreach($kategoripasilitas as $data)
			  				<option value="{{ $data->id}}">{{$data->kategoripasilitas_id}}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kategoripasilitas_id'))	
			  			<input type="text" name="kategoripasilitas_id" class="form-control"  required>
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