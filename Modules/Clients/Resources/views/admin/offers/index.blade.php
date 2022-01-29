@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('clients::offers.title.offers') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('clients::offers.title.offers') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.clients.offers.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('clients::offers.button.create offers') }}
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
                                 <th>Service Type</th>
                                 <th>Standard Type</th>
                                 <th>Nace Type</th>
                                 <th>Other Nace</th>
                                 <th>Risk Category</th>
                                 <th>Proportion</th>
                                 <th>Outsourcing</th>
                                 <th>Management System</th>
                                 <th>Activity</th>
                                 <th>Audit Type</th>
                                 <th>Location No</th>
                                 <th>No of Shifts</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($offers)): ?>
                            <?php foreach ($offers as $offers): ?>
                            <tr>
                                 <td> {{ $offers->service_type}}</td>
                                <td> {{ $offers->standard_type }}</td>
                                <td> {{ $offers->nace_type }}</td>
                                <td> {{ $offers->other_nace }}</td>
                                <td> {{ $offers->risk_cat }}</td>
                                <td> {{ $offers->prportion }}</td>
                                <td> {{ $offers->outsourcing }}</td>
                                <td> {{ $offers->management_sys }}</td>
                                <td> {{ $offers->activity }}</td>
                                <td> {{ $offers->audit_type }}</td>
                                <td> {{ $offers->loc_no }}</td>
                                <td> {{ $offers->no_of_shifts }}</td>
                                <td>
                                    <a href="{{ route('admin.clients.offers.edit', [$offers->id]) }}">
                                        {{ $offers->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.clients.offers.edit', [$offers->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.clients.offers.destroy', [$offers->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                               <!--   <th>Service Type</th>
                                 <th>Standard Type</th>
                                 <th>Nace Type</th>
                                 <th>Other Nace</th>
                                 <th>Risk Category</th>
                                 <th>Proportion</th>
                                 <th>Outsourcing</th>
                                 <th>Management System</th>
                                 <th>Activity</th>
                                 <th>Audit Type</th>
                                 <th>Location No</th>
                                 <th>No of Shifts</th>
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
        <dd>{{ trans('clients::offers.title.create offers') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.clients.offers.create') ?>" }
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
