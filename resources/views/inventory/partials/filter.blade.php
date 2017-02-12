<div class="row">
    <form method="get" action="">
        <div class="col-md-6">

        </div>

        <div class="col-md-3 m-b-1">
            @if($accounts->count() > 1)

                <select class="form-control" name="account">
                    <option value="">Select accounts</option>
                    @foreach($accounts as $account)
                        <option {{(isset($filterQuery['account']) and $filterQuery['account'] == $account) ? 'selected="selected"' : ''}} value="{{$account}}">{{$account}}</option>
                    @endforeach
                </select>
            @endif
        </div>

        <div class="col-md-3 m-b-1">
            <input type="hidden" name="filter" value="{{isset($filterQuery['filter']) ? $filterQuery['filter'] : ''}}">

            <select class="form-control" name="character">
                <option value="">Select character</option>
                @foreach($characters as $character)
                    <option {{(isset($filterQuery['character']) and $filterQuery['character'] == $character->id) ? 'selected="selected"' : ''}} value="{{$character->id}}">{{$character->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="col-md-4">

        </div>

        <div class="col-md-3 text-right">
            <input type="text" placeholder="Search name" class="form-control" name="name" value="{{isset($filterQuery['name']) ? $filterQuery['name'] : ''}}">
        </div>

        <div class="col-md-4 text-right m-b-1 filter-icons">

            <?php $filter = isset($filterQuery['filter']) ? $filterQuery['filter'] : null; ?>
            <div class="btn-group" role="group">
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'all'] + $filterQuery)}}" class="btn btn-default" title="All"><img src="/gfx/icons/ON-icon-Inventory-All.png"></a>
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'weapon'] + $filterQuery)}}"class="btn {{$filter == 'weapon' ? 'btn-primary' : 'btn-default'}}" title="Weapons"><img src="/gfx/icons/ON-icon-Inventory-Weapons.png"></a>
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'armor'] + $filterQuery)}}" class="btn {{$filter == 'armor' ? 'btn-primary' : 'btn-default'}}" title="Armor"><img src="/gfx/icons/ON-icon-Inventory-Armor.png"></a>
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'consumable'] + $filterQuery)}}" class="btn {{$filter == 'consumable' ? 'btn-primary' : 'btn-default'}}" title="Consumables"><img src="/gfx/icons/ON-icon-Inventory-Consumables.png"></a>
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'material'] + $filterQuery)}}" class="btn {{$filter == 'material' ? 'btn-primary' : 'btn-default'}}" title="Materials"><img src="/gfx/icons/ON-icon-Inventory-Materials.png"></a>
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'misc'] + $filterQuery)}}" class="btn {{$filter == 'misc' ? 'btn-primary' : 'btn-default'}}" title="Miscellaneous"><img src="/gfx/icons/ON-icon-Inventory-Miscellaneous.png"></a>
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'junk'] + $filterQuery)}}" class="btn {{$filter == 'junk' ? 'btn-primary' : 'btn-default'}}" title="Junk"><img src="/gfx/icons/ON-icon-Inventory-Junk.png"></a>
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'bank'] + $filterQuery)}}" class="btn {{$filter == 'bank' ? 'btn-primary' : 'btn-default'}}" title="In bank"><img src="/gfx/icons/ON-icon-Bank.png"></a>
                <a href="{{$filterRoute}}?{{http_build_query(['filter' => 'craftingBag'] + $filterQuery)}}" class="btn {{$filter == 'craftingBag' ? 'btn-primary' : 'btn-default'}}" title="In crafting bag"><img src="/gfx/icons/ON-icon-Inventory-Materials.png"></a>
            </div>
        </div>

        <div class="col-md-1 text-right">
            <input type="submit" value="Filter" class="btn btn-primary">
        </div>
    </form>
</div>

