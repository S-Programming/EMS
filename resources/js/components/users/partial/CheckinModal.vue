<template>

    <AppModal v-model="isModalOpen" :config="{class:'sm:w-1/3 w-3/5 w-1/12'}">
        <template v-slot:body-content>
            <h3 class="block-title">CheckIn Confirmation</h3>
                <div class="block-content font-size-sm">
                    <p>Are you sure, want to checkin?</p>
                </div>
                <div class="block-content block-content-full text-right border-top">
                    <button
                        class="btn btn-default rounded cancel-button"
                        @click.prevent="close"> Cancel
                    </button>
                    <button
                        class="btn btn-danger rounded jury-btn text-white"
                        @click.prevent="checkin"> Yes, Checkin
                    </button>
                </div>
        </template>
    </AppModal>
</template>

<script>
    import AppModal from "../../ui/base/AppModal";
    export default {
        name: "CheckinModal",
        components:{AppModal},
        props: {
            value: {
                required: true,
            },
        },

        created() {
        },
        computed: {
            isModalOpen: {
                get() {
                    return this.value;
                },
                set(currentValue) {
                    this.$emit("input", currentValue);
                },
            },
        },
        data() {
            return {
            };
        },
        methods: {
            close() {
                this.$emit("input", !this.value);
            },
            checkin(){
                this.$emit("checkin");
                this.close();
            },
        },
    }
</script>

<style scoped>

</style>
