<div>
<div>
<div>
    <div class = "container" style = "padding:30px 0;">
        <div class = "row">
            <div class = "col-md-12">
                <div class = "panel panel-default">
                    <div class = "panel-heading">
                        <div class = "row">
                            <div class="col-md-6">
                                Manage Home Categories
                            </div>
                            <div class = "col-md-6">
                                <a href ="{{route('admin.addhomeslider')}}" class="btn btn-danger pull-right ">Add New Slide</a>
                            </div>
                        </div>
                    </div>
                    <div class ="panel-body">
                        @if(Session::has('message'))
                        <div class= "alert alert-success">{{Session::get('message')}}</div>
                        @endif 
                        <form class="form-horizontal" wire:submit.prevent = "updateHomeCategory">
                            <div class = "form-group">
                                <label class = "col-md-4 control-label"> choose categories</label>
                                <div class = "col-md-4" wire:ignore>
                                    <select class = "sel_categories form-control" name ="categories[]" multiple = "multiple"  wire:model ="selected_categories">
                                        @foreach($categories as $category)
                                        <option value = "{{$category->id}}" >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label class = "col-md-4 control-label">No of Product</label>
                                <div class = "col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="numberofproduct"/>
                                </div>
                            </div>

                            <div class = "form-group">
                                <div class = "col-md-4">
                                    <button type="submit"  class= "btn btn-danger" style="position:absolute; left:550px;"> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</div>

@push('scripts')
    <script>
        $(document).ready(function(){
        $('.sel_categories').select2(); //these will allow to select more than one option
        $('.sel_categories').on('change',function(e){
            const data = $('.sel_categories').select2("val");
            @this.set('selected_categories',data);
        });
        });
    </script>
@endpush
