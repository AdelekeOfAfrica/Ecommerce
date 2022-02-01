<div>
  <div class = "container" style = "padding:30px 0;">
    <div class = "row">
        <div class = "col-md-12">
            <div class = "panel panel-default">
                <div class = "panel-heading">
                   <div class = "row">
                       <div class="col-md-6">
                           All Categories
                       </div>
                       <div class = "col-md-6">
                           <a href = "{{route('admin.addcategory')}}" class="btn btn-danger pull-right"> ADD New Categories </a>
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
                                <th>Category Name</th>
                                <th> Slug</th>
                                <th>Edit</th>
                                <th> Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                             <tr>
                                 <td>{{$category->id}}</td>
                                 <td>{{$category->name}}</td>
                                 <td>{{$category->slug}}</td>
                                 <td><a href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}" class="btn btn-danger" ><i class = "fa fa-edit fa-2x"></i> Edit</a></td>
                                 <td><a href="#" onClick ="confirm('Are you sure, You want to delete this category?') || event.stopImmediatePropagation()" wire:click.prevent = "deleteCategory({{$category->id}})" class="btn btn-danger"><i class="fa fa-trash fa-2x"></i> Delete </a></td>
                             </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
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