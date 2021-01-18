<div class="block-header">
    <h3 class="block-title">Dynamic Table <small>Full pagination</small></h3>
    <x-button class="btn btn-primary" onclick="commonAjaxModel('addrole_modal')" data-validation="validation-span-id"
              id="validation-span-id">Add
    </x-button>
</div>
<div class="block-content block-content-full">
    <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
        <thead>
        <tr>
            <th class="text-center" style="width: 80px;">ID</th>
            <th>Date</th>
            <th>Status</th>
            <th>Type</th>
            <th>Description</th>
            <!-- <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
            <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
            <th style="width: 15%;">Registered</th> -->
            <!-- <th style="width: 15%;">opertaion</th> -->
        </tr>
        </thead>
        <tbody>
        <!-- @if($roles)
            @foreach($roles as $role)
                <tr>
                    <td class="text-center font-size-sm">{{$role->id}}</td>
                    <td class="font-w600 font-size-sm">{{$role->name}}</td>
                    <td>
                         <button class="btn btn-info" onclick="commonAjaxModel('editrole_modal',{{$role->id}})"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger" onclick="commonAjaxModel('deleterole_modal',{{$role->id}})"><i class="fa fa-trash" aria-hidden="true"></i></button>

                    </td>
                </tr>
            @endforeach
        @endif -->
        
        </tbody>
    </table>
</div>
