<!-- Id, Name, Mac Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $server->name !!}</p>
    {!! Form::label('mac_address', 'Mac Address:') !!}
    <p>{!! $server->mac_address !!}</p>
</div>
<!-- Customer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer', 'Customer:') !!}
    <p>{!! $server->user->name !!}</p>
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $server->created_at !!}</p>
</div>

<?php $information = $server->information->first(); ?>
<!-- Customer Field -->
<div class="form-group col-sm-12 data">
    {!! Form::label('server_information', 'Server Information:') !!}
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="info-box sql_server_utilization">
                @if($information != null)
                    @if($information->sql_server_utilization >= $setups[1]->sql_server_utilization)
                        <span class="info-box-icon bg-red-gradient"><i class="ion ion-ios-gear-outline"></i></span>
                    @elseif($information->sql_server_utilization >= $setups[0]->sql_server_utilization)
                        <span class="info-box-icon bg-yellow-gradient"><i class="ion ion-ios-gear-outline"></i></span>
                    @else
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                    @endif
                @else
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                @endif

                <div class="info-box-content">
                    <span class="info-box-text">SQL Server Utilization</span>
                    <span class="info-box-number">
                        @if($information != null)
                            {!! $information->sql_server_utilization !!}<small>%</small>
                        @endif
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="info-box system_idle_process">
                @if($information != null)
                    @if($information->system_idle_process >= $setups[1]->system_idle_process)
                        <span class="info-box-icon bg-red-gradient"><i class="ion ion-ios-gear-outline"></i></span>
                    @elseif($information->system_idle_process >= $setups[0]->system_idle_process)
                        <span class="info-box-icon bg-yellow-gradient"><i class="ion ion-ios-gear-outline"></i></span>
                    @else
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                    @endif
                @else
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                @endif
                <div class="info-box-content">
                    <span class="info-box-text">System Idle Process</span>
                    <span class="info-box-number ">
                        @if($information != null)
                            {!! $information->system_idle_process !!}<small>%</small>
                        @endif
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="info-box other_process_cpu">
                @if($information != null)
                    @if($information->other_process_cpu >= $setups[1]->other_process_cpu)
                        <span class="info-box-icon bg-red-gradient"><i class="ion ion-ios-gear-outline"></i></span>
                    @elseif($information->other_process_cpu >= $setups[0]->other_process_cpu)
                        <span class="info-box-icon bg-yellow-gradient"><i class="ion ion-ios-gear-outline"></i></span>
                    @else
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                    @endif
                @else
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                @endif

                <div class="info-box-content">
                    <span class="info-box-text">Other CPU</span>
                    <span class="info-box-number">
                        @if($information != null)
                            {!! $information->other_process_cpu !!}<small>%</small>
                        @endif
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

    </div>

    <div class="progress-group">
        <span class="progress-text">Physical Memory</span>
        <span class="progress-number">
            <b class="used_memory">
                @if($information != null)
                    {!! round(($information->total_physical_memory-$information->available_physical_memory)/1024, 2) !!}
                @endif
            </b>/<b class="total_physical_memory">
                @if($information != null)
                    {!! round($information->total_physical_memory/1024, 2) !!} GB
                @endif
            </b>
        </span>

        <div class="progress sm physical_memory">
            @if($information != null)
                @if(($information->total_physical_memory - $information->available_physical_memory)*100/$information->total_physical_memory >= $setups[1]->available_physical_memory)
                    <div class="progress-bar progress-bar-danger"
                @elseif(($information->total_physical_memory - $information->available_physical_memory)*100/$information->total_physical_memory >= $setups[0]->available_physical_memory)
                    <div class="progress-bar progress-bar-warning"
                @else
                    <div class="progress-bar progress-bar-aqua"
                @endif
            @else
                <div class="progress-bar progress-bar-aqua"
            @endif

                 @if($information != null)
                    style="width: {{ ($information->total_physical_memory - $information->available_physical_memory)*100/$information->total_physical_memory }}%"
                 @endif
            ></div>
        </div>
    </div>
</div>

<div class="form-group col-sm-12 annotate">
    <div class="row">
        <div class="col-md-1 col-sm-1 col-xs-3">
            <span class="info-box-text">Note:</span>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-3">
            <span class="bg-red-gradient">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="info-box-text">Danger</span>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-3">
            <span class="bg-yellow-gradient">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="info-box-text">Warning</span>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-3">
            <span class="bg-aqua">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="info-box-text">Normal</span>
        </div>
    </div>
</div>

<script lang="text/javascript">
    function updateData(){
        $.get('{!! route('servers.information', ['id'=> $server->id]) !!}', function(data, status){
            if(status == 'success'){
                if(data.success == true){
                    var sql_server_utilization = (data.data.sql_server_utilization >= {{ $setups[1]->sql_server_utilization }}) ? "bg-red-gradient"
                        : (data.data.sql_server_utilization >= {{ $setups[0]->sql_server_utilization }})? "bg-yellow-gradient" : "bg-aqua" ;

                    var system_idle_process = (data.data.system_idle_process >= {{ $setups[1]->system_idle_process }}) ? "bg-red-gradient"
                        : (data.data.system_idle_process >= {{ $setups[0]->system_idle_process }})? "bg-yellow-gradient" : "bg-aqua" ;

                    var other_process_cpu = (data.data.other_process_cpu >= {{ $setups[1]->other_process_cpu }}) ? "bg-red-gradient"
                        : (data.data.other_process_cpu >= {{ $setups[0]->other_process_cpu }})? "bg-yellow-gradient" : "bg-aqua" ;

                    $('.sql_server_utilization').html(
                    '<span class="info-box-icon '+sql_server_utilization+'"><i class="ion ion-ios-gear-outline"></i></span>'
                    + '<div class="info-box-content">'
                    + '<span class="info-box-text">SQL Server Utilization</span>'
                    + '<span class="info-box-number">'+data.data.sql_server_utilization+'<small>%</small></span></div>'
                    );
                    $('.system_idle_process').html(
                        '<span class="info-box-icon '+system_idle_process+'"><i class="ion ion-ios-gear-outline"></i></span>'
                        + '<div class="info-box-content">'
                        + '<span class="info-box-text">System Idle Process</span>'
                        + '<span class="info-box-number">'+data.data.system_idle_process+'<small>%</small></span></div>'
                    );
                    $('.other_process_cpu').html(
                        '<span class="info-box-icon '+other_process_cpu+'"><i class="ion ion-ios-gear-outline"></i></span>'
                        + '<div class="info-box-content">'
                        + '<span class="info-box-text">Other CPU</span>'
                        + '<span class="info-box-number">'+data.data.other_process_cpu+'<small>%</small></span></div>'
                    );

                    $('.used_memory').html((Number(data.data.total_physical_memory-data.data.available_physical_memory)/1024).toFixed(2));
                    $('.total_physical_memory').html(Number(data.data.total_physical_memory/1024).toFixed(2) + " GB");

                    var percent = (data.data.total_physical_memory - data.data.available_physical_memory)*100/data.data.total_physical_memory;

                    var physical_memory = (percent >= {{ $setups[1]->available_physical_memory }}) ? "progress-bar-danger"
                        : (percent >= {{ $setups[0]->available_physical_memory }})? "progress-bar-warning" : "progress-bar-info" ;
                        $('.physical_memory').html('<div class="progress-bar '+ physical_memory +'" style="width: '+percent+'%"></div>');
                }
                else{
                    toastr.error('Load data failed');
                }
            }
            else{
                toastr.error('Load data failed');
            }
        });
    }
    setInterval(updateData, 10000);
</script>

