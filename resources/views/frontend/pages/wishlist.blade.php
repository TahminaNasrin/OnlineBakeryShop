@extends('frontend.master')
@section('content')




<div class="container">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


	<div class="cart-wrap">
		<div class="container">
	        <div class="row">
			    <div class="col-md-8">
			        <div class="main-heading mb-10">My wishlist</div>
			        <div class="table-wishlist">
				        <table cellpadding="0" cellspacing="0" border="0" width="100%">
				        	<thead>
					        	<tr>
					        		<th width="15%">Product Name</th>
					        		<th width="15%">Unit Price</th>
					        		<th width="15%">Stock Status</th>
					        		<th width="15%"></th>
					        		<th width="10%"></th>
					        	</tr>
					        </thead>
					        <tbody>
                            @foreach ($products as $product)
					        	<tr>
					        		<td width="15%">
					        			<div class="display-flex align-center">
		                                    <div class="img-product">
		                                        <img src="" alt="" class="mCS_img_loaded">
		                                    </div>
		                                    <div class="name-product">
                                            {{$product->name}}
		                                    </div>
	                                    </div>
	                                </td>
					        		<td width="15%" class="price">{{$product->price}} .BDT</td>
					        		<td width="15%"><span class="in-stock-box">{{$product->stock}}</span></td>
					        		<td width="15%"><a type="button" href="{{route('add.to.cart',$product->id)}}" class="round-black-btn small-btn">Add to Cart</a></td>
					        		<td width="10%" class="text-center"><a href="{{route('wishlist.delete',$product->id)}}" class="trash-icon"><i class="far fa-trash-alt"></i></a></td>
					        	</tr>
					        @endforeach	
				        	</tbody>
				        </table>
				    </div>
			    </div>
			</div>
		</div>
	</div>
</div>	
@endsection