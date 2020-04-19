<div class="form-group">
	<label for="username">Usuario</label>
	<input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username">
	@error('username')
	    <div class="alert alert-danger">{{ $message }}</div>
	@enderror
</div>

<div class="form-group">
	<label for="password">Contraseña</label>
	<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
	@error('password')
	    <div class="alert alert-danger">{{ $message }}</div>
	@enderror
</div>

<div class="form-group">
	<label for="first_name">Nombre</label>
	<input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name">
	@error('first_name')
	    <div class="alert alert-danger">{{ $message }}</div>
	@enderror
</div>

<div class="form-group">
	<label for="last_name">Apellido</label>
	<input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name">
	@error('last_name')
	    <div class="alert alert-danger">{{ $message }}</div>
	@enderror
</div>

<div class="form-group">
	<label for="email">Correo electrónico</label>
	<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
	@error('email')
	    <div class="alert alert-danger">{{ $message }}</div>
	@enderror
</div>

<input type="hidden" value="slug" id="slug" name="slug">
<input type="hidden" value="1" id="role_id" name="role_id">
