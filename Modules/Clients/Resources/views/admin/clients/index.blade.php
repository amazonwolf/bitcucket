@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('clients::clients.title.clients') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('clients::clients.title.clients') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.clients.client.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('clients::clients.button.create client') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                 <th>Company Name</th>
                                 <th>Registration No</th>
                                 <th>Web Link</th>
                                <!--  <th>Street Address</th>
                                 <th>Zip Code</th>
                                 <th>Country Name</th>
                                 <th>Contact Name</th> -->
                                 <th>Contact Email</th>
                                 <th>Contact Phone</th>
                                 <!-- <th>Position</th>
                                 <th>Language</th>
                                 <th>Name Finance</th> -->
                                


                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($clients)): ?>
                            <?php foreach ($clients as $client): ?>
                            <tr>
                                <td> {{ $client->comp_name}}</td>
                                <td> {{ $client->reg_no }}</td>
                                <td> {{ $client->web_link }}</td>
                               <!--  <td> {{ $client->street_add }}</td>
                                <td> {{ $client->zip_code }}</td>
                                <td> {{ $client->country_id }}</td>
                                <td> {{ $client->cantact_name }}</td> -->
                                <td> {{ $client->cantact_email }}</td>
                                <td> {{ $client->cantact_phone }}</td>
                               <!--  <td> {{ $client->contact_position }}</td>
                                <td> {{ $client->contact_language }}</td>
                                <td> {{ $client->contact_name_fina }}</td> -->
                                <td>
                                    <a href="{{ route('admin.clients.client.edit', [$client->id]) }}">
                                        {{ $client->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.clients.client.edit', [$client->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.clients.client.destroy', [$client->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <!-- <th>Company Name</th>
                                 <th>Register No</th>
                                 <th>Web Link</th>
                                 <th>Street Address</th>
                                 <th>Zip Code</th>
                                 <th>Country Name</th>
                                 <th>Contact Name</th>
                                 <th>Contact Email</th>
                                 <th>Contact Phone</th>
                                 <th>Position</th>
                                 <th>Language</th>
                                 <th>Name Finance</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th>{{ trans('core::core.table.actions') }}</th> -->
                            </tr>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('clients::clients.title.create client') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.clients.client.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
