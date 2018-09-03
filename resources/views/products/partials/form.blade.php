<div class="container">
    <div class="row">
        <div class="col-8 offset-2">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2 class="text-center">{{ $titleBtn }}</h2>

            <form action="{{ $route }}" method="POST">
                {{ csrf_field() }}
                @method($method)

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ old('name') ?: $product->name }}">
                </div>

                <div class="form-group">
                    <label for="points">Valor en Puntos</label>
                    <input type="number" class="form-control" id="points" name="points"
                           value="{{ old('points') ?: $product->points }}">
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" id="description" class="form-control">
                            {{ old('description') ?: $product->description }}
                        </textarea>
                </div>

                <input type="submit" class="btn btn-primary" value="{{ $titleBtn }}">
                <a href="{{ route('products') }}" class="btn btn-info">Volver al Listado</a>

            </form>
        </div>
    </div>
</div>