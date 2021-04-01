@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nome:" value="{{$detail->name ?? old('name')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
