<x-backend-layout>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    User Quries <!-- <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Tables transformed with dynamic features.</small> -->
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Tables</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">DataTables</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table Full Pagination -->
{{--        @dd($query_statuses)--}}
        <div id="user-query-list-section" class="block block-rounded">
            @include('pages.user_query._partial._admin_user_query_list_table_html',['user_quries' => $user_quries])
        </div>
        <!-- END Dynamic Table Full Pagination -->
    </div>
</x-backend-layout>
