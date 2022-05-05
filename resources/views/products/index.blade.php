@extends('layouts.adminLayout')
@section('content')

<div class="top"><h3>Products</h3><a href="/admin/create-product">Add a new product</a> </div>
@if ($products->count())
<!-- new temp -->
<table class="table table-striped">
  <thead>
  <tr>
        <th>Product Name</th>
        <th> Description</th>
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
  </thead>
  <tbody>
    <tr>
      @foreach($products as $product)

<tr>
   
<td  scope="row">
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
    $product->category->name
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
                $product->recommended_crops
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

@endforeach
    </tr>
  </tbody>
</table>
<!-- new template end -->

@else
    <p>No products yet. Please check back later.</p>
@endif

@endsection