@if(intval($numberOne) == 0 or intval($numberTwo) == 0)
-
@else
    <?php $value = (1 - ($numberOne / $numberTwo)) * 100 ?>
    <div title="">
        <i class="fa fa-fw fa-caret-{{$value < 0 ? 'down' : 'up'}} text-{{$value < 0 ? 'danger' : 'success'}}"></i>
        <span class="text-{{$value < 0 ? 'danger' : 'success'}}">{{number_format($value, 1)}}%</span>
        @if(isset($subText))
            <small>{{$subText}}</small>
        @endif
    </div>
@endif
