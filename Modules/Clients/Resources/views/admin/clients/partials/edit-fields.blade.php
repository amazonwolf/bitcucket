

<script type="text/javascript">
         function showHideDiv(ele) {
            var srcElement = document.getElementById(ele);
            if (srcElement != null) {
                if (srcElement.style.display == "none") 
                {
                    srcElement.style.display = 'block';
                }
                else {
                    srcElement.style.display = 'none';
                }
                return false;
            }
         }
      </script>
<script type="text/javascript">
         function showHideDiv1(ele) {
            var srcElement = document.getElementById(ele);
            if (srcElement != null) {
                if (srcElement.style.display == "none") 
                {
                    srcElement.style.display = 'block';

                }
                else {
                    srcElement.style.display = 'none';
                }
                return false;
            }
         }
</script>
<script type="text/javascript">
         function showHideDiv1(ele) {
            var srcElement = document.getElementById(ele);
            if (srcElement != null) {
                if (srcElement.style.display == "none") 
                {
                    srcElement.style.display = 'block';
                }
                else {
                    srcElement.style.display = 'none';
                }
                return false;
            }
         }
</script>
<script type="text/javascript">
         function showHideDiv1(ele) {
            var srcElement = document.getElementById(ele);
            if (srcElement != null) {
                if (srcElement.style.display == "none") 
                {
                    srcElement.style.display = 'block';
                }
                else {
                    srcElement.style.display = 'none';
                }
                return false;
            }
         }
</script>


<!-- ----------------------DIv 1---------------------------------------------------------------- -->






