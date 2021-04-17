<x-modal :id="$id??'common_popup_modal'" :class="$class??'modal-lg'" :extra="['cls'=>'bg-primary-dark']">
    <x-slot name="modal_header_content">
        <h3 class="block-title">Add Report</h3>
    </x-slot>
    <x-slot name="modal_content">
        <div class="block-content font-size-sm">
            <form method="POST" action="{{ route('confirm.checkout') }}" id="checkout-form-id" data-modal-id="{{$id??'common_popup_modal'}}">
                @csrf

                @php
                $inyMceConfig = theme_tinyMCE_default_config();
                $inyMceConfig['is_tiny_mce_modal'] = $id??'common_popup_modal';
                $inyMceConfig['selector'] = '.tinymce-editor-cls';
                echo theme_tinyMCE_script($inyMceConfig);
                @endphp


                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="checkin_date">&nbsp Checkin Date</label>
                            <x-input id="checkin_date" class="form-control form-control-alt form-control-lg" type="text" name="checkin_date" value="" required autofocus />
                        </div>
                        <div class="col-lg-6">
                            <label for="roles">&nbsp Select Project</label>
                            {!!$project_dropdown??''!!}
                        </div>
                        <!-- <div class="col-lg-6">
                            <label for="checkin_date">&nbsp Projects</label>
                            <x-input id="checkin_date" class="form-control form-control-alt form-control-lg" type="text" name="checkin_date" value="" required autofocus />
                        </div> -->
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="hours">&nbsp Hours</label>
                            <x-input id="hours" class="form-control form-control-alt form-control-lg" type="text" name="hours" value="" required autofocus />
                        </div>
                        <div class="col-lg-6">
                            <label for="minutes">&nbsp Minutes</label>
                            <x-input id="minutes" class="form-control form-control-alt form-control-lg" type="text" name="minutes" value="" required autofocus />
                        </div>
                    </div>
                </div>

                <div class="py-3">
                    <label for="task_details">&nbsp Task Details</label>
                    <textarea id="task_details" class="tinymce-editor-cls tinymce-modal form-control form-control-alt form-control-lg" name="task_details" required autofocus></textarea>
                </div>
                <div class="block-content block-content-full text-right border-top">
                    <button type="button" class="btn btn-alt-primary mr-1" data-dismiss="modal">No</button>
                    <x-button class="checkout-btn btn btn-primary" onclick="validateFieldsByFormId(this)" data-validation="validation-span-id" id="validation-span-id">
                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i>{{ __('Check Out') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-slot>
</x-modal>