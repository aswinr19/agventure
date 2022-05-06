@extends('layouts.adminLayout')
@section('content')
<h2>product</h2>
<p>
    {{
        $product->name
    }}
    <br>
    {{
        $product->description
    }}
    <br>
    {{
        $product->category->name
    }}<br>
    {{
        $product->quantity
    }}<br>
    {{
        $product->price
    }}<br>
    <img src="{{
    asset('images/'. $product->image)
}}" alt="{{ $product->image }} " height="80px">

<br>
    {{
        $product->suitable_crops
    }}<br>
    {{
        $product->reccomended_crops
    }}<br>
    {{
        $product->composition
    }}

</p>
@endsection