<div>
    <div class="container" style="padding:30px 0">
         <div class="row">
             <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         Change Password
                     </div>
                     @if(Session::has('password_success'))
                        <div class="alert alert-success" role="alert">{{Session::get('password_success')}}</div>
                     @endif
                     @if(Session::has('password_error'))
                        <div class="alert alert-danger" role="alert">{{Session::get('password_error')}}</div>
                     @endif
                     <div class="panel-body">
                         <form class="form-horizontal" wire:submit.prevent="changePassword">
                             <div class="form-group">
                                <label class="col-md-4 control-label">Current Password</label> 
                                <div class="col-md-4">
                                    <input type="password" placeholder="Current Password" class="form-control input-md" name="current_password" wire:model="current_password">
                                    @error('current_password')<p class="text-danger">{{message}}</p>@enderror
                                </div> 
                             </div>

                             <div class="form-group">
                                <label class="col-md-4 control-label">New  Password</label> 
                                <div class="col-md-4">
                                    <input type="password" placeholder="New Password" class="form-control input-md" name="password" wire:model="password">
                                    @error('password')<p class="text-danger">{{message}}</p>@enderror
                                </div> 
                             </div>

                             <div class="form-group">
                                <label class="col-md-4 control-label">Confirm  Password</label> 
                                <div class="col-md-4">
                                    <input type="password" placeholder="Confirm Password" class="form-control input-md" name="password_confirm" wire:model="password_confirmation">
                                    @error('password_confirmation')<p class="text-danger">{{message}}</p>@enderror
                                </div> 
                             </div>

                             <div class="form-group">
                                <label class="col-md-4 control-label"></label> 
                                <div class="col-md-4">
                                    <button type="submit"  class="btn btn-sm btn-danger">Change Password</button>
                                </div> 
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
    </div>
</div>
