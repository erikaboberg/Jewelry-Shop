@extends('layouts.admin')

@section('body')


<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#id</th>
            <th>Bild</th>
            <th>Namn</th>
            <th>Beskrivning</th>
            <th>Kategori</th>
            <th>Pris</th>
            <th>Ändra bild</th>
            <th>Ändra</th>
            <th>Ta bort</th>
        </tr>
        </thead>
        <tbody>

  
        @foreach($products as $product)
        <tr>
            <td>{{$product['id']}}</td>
        
            <td> <img src="{{ Storage::url('product_img/'.$product['image'])}}" alt="<?php echo Storage::url($product['image']); ?>
            "width="100" height="100" style="max-height:220px" ></td> 
           

        <!-- Visar mina produkter från databasen -->

            <td>{{$product['name']}}</td>
            <td>{{$product['description']}}</td>
            <td>{{$product['type']}}</td>
            <td>{{$product['price']}}</td>


            <!-- Routes för knapparna  -->
            <td><a href="{{ route('admin.EditProductImage',['id' => $product['id'] ])}}" class="btn btn-primary">Ändra bild</a></td>
            <td><a href="{{ route('admin.EditProduct',['id' => $product['id'] ])}}" class="btn btn-primary">Ändra Produkt</a></td>
            <td><a href= "{{ route('admin.DeleteProduct',['id' => $product['id'] ])}}"  class="btn btn-warning">Ta bort</a></td>

            


        </tr>

        @endforeach


        </tbody>
    </table>

    {{$products->links()}}

</div>
@endsection


