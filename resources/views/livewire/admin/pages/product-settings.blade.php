<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
               <div class="card-header">
                    <h1 class="card-title">Product Settings</h1>
               </div>
               <div class="card-body">
                   <div class="row form-group">
                       <label for="" class="col-md-4">Currency Symbol:</label>
                       <div class="col-md-8">
                           <select class="form-control" wire:model.lazy="product_settings.currency">
                               <option value="TK.">TK.</option>
                               <option value=" ৳"> ৳</option>
                               <option value="$">$</option>
                           </select>
                       </div>
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-md-4">Default Shipping Cost:</label>
                       <div class="col-md-8">
                           <input type="number" class="form-control" wire:model.lazy="product_settings.default_shipping_cost">
                       </div>
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-md-4">Page Banner:</label>
                       <div class="col-md-8">
                           <input type="file" wire:model="image" class="form-control" accept="image/png,image/jpg,image/jpeg,image/gif">
                       </div>
                   </div>
                   <div class="row form-group justify-content-end">
                       <div class="col-md-8">
                           <button class="btn btn-primary" wire:click.debounce.250ms="update()">Save Changes</button>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>