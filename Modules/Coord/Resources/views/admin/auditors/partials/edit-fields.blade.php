
<!-- ----------------------DIv 1---------------------------------------------------------------- -->

    

<div class="box-body">
     <div class="tab-content">
         <input type="button" value="Add Auditor Details" class="btn btn-primary " onClick="showHideDiv('divMsg')"/>

                <div class="tab-pane active" id="divMsg" >
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Auditor Name*') ? ' has-error' : '' }}">
                                    {!! Form::label('name', trans('Auditor Name')) !!}
                                    {!! Form::text('name', old('name',$auditor->name), ['class' => 'form-control', 'placeholder' => trans('Auditor Name')]) !!}
                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Auditor Address*') ? ' has-error' : '' }}">
                                    {!! Form::label('address', trans('Auditor City')) !!}
                                    {!! Form::text('address', old('address',$auditor->address), ['class' => 'form-control', 'placeholder' => trans('Auditor Address')]) !!}
                                    {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Auditor City*') ? ' has-error' : '' }}">
                                    {!! Form::label('city', trans('Auditor City')) !!}
                                    {!! Form::text('city', old('city',$auditor->city), ['class' => 'form-control', 'placeholder' => trans('Auditor City*')]) !!}
                                    {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>   
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Auditor Timing*') ? ' has-error' : '' }}">
                                    {!! Form::label('timing', trans('Auditor Timing')) !!}
                                    {!! Form::text('timing', old('timing',$auditor->timing), ['class' => 'form-control', 'placeholder' => trans('Auditor Timing')]) !!}
                                    {!! $errors->first('timing', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
<!-- ----------------------DIv 2---------------------------------------------------------------- -->
 
        
        </div>