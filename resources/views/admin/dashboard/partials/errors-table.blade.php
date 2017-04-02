<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Errors</h2>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table m-b-0">
                <thead>
                <tr>
                    <th class="small text-muted text-uppercase"><strong></strong></th>
                    <th class="small text-muted text-uppercase"><strong>Error</strong></th>
                    <th class="small text-muted text-uppercase text-right"><strong>Occured at</strong>
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($logs as $log)
                    <tr>
                        <td>
                            @if($last_logs_watched > $log['date'])
                                <i class="fa fa-exclamation-circle text-danger"></i>
                            @endif
                        </td>
                        <td>{{$log['text']}}</td>
                        <td class="text-right">{{$log['date']}}</td>
                    </tr>
                @endforeach


                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6" class="text-right">Total: {{number_format($jobs->count())}}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

