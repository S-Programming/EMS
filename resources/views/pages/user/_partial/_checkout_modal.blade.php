<x-modal :id="$id??'common_popup_modal'" :class="$class??''" :extra="['cls'=>'bg-primary-dark']">
    <x-slot name="modal_header_content">
        <h3 class="block-title">CheckOut</h3>
    </x-slot>
    <x-slot name="modal_content" >
        <div class="block-content font-size-sm">
            <p>Are you sure?</p>
        </div>
    </x-slot>
    <x-slot name="modal_content" >
        <form method="POST" action="{{ route('confirm.checkout') }}" id="login-form-id" data-modal-id="{{$id??'common_popup_modal'}}">
            @csrf
            <div class="py-3">
                <div class="form-group">
                    <textarea id="description" class="form-control form-control-alt form-control-lg"  name="description"  required autofocus ></textarea>
                </div>
            </div>
            <div class="block-content block-content-full text-right border-top">
                <button type="button" class="btn btn-alt-primary mr-1" data-dismiss="modal">No</button>
                <x-button class="btn btn-primary" onclick="validateFieldsByFormId(this)" data-validation="validation-span-id"
                              id="validation-span-id" >
                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i>{{ __('Check Out') }}
                </x-button>
            </div>
        </form>

    </x-slot>
</x-modal>
