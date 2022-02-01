<div>
<div>
  <div class = "container" style = "padding:30px 0;">
    <div class = "row">
        <div class = "col-md-12">
            <div class = "panel panel-default">
                <div class = "panel-heading">
                   <div class = "row">
                       <div class="col-md-6">
                           Add New Product
                       </div>
                       <div class = "col-md-6">
                           <a href = "{{route('admin.products')}}" class="btn btn-danger pull-right"> All Product </a>
                       </div>
                   </div>
                </div>
                <div class ="panel-body">
                @if(Session::has('message'))
                    <div class= "alert alert-success">{{Session::get('message')}}</div>
                @endif
                <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent = " addProduct">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Name </label>
                        <div class= "col-md-4">
                            <input type = "text"  placeholder="Category Name" class = "form-control input-md" wire:model="name" wire:keyup="generateslug">
                            @error('name')<p class ="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Slug</label>
                        <div class= "col-md-4">
                            <input type = "text"  placeholder="Productslug" class = "form-control input-md" wire:model="slug">
                            @error('slug')<p class ="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Description</label>
                        <div class= "col-md-4" wire:ignore>
                        <textarea  class= "form-control input-md" id="description" placeholder="description" wire:model="description"></textarea>
                        @error('description')<p class ="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Short Description</label>
                        <div class= "col-md-4" wire:ignore>
                            <textarea  class= "form-control input-md" id="short_description"  placeholder="Short Description" wire:model="short_description"></textarea>
                            @error('short_description')<p class ="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Regular Price</label>
                        <div class= "col-md-4">
                            <input type="text"  class= "form-control input-md"  placeholder= "Regular Price" wire:model="regular_price">  
                            @error('regular_price')<p class ="text-danger">{{$message}}</p>@enderror                      
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sale Price</label>
                        <div class= "col-md-4">
                            <input type="text"  class= "form-control input-md"  placeholder=" Sale Price"   wire:model="sale_price"/>
                            @error('sale_price')<p class ="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">SKU</label>
                        <div class= "col-md-4">
                            <input type="text"  class= "form-control input-md" placeholder="SKU"  wire:model="SKU" >
                            @error('SKU')<p class ="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Stock</label>
                        <div class= "col-md-4">
                           <select class="form-control"  wire:model="stock_status">
                               <option value="instock">Instock</option>
                               <option value="outofstock">Out Of Stock</option>
                           </select>
                           @error('stock_status')<p class ="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Featured</label>
                        <div class= "col-md-4">
                           <select class="form-control"  wire:model="featured">
                               <option value="0">No</option>
                               <option value="1">Yes</option>
                           </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Quantity</label>
                        <div class= "col-md-4">
                            <input type="text"  class= "form-control input-md"  placeholder="Quantity"  wire:model="quantity" />
                            @error('quantity')<p class ="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Product-image</label>
                        <div class= "col-md-4">
                            <input type="file"  class= "input-file"  placeholder="kindly select file"  wire:model="image"/>
                            @if($image)
                             <img src = "{{$image->temporaryUrl()}}" width = "120" />
                            @endif
                            @error('image')<p class ="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Category</label>
                        <div class= "col-md-4">
                           <select class="form-control"  wire:model="category_id">
                               <option value="0">Select Category</option>
                               @foreach($categories as $category)
                                 <option value="{{$category->id}}">{{$category->name}}</option>
                               @endforeach
                           </select>
                           @error('category_id')<p class ="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                     <button type="submit"  class= "btn btn-danger" style="position:absolute; left:500px;"> Add Product</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<style>
    nav svg{
        height:20px;
    }
    nav.hidden{
        display:block !important;
    }
</style> 
</div>

@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector:'#short_description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data);
                    });
                }
            });

            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description',d_data);
                    });
                }
            });
        });
    </script>
@endpush
