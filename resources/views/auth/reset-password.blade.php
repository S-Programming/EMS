<x-guest-layout>
    <x-auth-card>
        <!-- Page Content -->
        <div class="hero-static">
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <!-- Reminder Block -->
                        <div class="block block-rounded block-themed mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Reset Password</h3>
                                <div class="block-options">
                                    <a class="btn-block-option" href="{{route('login')}}" data-toggle="tooltip"
                                       data-placement="left" title="Sign In">
                                        <i class="fa fa-sign-in-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="p-sm-3 px-lg-4 py-lg-5">
                                    <h1 class="h2 mb-1">KodeStudio</h1>
                                    <p class="text-muted">
                                        Please provide your account’s email and we will send you your password.
                                    </p>

                                    <!-- Reminder Form -->
                                    <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _js/pages/op_auth_reminder.js) -->
                                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                    <form class="js-validation-reminder" action="{{ route('password.update') }}"
                                          id="new-password-form-id" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <x-input type="hidden" class="form-control form-control-lg form-control-alt"
                                                     id="password" name="token" value="{{$request->token}}"
                                                     placeholder="Password"/>
                                            <x-input type="password"
                                                     class="form-control form-control-lg form-control-alt" id="password"
                                                     name="password" placeholder="Password"/>
                                        </div>
                                        <div class="form-group">
                                            <x-input type="password"
                                                     class="form-control form-control-lg form-control-alt"
                                                     id="password_confirmation" name="password_confirmation"
                                                     placeholder="Confirm Password"/>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-xl-5">
                                                <x-button class="checkout-btn btn btn-primary"
                                                          onclick="validateFieldsByFormId(this)"
                                                          data-validation="validation-span-id" id="validation-span-id">
                                                    <i class="fa fa-fw fa-lock mr-1"></i>{{ __('Update Password') }}
                                                </x-button>
                                                <!-- <button type="submit">yes</button> -->
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Reminder Form -->
                                </div>
                            </div>
                        </div>
                        <!-- END Reminder Block -->
                    </div>
                </div>
            </div>
            <x-footer-signature></x-footer-signature>
        </div>
        <!-- END Page Content -->
    </x-auth-card>
</x-guest-layout>
