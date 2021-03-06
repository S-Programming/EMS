<div class="block-header">
    <h3 class="block-title">User Record </h3>
    <x-button class="btn btn-primary" onclick="commonAjaxModel('add/user/modal')" data-validation="validation-span-id"
              id="validation-span-id">Add
    </x-button>
    {{-- <x-button class="btn btn-primary">Upload CSV</x-button> --}}
{{--    <form action="{{ route('user.import.by.csv') }}"id="user-form-id"--}}
{{--    data-modal-id="{{$id??'common_popup_modal'}}" method="POST" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        <div class="custom-file">--}}
{{--            <div class="col-12 mt-5">--}}
{{--                <input type="file" name="csv_file" accept=".csv" class="form-control rounded-0" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <input name="test" type="text" >--}}
{{--        <x-button class="btn btn-primary" onclick="validateFieldsByFormId(this)"--}}
{{--        data-validation="validation-span-id"--}}
{{--        id="validation-span-id">--}}
{{--  <i class="fa fa-fw fa-sign-in-alt mr-1"></i>{{ __('Submit') }}--}}
{{--</x-button>--}}
{{--        </form>--}}
    {{-- onclick="usersCsvUploadByAdmin()" --}}

</div>
<div class="block-content block-content-full">
    {{-- ajaxCallOnclick('import_users_by_csv')  visitorCsvUploadByOrganizer() --}}
    <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
    <table class="table table-bordered table-striped table-vcenter  js-dataTable-buttons">
        <thead>
        <tr>
            <th class="text-center" style="width: 80px;">ID</th>
            <th>Name</th>
            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
            <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
            <th style="width: 15%;">Registered</th>
            <th style="width: 15%;">opertaion</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($users))
            @foreach($users as $user)
                <tr>
                    <td class="text-center font-size-sm">{{$user->id}}</td>
                    <td class="font-w600 font-size-sm">{{$user->first_name}} {{$user->last_name}}</td>
                    <td class="d-none d-sm-table-cell font-size-sm">
                        <em class="text-muted">{{$user->email}}</em>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-primary">{{$user->roles[0]->name??''}}</span>
                    </td>
                    <td>
                        <em class="text-muted font-size-sm">{{(isset($user->created_at)?$user->created_at->format('d M'):'')}}</em>
                    </td>
                    <td>
                         <button class="btn btn-info" onclick="commonAjaxModel('edit/user/modal',{{$user->id}})"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger" onclick="commonAjaxModel('delete/user/modal',{{$user->id}})"><i class="fa fa-trash" aria-hidden="true"></i></button>
{{--                        <a class="btn btn-info"  onclick="ajaxCallOnclick('specific_user_profile',{user_id:{{$user->id}} })"><i class="fas fa-eye"></i></a>--}}
                        <a class="btn btn-info"  href="{{ route('admin.user.profile',$user->id)   }}"><i class="fas fa-user"></i></a>

                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
</div>