<div class="box-body">
     <div class="tab-content">
         <input type="button" value="Edit Company Details+" class="btn btn-primary " onClick="showHideDiv('divMsg')"/>
                <div class="tab-pane active" id="divMsg">
                    <div class="box-body">
                        <div class="row">
                               <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Company Name Original *') ? ' has-error' : '' }}">
                                    {!! Form::label('comp_name', trans('Company Name Original')) !!}
                                    {!! Form::text('comp_name', old('comp_name',$client->comp_name), ['class' => 'form-control', 'placeholder' => trans('Company Name *')]) !!}
                                    {!! $errors->first('comp_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Company Name English *') ? ' has-error' : '' }}">
                                    {!! Form::label('comp_name_eng', trans('Company Name English')) !!}
                                    {!! Form::text('comp_name_eng', old('comp_name_eng',$client->comp_name_eng), ['class' => 'form-control', 'placeholder' => trans('Company Name English *')]) !!}
                                    {!! $errors->first('comp_name_eng', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Registration No *') ? ' has-error' : '' }}">
                                    {!! Form::label('reg_no', trans('Registration No')) !!}
                                    {!! Form::text('reg_no', old('reg_no',$client->reg_no), ['class' => 'form-control', 'placeholder' => trans('Registration No *')]) !!}
                                    {!! $errors->first('reg_no', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Vat Id *') ? ' has-error' : '' }}">
                                    {!! Form::label('vat_id', trans('Vat Id')) !!}
                                    {!! Form::text('vat_id', old('vat_id',$client->vat_id), ['class' => 'form-control', 'placeholder' => trans('Vat Id *')]) !!}
                                    {!! $errors->first('vat_id', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Web Link *') ? ' has-error' : '' }}">
                                    {!! Form::label('web_link', trans('Web Link')) !!}
                                    {!! Form::text('web_link', old('web_link',$client->web_link), ['class' => 'form-control', 'placeholder' => trans('Web Link *')]) !!}
                                    {!! $errors->first('web_link', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Street Address Original *') ? ' has-error' : '' }}">
                                    {!! Form::label('street_add', trans('Street Address Original')) !!}
                                    {!! Form::text('street_add', old('street_add',$client->street_add), ['class' => 'form-control', 'placeholder' => trans('Street Address Original *')]) !!}
                                    {!! $errors->first('street_add', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>


                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Street Address English *') ? ' has-error' : '' }}">
                                    {!! Form::label('street_add_eng', trans('Street Address English')) !!}
                                    {!! Form::text('street_add_eng', old('street_add_eng',$client->street_add_eng), ['class' => 'form-control', 'placeholder' => trans('Street Address English *')]) !!}
                                    {!! $errors->first('street_add_eng', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('City Name Original *') ? ' has-error' : '' }}">
                                    {!! Form::label('city_name', trans('City Name Original')) !!}
                                    {!! Form::text('city_name', old('city_name',$client->city_name), ['class' => 'form-control', 'placeholder' => trans('City Name Original *')]) !!}
                                    {!! $errors->first('city_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('City Name English *') ? ' has-error' : '' }}">
                                    {!! Form::label('city_name_eng', trans('City Name English')) !!}
                                    {!! Form::text('city_name_eng', old('city_name_eng',$client->city_name_eng), ['class' => 'form-control', 'placeholder' => trans('City Name English *')]) !!}
                                    {!! $errors->first('city_name_eng', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>



                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                                    {!! Form::label('country_id', trans('Select Country *')) !!}
                                    <select class="form-control" name="country_id" id="country_id">
                                        <option value="">--- Select Country ---</option>
                                        <?php foreach ($countries as $value): ?>
                                            <option value="{{ $value->name }}" <?php if($value->name == $client->country_id) echo "selected" ?> >{{ $value->name }}</option>
                                        <?php endforeach; ?>

                                    </select>
                                    {!! $errors->first('country_id', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>


                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Logo') ? ' has-error' : '' }}">
                                    {!! Form::label('company_logo', trans('Choose File *')) !!}
                                    {!! Form::file('company_logo', old('company_logo'), ['class' => 'form-control', 'placeholder' => trans('Logo *')]) !!}
                                    {!! $errors->first('company_logo', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

<!-- 
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Logo *') ? ' has-error' : '' }}">
                                    {!! Form::label('company_logo', trans('Logo')) !!}
                                    {!! Form::text('company_logo', old('company_logo',$client->company_logo), ['class' => 'form-control', 'placeholder' => trans('Logo *')]) !!}
                                    {!! $errors->first('company_logo', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div> -->


                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Zip *') ? ' has-error' : '' }}">
                                    {!! Form::label('zip_code', trans('Zip')) !!}
                                    {!! Form::text('zip_code', old('zip_code',$client->zip_code), ['class' => 'form-control', 'placeholder' => trans('Zip *')]) !!}
                                    {!! $errors->first('zip_code', '<span class="help-block">:message</span>') !!}
                               </div>
                            </div>
                        </div>
                    </div>
                </div>


<!-- ----------------------DIv 2---------------------------------------------------------------- -->
  <input type="button" value="Edit Contact Details  +" class="btn btn-primary" onClick="showHideDiv1('divMsg1')"/>
                 <div class="tab-pane active" id="divMsg1" >
                    <div class="box-body">
                        <div class="row">               

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Contact Person Name *') ? ' has-error' : '' }}">
                                    {!! Form::label('cantact_name', trans('Contact Person Name')) !!}
                                    {!! Form::text('cantact_name', old('cantact_name',$client->cantact_name), ['class' => 'form-control', 'placeholder' => trans('Contact Person Name *')]) !!}
                                    {!! $errors->first('cantact_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Email *') ? ' has-error' : '' }}">
                                    {!! Form::label('cantact_email', trans('Email')) !!}
                                    {!! Form::text('cantact_email', old('cantact_email',$client->cantact_email), ['class' => 'form-control', 'placeholder' => trans('Email *')]) !!}
                                    {!! $errors->first('cantact_email', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Phone Number *') ? ' has-error' : '' }}">
                                    {!! Form::label('cantact_phone', trans('Phone Number ')) !!}
                                    {!! Form::text('cantact_phone', old('cantact_phone',$client->cantact_phone), ['class' => 'form-control', 'placeholder' => trans('Phone Number *')]) !!}
                                    {!! $errors->first('cantact_phone', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Position *') ? ' has-error' : '' }}">
                                    {!! Form::label('contact_position', trans('Position')) !!}
                                    {!! Form::text('contact_position', old('contact_position',$client->contact_position), ['class' => 'form-control', 'placeholder' => trans('Position *')]) !!}
                                    {!! $errors->first('contact_position', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('contact_language') ? ' has-error' : '' }}">
                                    {!! Form::label('contact_language', trans('Select Language *')) !!}
                                    <select class="form-control" name="contact_language" id="contact_language">
                                        <option value="">--- Select Language ---</option>
                                        <?php foreach ($languages as $value): ?>
                                            <option value="{{ $value->name }}" <?php if($value->name == $client->contact_language) echo "selected" ?> >{{ $value->name }}</option>
                                        <?php endforeach; ?>

                                    </select>
                                    {!! $errors->first('contact_language', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                           <!--  <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Communication Language *') ? ' has-error' : '' }}">
                                    {!! Form::label('contact_language', trans('Communication Language')) !!}
                                    {!! Form::text('contact_language', old('contact_language',$client->contact_language), ['class' => 'form-control', 'placeholder' => trans('Communication Language *')]) !!}
                                    {!! $errors->first('contact_language', '<span class="help-block">:message</span>') !!}
                                     </div>
                            </div>         -->                   
                        </div>
                    </div>
                </div>


<!-- --------------------------------DIV 3----------------------------------------------- -->
<input type="button" value="Edit Certification Details  +" class="btn btn-primary" onClick="showHideDiv1('divMsg2')"/>
                 <div class="tab-pane active" id="divMsg2" >
                    <div class="box-body">
                        <div class="row">

                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Certification Person Name *') ? ' has-error' : '' }}">
                                    {!! Form::label('contact_name_cert', trans('Certification Person Name')) !!}
                                    {!! Form::text('contact_name_cert', old('contact_name_cert',$client->contact_name_cert), ['class' => 'form-control', 'placeholder' => trans('Certification Person Name *')]) !!}
                                    {!! $errors->first('contact_name_cert', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Email *') ? ' has-error' : '' }}">
                                    {!! Form::label('cantact_email_cert', trans('Email')) !!}
                                    {!! Form::text('cantact_email_cert', old('cantact_email_cert',$client->cantact_email_cert), ['class' => 'form-control', 'placeholder' => trans('Email *')]) !!}
                                    {!! $errors->first('cantact_email_cert', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Phone Number *') ? ' has-error' : '' }}">
                                    {!! Form::label('cantact_phone_cert', trans('Phone Number ')) !!}
                                    {!! Form::text('cantact_phone_cert', old('cantact_phone_cert',$client->cantact_phone_cert), ['class' => 'form-control', 'placeholder' => trans('Phone Number *')]) !!}
                                    {!! $errors->first('cantact_phone_cert', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Position *') ? ' has-error' : '' }}">
                                    {!! Form::label('contact_position_cert', trans('Position')) !!}
                                    {!! Form::text('contact_position_cert', old('contact_position_cert',$client->contact_position_cert), ['class' => 'form-control', 'placeholder' => trans('Position *')]) !!}
                                    {!! $errors->first('contact_position_cert', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('contact_language_cert') ? ' has-error' : '' }}">
                                    {!! Form::label('contact_language_cert', trans('Select Language *')) !!}
                                    <select class="form-control" name="contact_language_cert" id="contact_language_cert">
                                        <option value="">--- Select Language ---</option>
                                        <?php foreach ($languages as $value): ?>
                                            <option value="{{ $value->name }}" <?php if($value->name == $client->contact_language_cert) echo "selected" ?> >{{ $value->name }}</option>
                                        <?php endforeach; ?>

                                    </select>
                                    {!! $errors->first('contact_language_cert', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                           <!--  <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Communication Language *') ? ' has-error' : '' }}">
                                    {!! Form::label('contact_language_cert', trans('Communication Language')) !!}
                                    {!! Form::text('contact_language_cert', old('contact_language_cert',$client->contact_language_cert), ['class' => 'form-control', 'placeholder' => trans('Communication Language *')]) !!}
                                    {!! $errors->first('contact_language_cert', '<span class="help-block">:message</span>') !!}
                             </div>
                            </div>     -->                       
                        </div>
                    </div>
                </div>


 <!-- --------------------------------DIV 4----------------------------------------------- -->
<input type="button" value="Edit Finance Details +" class="btn btn-primary" onClick="showHideDiv1('divMsg3')"/>
                 <div class="tab-pane active" id="divMsg3" >
                    <div class="box-body">
                        <div class="row">    


                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('company_type') ? ' has-error' : '' }}">
                                    {!! Form::label('company_type', trans('Company Type *')) !!}
                                    <select class="form-control" name="company_type" id="company_type">
                                        <option value="">--- Company Type ---</option>
                                        <?php foreach ($companyty as $value): ?>
                                            <option value="{{ $value->name }}" <?php if($value->name == $client->company_type) echo "selected" ?> >{{ $value->name }}</option>
                                        <?php endforeach; ?>

                                    </select>
                                    {!! $errors->first('company_type', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>



                          <!--    <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Company Type *') ? ' has-error' : '' }}">
                                    {!! Form::label('company_type', trans('Company Type')) !!}
                                    {!! Form::text('company_type', old('company_type',$client->company_type), ['class' => 'form-control', 'placeholder' => trans('Company Type *')]) !!}
                                    {!! $errors->first('company_type', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div> -->
                            
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Company Name for Invoice *') ? ' has-error' : '' }}">
                                    {!! Form::label('company_name_invoice', trans('Company Name for Invoice')) !!}
                                    {!! Form::text('company_name_invoice', old('company_name_invoice',$client->company_name_invoice), ['class' => 'form-control', 'placeholder' => trans('Company Name for Invoice *')]) !!}
                                    {!! $errors->first('company_name_invoice', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Email *') ? ' has-error' : '' }}">
                                    {!! Form::label('cantact_email_fina', trans('Email')) !!}
                                    {!! Form::text('cantact_email_fina', old('cantact_email_fina',$client->cantact_email_fina), ['class' => 'form-control', 'placeholder' => trans('Email *')]) !!}
                                    {!! $errors->first('cantact_email_fina', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Phone Number *') ? ' has-error' : '' }}">
                                    {!! Form::label('cantact_phone_fina', trans('Phone Number ')) !!}
                                    {!! Form::text('cantact_phone_fina', old('cantact_phone_fina',$client->cantact_phone_fina), ['class' => 'form-control', 'placeholder' => trans('Phone Number *')]) !!}
                                    {!! $errors->first('cantact_phone_fina', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('Payment Method *') ? ' has-error' : '' }}">
                                    {!! Form::label('payment_method', trans('Payment Method')) !!}
                                    {!! Form::text('payment_method', old('payment_method',$client->payment_method), ['class' => 'form-control', 'placeholder' => trans('Payment Method *')]) !!}
                                    {!! $errors->first('payment_method', '<span class="help-block">:message</span>') !!}
                                 </div>
                            </div>

                           
                        </div>
                    </div>
                </div>

            </div>
        
        </div>