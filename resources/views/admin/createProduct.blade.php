@extends('layouts.admin')

@section('body')


<div class="table-responsive">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>

            <li>{!! print_r($errors->all()) !!}</li>

        </ul>
    </div>
    @endif


    <h3>Skapa ny produkt</h3>

    <form action="/admin/sendCreateProduct" method="post" enctype="multipart/form-data">

        {{csrf_field()}}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="name">Namn</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Produktnamn" required>
        </div>
        <div class="form-group">
            <label for="description">Beskrivning</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Beskrivning" required>
        </div>

        <div class="form-group">
            <label for="image">Bild</label>
            <input type="file" class=""  name="image" id="image" required>
        </div>
        <div class="form-group">
            <label for="type">Kategori</label>
            <input type="text" class="form-control" name="type" id="type" placeholder="Ringar, Armband, Halsband, Örhängen, Övrigt." required>
        </div>

        <div class="form-group">
            <label for="type">Pris</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Pris" required>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Skapa</button>
    </form>

</div>
@endsection