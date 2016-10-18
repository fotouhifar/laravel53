@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$type->lotto}} Results and Analytics</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Previous results</div>
                <div class="panel-body">                   
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="results_history_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Winning Numbers</th>
                                    <th>Temperature</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?PHP $results = $type->results()->get(); ?>
                                @foreach($results as $result)
                                <tr>
                                    <td>
                                        {!! Form::open(array('route' => array('result.destroy',$result->id),'method' => 'delete','id'=>'DeleteForm'.$result->id)) !!}

                                        {!! Form::text('id',$result->id,['hidden'=>true]) !!}

                                        <span class="btn-outline btn-sm btn-danger delete-btn" onclick="DeleteButton({{$result->id}})"><i class="fa fa-remove"></i></span>

                                        <span title="{{date('d/m/Y',strtotime($result->draw_date))}}">{{$result->draw_number}}</span>
                                        {!! Form::close()!!}


                                    </td>
                                    <td>
                                        @for($i=1;$i<=$type->winning_numbers;$i++)
                                        {{boxed_num($result->wn($i))}}
                                        
                                        @endfor

                                        @for($i=1;$i<=$type->supplementary_numbers;$i++)
                                        <button class="btn btn-circle btn-success">{{$result->sn($i)}}</button>
                                        @endfor
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">Footer of the container</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Add Single Result</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="form-inline">
                            {!! Form::open(array('route' => 'result.store','files'=>'true')) !!}
                            <input hidden name="store" value="single">
                            <input hidden name="type_id" value="{{$type->id}}">
                            <div class="row">
                                <div class="col-lg-3 col-xs-12">
                                    <div class="divSpace">
                                        <div class="form-group{{ $errors->has('draw_day') ? ' has-error' : '' }}">
                                            {!! Form::text('draw_date',null,['class' => 'form-control date-picker','placeholder'=>'Draw Date']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-12">                                     
                                    <div class="divSpace">
                                        <div class="form-group{{ $errors->has('draw_number') ? ' has-error' : '' }}">
                                            {!! Form::text('draw_number',null,['class' => 'form-control','placeholder'=>'Draw Number']) !!}
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-xs-12">
                                    <div class="divSpace">
                                        <span>Winning Numbers</span>
                                    </div>
                                </div>
                                @for($i=1 ; $i<=$type->winning_numbers ; $i++)
                                <div class="col-lg-2 col-xs-2">
                                    <div class="divSpace">
                                        {!! Form::selectRange('wn'.$i,1,$type->max_number,null,['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                @endfor
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-xs-12">
                                    <div class="divSpace">
                                        <span>Supllementary Numbers</span>
                                    </div>
                                </div>
                                @for($i=1 ; $i<=$type->supplementary_numbers ; $i++)
                                <div class="col-lg-2 col-xs-2">
                                    <div class="divSpace">
                                        {!! Form::selectRange('sn'.$i,1,$type->max_number,null,['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                @endfor
                            </div>
                            <div class="row">       
                                <div class="col-sm-4 col-sm-offset-4">
                                    <div class="divSpace">
                                        {!! Form::submit('Submit',['class' => 'btn btn-outline btn-primary btn-block']) !!}
                                    </div> 
                                </div>
                            </div>

                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Plenitude</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
</div>

</div>





@endsection
