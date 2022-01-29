<div class="box-body">
     <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Service Type *') ? ' has-error' : '' }}">
                                    {!! Form::label('service_type', trans('Service Type')) !!}
                                    {!! Form::text('service_type', old('service_type',$offers->service_type), ['class' => 'form-control', 'placeholder' => trans('Service Type *')]) !!}
                                    {!! $errors->first('service_type', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Standard Type *') ? ' has-error' : '' }}">
                                    {!! Form::label('standard_type', trans('Standard Type')) !!}
                                    {!! Form::text('standard_type', old('standard_type',$offers->standard_type), ['class' => 'form-control', 'placeholder' => trans('Standard Type *')]) !!}
                                    {!! $errors->first('standard_type', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Nace Type *') ? ' has-error' : '' }}">
                                    {!! Form::label('nace_type', trans('Nace Type')) !!}
                                    {!! Form::text('nace_type', old('nace_type',$offers->nace_type), ['class' => 'form-control', 'placeholder' => trans('Nace Type *')]) !!}
                                    {!! $errors->first('nace_type', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Other Nace *') ? ' has-error' : '' }}">
                                    {!! Form::label('other_nace', trans('Other Nace')) !!}
                                    {!! Form::text('other_nace', old('other_nace',$offers->other_nace), ['class' => 'form-control', 'placeholder' => trans('Other Nace *')]) !!}
                                    {!! $errors->first('other_nace', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Risk Category *') ? ' has-error' : '' }}">
                                    {!! Form::label('risk_cat', trans('Risk Category')) !!}
                                    {!! Form::text('risk_cat', old('risk_cat',$offers->risk_cat), ['class' => 'form-control', 'placeholder' => trans('Risk Category *')]) !!}
                                    {!! $errors->first('risk_cat', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>



                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Proportion *') ? ' has-error' : '' }}">
                                    {!! Form::label('prportion', trans('Proportion')) !!}
                                    {!! Form::text('prportion', old('prportion',$offers->prportion), ['class' => 'form-control', 'placeholder' => trans('Proportion *')]) !!}
                                    {!! $errors->first('prportion', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Outsourcing *') ? ' has-error' : '' }}">
                                    {!! Form::label('outsourcing', trans('Outsourcing')) !!}
                                    {!! Form::text('outsourcing', old('outsourcing',$offers->outsourcing), ['class' => 'form-control', 'placeholder' => trans('Outsourcing *')]) !!}
                                    {!! $errors->first('outsourcing', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Management System *') ? ' has-error' : '' }}">
                                    {!! Form::label('management_sys', trans('Management System')) !!}
                                    {!! Form::text('management_sys', old('management_sys',$offers->management_sys), ['class' => 'form-control', 'placeholder' => trans('Management System *')]) !!}
                                    {!! $errors->first('management_sys', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Activity *') ? ' has-error' : '' }}">
                                    {!! Form::label('activity', trans('Activity')) !!}
                                    {!! Form::text('activity', old('activity',$offers->activity), ['class' => 'form-control', 'placeholder' => trans('Activity *')]) !!}
                                    {!! $errors->first('activity', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Audit Type *') ? ' has-error' : '' }}">
                                    {!! Form::label('audit_type', trans('Audit Type')) !!}
                                    {!! Form::text('audit_type', old('audit_type',$offers->audit_type), ['class' => 'form-control', 'placeholder' => trans('Audit Type *')]) !!}
                                    {!! $errors->first('audit_type', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Location No *') ? ' has-error' : '' }}">
                                    {!! Form::label('loc_no', trans('Location No')) !!}
                                    {!! Form::text('loc_no', old('loc_no',$offers->loc_no), ['class' => 'form-control', 'placeholder' => trans('Location No *')]) !!}
                                    {!! $errors->first('loc_no', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('No of Shifts *') ? ' has-error' : '' }}">
                                    {!! Form::label('no_of_shifts', trans('No of Shifts')) !!}
                                    {!! Form::text('no_of_shifts', old('no_of_shifts',$offers->no_of_shifts), ['class' => 'form-control', 'placeholder' => trans('No of Shifts *')]) !!}
                                    {!! $errors->first('no_of_shifts', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>