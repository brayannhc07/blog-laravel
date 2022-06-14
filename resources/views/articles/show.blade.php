@extends("app")

@section('content')
<div class="container my-4 p-2 pb-4">
	<div class="card">
		<div class="card-body m-auto">
			<div class="row">
				<div class="col-12">
					<h1 class="card-title">{{ $new ? "Crear Artículo" : "Editar Artículo" }}</h1>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<form action="{{ $new ? route('article') : route('article-edit', ['id' => $article->id]) }}" method="POST">
						@csrf

						@if (session('success'))
						<h6 class="alert alert-success">{{ session('success') }}</h6>
						@endif

						@error('title')
						<h6 class="alert alert-danger">{{ $message }}</h6>
						@enderror
						@error('description')
						<h6 class="alert alert-danger">{{ $message }}</h6>
						@enderror

						<div class="row my-2">
							<div class="col-12 mb-3">
								<label for="title" class="form-label">Título</label>
								<input type="text" class="form-control" name="title" placeholder="Título del artículo" value="{{ $new ? '' : $article->title }}">
							</div>
							<div class="col-12 mb-3">
								<label for="description" class="form-label">Descripción</label>
								<textarea class="form-control" name="description" rows="8">{{ $new ? '' : $article->description }}</textarea>
							</div>
							<div class="col-12 text-end">
								<button type=" submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> {{ $new ? "Crear artículo" : "Editar artículo" }}</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection