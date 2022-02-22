<div>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Settings
                    </div>
                    <div class="panel-body">
                        @if(Session::has('setting_message'))
                            <div class="alert alert-success" role="alert">{{Session::get('setting_message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent=" saveSettings">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="kindly enter your email" name="email" wire:model="email">
                                    @error('email')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone1</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="kindly enter your phone number" name="phone" wire:model="phone">
                                    @error('phone')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone2</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="kindly enter your second phone number" name="phone" wire:model="phone2">
                                    @error('phone2')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Address</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="kindly enter your Address" name="address" wire:model="address">
                                    @error('address')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Map</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Map" name="Map" wire:model="map">
                                    @error('map')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Twitter</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Twitter handle" name="twitter" wire:model="twitter">
                                    @error('twitter')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Facebook</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="kindly enter your facebook username" name="facebook" wire:model="facebook">
                                    @error('facebook')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Pinterest</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Pinterest" name="Pinterest" wire:model="pinterest">
                                    @error('pinterest')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Instagram</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Instagram" name="Instagram" wire:model="instagram">
                                    @error('instagram')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Youtube</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Youtube" name="Youtube" wire:model="youtube">
                                    @error('youtube')<p class="text-danger">{{$message}}</p>@enderror
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-danger">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>