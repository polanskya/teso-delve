<form method="get" action="">
    <div class="row m-b-1">
        <div class="col-md-5">

        </div>

        <div class="col-md-3">
            <select class="form-control" name="seller">
                <option value="">Select seller</option>
                @foreach($members as $member)
                    <option {{(isset($filterQuery['seller']) and $filterQuery['seller'] == $member->accountName) ? 'selected="selected"' : ''}} value="{{$member->accountName}}">{{str_ireplace('@', '', $member->accountName)}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <select class="form-control" name="buyer">
                <option value="">Select buyer</option>
                @foreach($members as $member)
                    <option {{(isset($filterQuery['buyer']) and $filterQuery['buyer'] == $member->accountName) ? 'selected="selected"' : ''}} value="{{$member->accountName}}">{{str_ireplace('@', '', $member->accountName)}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">

        <div class="col-md-5">

        </div>

        <div class="col-md-3 text-right">
            <input type="text" placeholder="Search name" class="form-control" name="name" value="{{isset($filterQuery['name']) ? $filterQuery['name'] : ''}}">
        </div>

        <div class="col-md-3 text-right m-b-1 filter-icons">
            <?php $filter = isset($filterQuery['filter']) ? $filterQuery['filter'] : null; ?>
            <div class="btn-group" role="group">
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'all'] + $filterQuery)}}" class="btn btn-default" title="All"><img src="/gfx/icons/ON-icon-Inventory-All.png"></a>
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'weapon'] + $filterQuery)}}"class="btn {{$filter == 'weapon' ? 'btn-primary' : 'btn-default'}}" title="Weapons"><img src="/gfx/icons/ON-icon-Inventory-Weapons.png"></a>
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'armor'] + $filterQuery)}}" class="btn {{$filter == 'armor' ? 'btn-primary' : 'btn-default'}}" title="Armor"><img src="/gfx/icons/ON-icon-Inventory-Armor.png"></a>
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'consumable'] + $filterQuery)}}" class="btn {{$filter == 'consumable' ? 'btn-primary' : 'btn-default'}}" title="Consumables"><img src="/gfx/icons/ON-icon-Inventory-Consumables.png"></a>
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'material'] + $filterQuery)}}" class="btn {{$filter == 'material' ? 'btn-primary' : 'btn-default'}}" title="Materials"><img src="/gfx/icons/ON-icon-Inventory-Materials.png"></a>
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'misc'] + $filterQuery)}}" class="btn {{$filter == 'misc' ? 'btn-primary' : 'btn-default'}}" title="Miscellaneous"><img src="/gfx/icons/ON-icon-Inventory-Miscellaneous.png"></a>
            </div>
        </div>

        <div class="col-md-1 text-right">
            <input type="submit" value="Filter" class="btn btn-primary">
        </div>
    </div>
</form>

