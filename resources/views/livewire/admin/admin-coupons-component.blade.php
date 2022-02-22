<div>
  <div class = "container" style = "padding:30px 0;">
    <div class = "row">
        <div class = "col-md-12">
            <div class = "panel panel-default">
                <div class = "panel-heading">
                   <div class = "row">
                       <div class="col-md-6">
                           All Coupons
                       </div>
                       <div class = "col-md-6">
                           <a href = "{{route('admin.addcoupons')}}" class="btn btn-danger pull-right"> ADD New Coupons </a>
                       </div>
                   </div>
                </div>
                <div class ="panel-body">
                    @if(Session::has('message'))
                    <div class= "alert alert-success">{{Session::get('message')}}</div>
                    @endif
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Coupon Code</th>
                                <th>Coupon Type</th>
                                <th>Coupon Value</th>
                                <th>Cart Value</th>
                                <th>Expiry Date</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coupons as $coupon)
                             <tr>
                                 <td>{{$coupon->id}}</td>
                                 <td>{{$coupon->code}}</td>
                                 <td>{{$coupon->type}}</td>
                                 @if($coupon->type == 'fixed')
                                    <td>${{$coupon->value}}</td>
                                 @else
                                 <td>{{$coupon->value}} %</td>
                                 @endif
                                 <td>{{$coupon->cart_value}}</td>
                                 <td>{{$coupon->expiry_date}}</td>
                                    <td>
                                        <a href="{{route('admin.editcoupons',['coupon_id'=>$coupon->id])}}" class="btn btn-danger" ><i class = "fa fa-edit fa-2x"></i> Edit</a>
                                        <a href="#" onClick ="confirm('Are you sure, You want to delete this coupon?') || event.stopImmediatePropagation()" wire:click.prevent = "deleteCoupon({{$coupon->id}})" class="btn btn-danger"><i class="fa fa-trash fa-2x"></i> Delete </a>
                                    </td>
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


