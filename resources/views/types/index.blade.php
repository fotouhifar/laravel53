@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Types </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    @if(isset($edittype))
                    Update Lotto Details
                    <a class="btn-outline btn-sm btn-danger" href="{{url('type')}}"><i class="fa fa-mail-reply"></i></a>
                    @else
                    Create New Lotto
                    @endif

                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse <?= isset($edittype) ? 'in' : '' ?>">
            <div class="panel-body">
                <div class="form-inline">
                    @if(isset($edittype))
                    {!! Form::open(array('route' => array('type.update',$edittype->id))) !!}
                    @else
                    {!! Form::open(array('route' => 'type.store')) !!}
                    @endif
                    <div class="row">
                        <div class="col-lg-3 col-lg-offset-3 col-xs-12">
                            <div class="divSpace">
                                <div class="form-group{{ $errors->has('lotto') ? ' has-error' : '' }}">
                                    @if(isset($edittype))
                                    {!! Form::text('lotto',$edittype->lotto,['class' => 'form-control','placeholder'=>'Lotto Name']) !!}

                                    @else
                                    {!! Form::text('lotto',null,['class' => 'form-control','placeholder'=>'Lotto Name']) !!}
                                    @endif



                                    @if ($errors->has('lotto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lotto') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-12">                                     
                            <div class="divSpace">
                                <div class="form-group">

                                    @if(isset($edittype))
                                    {!! Form::select('draw_day',['Mondays'=>'Mondays','Tuesdays'=>'Tuesdays','Wednesdays'=>'Wednesdays','Thursdays'=>'Thursdays','Fridays'=>'Fridays','Saturdays'=>'Saturdays','Sundays'=>'Sundays'],$edittype->draw_day,['class' => 'form-control']) !!}

                                    @else
                                    {!! Form::select('draw_day',['Mondays'=>'Mondays','Tuesdays'=>'Tuesdays','Wednesdays'=>'Wednesdays','Thursdays'=>'Thursdays','Fridays'=>'Fridays','Saturdays'=>'Saturdays','Sundays'=>'Sundays'],null,['class' => 'form-control']) !!}

                                    @endif
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-xs-4">                                     
                            <div class="divSpace">
                                <div class="form-group">
                                    {!! Form::label('name','Wn') !!}
                                    @if(isset($edittype))
                                    {!! Form::selectRange('winning_numbers',1,10,$edittype->winning_numbers,['class' => 'form-control']) !!}
                                    @else
                                    {!! Form::selectRange('winning_numbers',1,10,7,['class' => 'form-control']) !!}
                                    @endif
                                </div>

                            </div> 
                        </div>
                        <div class="col-lg-3 col-xs-4">         
                            <div class="divSpace">
                                <div class="form-group">
                                    {!! Form::label('name','Sn') !!}
                                    @if(isset($edittype))
                                    {!! Form::selectRange('supplementary_numbers',1,5,$edittype->supplementary_numbers,['class' => 'form-control']) !!}
                                    @else
                                    {!! Form::selectRange('supplementary_numbers',1,5,2,['class' => 'form-control']) !!}
                                    @endif
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-3  col-xs-4">                                       
                            <div class="divSpace">
                                <div class="form-group">
                                    {!! Form::label('name','Max') !!}
                                    @if(isset($edittype))
                                    {!! Form::selectRange('max_number',1,99,$edittype->max_number,['class' => 'form-control']) !!}
                                    @else
                                    {!! Form::selectRange('max_number',1,99,2,['class' => 'form-control']) !!}
                                    @endif
                                </div>
                            </div> 
                        </div>
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



    <!-- *********** Import  Results -->

    @if(isset($edittype))
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Import Results To <b>{{$edittype->lotto}}</b></a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse <?= isset($edittype) ? 'in' : '' ?>">
            <div class="panel-body">
                <div class="form-inline">
                    {!! Form::open(array('route' => 'result.store','files'=>'true')) !!}
                    <input hidden name="store" value="mass">
                    <div class="row">
                        <div class="col-lg-3 col-xs-12">
                            <div class="divSpace">
                                <div class="form-group{{ $errors->has('lotto') ? ' has-error' : '' }}">
                                    {!! Form::text('lotto',$edittype->lotto,['class' => 'form-control','placeholder'=>'Put a Name on me!','disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-12">                                     
                            <div class="divSpace">
                                <div class="form-group">
                                    {!! Form::file('ImportFile',null,['class' => 'form-control','placeholder'=>'Put a Name on me!']) !!}
                                </div>
                            </div> 
                        </div>
                        <div class="col-sm-3 col-sm-offset-3 col-xs-12">
                            <div class="divSpace">
                                {!! Form::submit('Import',['class' => 'btn btn-outline btn-primary btn-block']) !!}
                            </div> 
                        </div>
                    </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>

    @endif


    <!-- End of inport results -->





    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Configure types</div>
                <div class="panel-body">                   
                    @foreach($types as $type)
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="pull-right"><a class="btn-outline btn-sm btn-danger"><i class="fa fa-remove"></i></a></div>
                                <div class="pull-right"><a href="{{url('/type/')}}/{{$type->id}}/edit" class="btn-outline btn-sm btn-primary"><i class="fa fa-edit"></i></a></div>
                                <div class="row">                                    
                                    <div class="col-xs-9">
                                        <div class="h3">{{$type->lotto}}</div>
                                        <div>{{$type->draw_day}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                There are 
                                <button class="btn btn-circle btn-success">{{$type->winning_numbers}}</button> WN and 
                                <button class="btn btn-circle btn-warning">{{$type->supplementary_numbers}}</button>SN number range between 
                                <button class="btn btn-circle btn-primary">1</button> To
                                <button class="btn btn-circle btn-danger">{{$type->max_number}}</button>


                            </div>
                            <a href="{{url('/type/'.$type->id.'/history')}}">
                                <div class="panel-footer">
                                    <span class="pull-left">Results</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach





                </div>
                <div class="panel-footer">Footer of the container</div>
            </div>
        </div>
    </div>
</div>

@endsection
