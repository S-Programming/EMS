<template>
    <div>
        <a class="block block-rounded block-link-shadow text-center bg-info" href="javascript:void(0)" >
            <div class="block-content block-content-full">
                <div class="font-size-h3 text-light">Checkin</div>
            </div>
<!--            <div class="block-content py-2 bg-body-light">-->
<!--                <p class="font-w600 font-size-sm text-muted mb-0">-->
<!--                    {{ session()->get('total_work_time') ?? 'Checkin'}}-->
<!--                    &lt;!&ndash; {{$total_work_time??'Checkin'}} &ndash;&gt;-->
<!--                </p>-->
<!--            </div>-->
        </a>
    </div>
</template>

<script>
    export default {
        name: "CheckinHtml"
    }
</script>

<style scoped>

</style>
