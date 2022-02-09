@extends('layouts.layout')
@section('content')
<h2>Products</h2>
<table>
    <tr>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Category</th>
        <th>Price</th>
    
        <th>Quantity</th>
        <th>Suitable Crops</th>
        <th>Reccomended Crops</th>
        <th>Composition</th>
        <th>Image</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    

@foreach($products as $product)
@if($product->user_id == session('loggedUser'))

<tr>
   
<td>
<a href="/admin/product/{{ $product->id }}">
        {{
    $product->name
        }}</a>
        </td>

        
        <td>
        {{
    $product->description
}}

        </td>
        <td>
        {{
    $product->category
}}
        </td>
        <td>
            {{
                $product->price
            }}
        </td>
        <td>
            {{
                $product->quantity
            }}
        </td>
        <td>
            {{
                $product->suitable_crops
            }}
        </td>
        <td>
            {{
                $product->reccomended_crops
            }}
        </td>
        <td>
            {{
                $product->composition
            }}
        </td>
        <td>
        <img src="{{
    asset('images/'. $product->image)
}}" alt="{{ $product->image }} " height="40px">

        </td>
        <td>
            <a href="/admin/update-product/{{ $product-> id }}">Update</a>
        </td>
        <td>
            <a href="/admin/delete-product/{{ $product-> id }}">Delete</a>
        </td>
    </tr>
@endif
@endforeach
</table>
@endsection