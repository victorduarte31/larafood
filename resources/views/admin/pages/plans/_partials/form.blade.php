@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nome:" value="{{$plan->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="price">Preço:</label>
    <input type="text" class="form-control" id="price" name="price" placeholder="Preço:" value="{{$plan->price ?? old('price')}}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <input type="text" class="form-control" id="description" name="description"
           placeholder="Descrição:" value="{{$plan->description ?? old('description')}}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
