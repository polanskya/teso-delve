
    <div class="form-group">
        <div class="col-sm-12">
            <input type="text" class="form-control" name="role[name]" placeholder="Name" value="{{empty($role->name) ? '' : $role->name}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <input type="text" class="form-control" name="role[display_name]" placeholder="Display name" value="{{empty($role->display_name) ? '' : $role->display_name}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <textarea class="form-control" name="role[description]" placeholder="Description" rows="6">{{empty($role->description) ? '' : $role->description}}</textarea>
        </div>
    </div>

    <div class="text-right">
        <input type="submit" class="btn btn-primary" value="Save">
    </div>