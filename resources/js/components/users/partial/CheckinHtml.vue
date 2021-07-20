<template>
    <div>
        <a @click="showCheckinConfirmation()" href="javascript:void(0)"
                class="block block-rounded block-link-shadow text-center bg-info">
            <div class="block-content block-content-full">
                <div class="font-size-h3 text-light">Checkin</div>
            </div>
            <div class="block-content py-2 bg-body-light">
<!--                <p class="font-w600 font-size-sm text-muted mb-0">-->
<!--                    {{ session()->get('total_work_time') ?? 'Checkin'}}-->
<!--                    &lt;!&ndash; {{$total_work_time??'Checkin'}} &ndash;&gt;-->
<!--                </p>-->
            </div>
        </a>
<!--        <a class="block block-rounded block-link-shadow text-center bg-info" href="javascript:void(0)" >-->
<!--            <div class="block-content block-content-full">-->
<!--                <div class="font-size-h3 text-light">Checkin</div>-->
<!--            </div>-->
<!--            <div class="block-content py-2 bg-body-light">-->
<!--                <p class="font-w600 font-size-sm text-muted mb-0">-->
<!--                    {{ session()->get('total_work_time') ?? 'Checkin'}}-->
<!--                    &lt;!&ndash; {{$total_work_time??'Checkin'}} &ndash;&gt;-->
<!--                </p>-->
<!--            </div>-->
<!--        </a>-->
        <checkin-modal v-model="checkinConfirmationModal" @checkin="checkin($event)"></checkin-modal>

    </div>
</template>

<script>
    import {mapActions} from "vuex";
    import CheckinModal from "./CheckinModal";
    export default {
        name: "CheckinHtml",
        components: {CheckinModal},
        data(){
            return {
                checkinConfirmationModal:false,
            }
        },
        methods:{
            ...mapActions(['actionCheckin']),
            showCheckinConfirmation() {
                this.checkinConfirmationModal = true
                // this.$emit('checkin',this.checkinConfirmationModal)
            },
             checkin(value){
                this.checkinConfirmationModal = value
                // let checkinStatus = await this.actionCheckin();
            },

        }
    }
</script>

<style scoped>

</style>
