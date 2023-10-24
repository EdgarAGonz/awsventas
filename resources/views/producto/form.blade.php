
<h1>{{$modo}} Producto</h1>


@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
<ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
    </div>


@endif

<div class="form-group"> 
<label for="Nombre"> Nombre </label>    
<input type="text" class="form-control" name="Nombre" value="{{ isset($producto->Nombre)?$producto->Nombre:old('Nombre')}}" id="Nombre">
</div>

<div class="form-group"> 
<label for="Descripcion_del_Producto"> Descripción </label>
<input type="text" class="form-control" name="Descripcion_del_Producto" 
value="{{ isset($producto->Descripcion_del_Producto)?$producto->Descripcion_del_Producto:old('Descripcion_del_Producto')}}" id="Descripcion_del_Producto">
</div>

<div class="form-group">
<label for="Categoria"> Categoria </label>
<input type="text" class="form-control" name="Categoria" value="{{ isset($producto->Categoria)?$producto->Categoria:old('Categoria')}}" id="Categoria">
</div>

<div class="form-group">
<label for="Precio"> Precio </label>
<input type="text" class="form-control" name="Precio" value="{{ isset($producto->Precio)?$producto->Precio:old('Precio')}}" id="Precio">
</div>

<div class="form-group">
<label for="Stock"> Stock</label>
<input type="number" class="form-control" name="Stock" value="{{ isset($producto->Stock)?$producto->Stock:old('Stock')}}" id="Stock">
</div>

<div class="form-group">
<label for="Fotografia"></label>
@if (isset($producto->Fotografia))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->Fotografia }}" width="100" alt="">
@endif
<input type="file" class="form-control" name="Fotografia" value="" id="Fotografia">
</div>

<div class="form-group">
<label for="Peso_Dimension"> Peso o Dimensión </label>
<input type="text" class="form-control" name="Peso_Dimension" 
value="{{ isset($producto->Peso_Dimension)?$producto->Peso_Dimension:old('Peso_Dimension')}}" id="Peso_Dimension">
</div>

<div class="form-group">
<label for="Fecha_Ingreso"> Fecha de Ingreso </label>
<input type="date" class="form-control" name="Fecha_Ingreso" 
value="{{ isset($producto->Fecha_Ingreso)?$producto->Fecha_Ingreso:old('Fecha_Ingreso')}}" id="Fecha_Ingreso">
</div>

<input class="btn btn-success" type="submit" value="{{$modo}} Datos">

<a class="btn btn-primary" href="{{ url('producto/') }}"> Volver</a>

<br>
