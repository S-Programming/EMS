<div class="block-header">
    <h3 class="block-title">Dynamic Table <small>Full pagination</small></h3>
    <x-button class="btn btn-primary" onclick="commonAjaxModel('request/leave/modal')" data-validation="validation-span-id" id="validation-span-id">Request
    </x-button>
</div>
<div class="block-content block-content-full">
    <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
        <thead>
            <tr>
                <th style="width: 15%;">Start Date</th>
                <th style="width: 15%;">End Date</th>
                <th style="width: 15%;">Type</th>
                <th class="d-none d-sm-table-cell" style="width: 30%;">Description</th>
                <th class="d-none d-sm-table-cell" style="width: 30%;">Comments</th>
                <th class="d-none d-sm-table-cell" style="width: 10%;">Status</th>

            </tr>
        </thead>
        <tbody>
            @if(isset($leaves) && !empty($leaves))
            @foreach($leaves as $leave)
            <tr>
                <!-- <td class="font-w600 font-size-sm">{{date('Y-m-d',strtotime($leave->start_date))}}</td> -->
                <td class="font-w600 font-size-sm">{{$leave->start_date ?? 0}}</td>
                <td class="font-w600 font-size-sm">{{$leave->end_date ?? 0}}</td>
                <td class="font-w600 font-size-sm">{{$leave->type->type ?? ''}}</td>
                <td class="font-w600 font-size-sm">{!! $leave->description ?? '' !!}</td>
                <td class="font-w600 font-size-sm">{!! $leave->comments ?? '' !!}</td>
                <td class="font-w600 font-size-sm">{{$leave->requestStatus->status ?? ''}}</td>

                <!-- <td>
                    <button class="btn btn-info" onclick="commonAjaxModel('edit_role_modal',{{$leave->id}})"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger" onclick="commonAjaxModel('delete_role_modal',{{$leave->id}})"><i class="fa fa-trash" aria-hidden="true"></i></button>

                </td> -->
            </tr>
            @endforeach

            @endif
        </tbody>
    </table>
</div>
