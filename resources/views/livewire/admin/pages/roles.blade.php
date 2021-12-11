<div class="container">
    <div class="row">
        @foreach($roles as $role)
        <div class="col-md-6">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Permissions for {{$role->name}}</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>Permission name</th>
                    <th class="text-right">Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                      @livewire('admin.pages.single-permission', ['permission'=>$permission,"role"=>$role], key($permission->id))
                    @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

        </div>
        @endforeach
    </div>
</div> 