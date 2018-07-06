@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Nama Guru 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Guru</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $datagurus->nama}}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Profil Guru</label>	
			  			<input type="text" name="Profil_guru" class="form-control" value="{{ $datagurus->Profil_guru}}"  readonly>
			  		</div>

			
			  		<div class="form-group">
			  			<label class="control-label">NIP</label>	
			  			<input type="text" name="nip" class="form-control" value="{{ $datagurus->nip}}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Jabatan</label>	
			  			<input type="text" name="jabatan" class="form-control" value="{{ $datagurus->jabatan}}"  readonly>
			  		</div>

			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection