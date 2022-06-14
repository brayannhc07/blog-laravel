@extends("app")

@section('content')
<div class="container my-4  ">
	<div class="card p-2 pb-4">
		<div class="card-body p-4">

			@if (session('success'))
			<h6 class="alert alert-success">{{ session('success') }}</h6>
			@endif

			<div class="row">
				<div class="col-12">
					<h1 class="card-title">Blog</h1>
				</div>
				<div class="col-12 text-end">
					<a href="{{ route('article') }}" class="btn btn-primary">Crear artículo</a>
				</div>
			</div>

			<div class="row my-2">
				@foreach ($articles as $article)
				<div class="col-12 col-sm-6 col-lg-4 mb-4 d-flex align-items-stretch">
					<div class="card">
						<img src="https://www.hotelnicolaas.nl/images/joomlart/demo/default.jpg" class="card-img-top" alt="default-image">
						<div class="card-body">
							<h3 class="card-title">{{ $article->title }}</h3>
							<p class="card-text">{{ $article->description }}</p>
						</div>
						<div class="card-footer text-end">
							<a class="btn btn-sm btn-warning text-white" href="{{ route('article-edit', ['id' => $article->id]) }}">
								<i class="fa-solid fa-pen-to-square"></i>
							</a>
							<button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$article->id}}"><i class="fa-solid fa-trash-can"></i></button>
						</div>
					</div>
				</div>

				<div class="modal fade" id="modal-{{$article->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Eliminar artículo</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								¿Eliminar el artículo '{{ $article->title }}' de forma permanente?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
								<form method="POST" action="{{ route('article-destroy', ['id' => $article->id]) }}">
									@method("DELETE")
									@csrf
									<button type="submit" class="btn btn-danger">Eliminar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection