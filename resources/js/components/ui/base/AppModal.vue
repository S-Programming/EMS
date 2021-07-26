<template>
    <div class=""
         v-show="value"> <!-- overflow-hidden -->
        <div :class="config.class"
             class="modal-content">
            <!--content-->
            <div class="block block-rounded block-themed block-transparent mb-0">
                <!--header-->
                <div class="block-options">
                    <button
                        class="btn-block-option"
                        @click.prevent="close">
<!--                        <span class="bg-transparent text-gray-600 opacity-5 font-thin text-6xl block outline-none focus:outline-none hover:text-gray-800">×</span>-->
                        <i class="fa fa-fw fa-times"></i>
                        Close
                    </button>
                </div>
                <!--   dynamic template   -->
                <slot name="body-content" />
                <!--   END dynamic template   -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AppModal",
        props: {
            value: {
                required: true,
            },
            config: Object,
        },
        watch: {
            value: {
                handler(value) {
                    let isModalOpen = value ? "addClass" :'';
                    this.toggleBodyClass(isModalOpen, "overflow-hidden");
                }
            }
        },
        methods:{
            close() {
                this.$emit("input", !this.value);
            },
            toggleBodyClass(addRemoveClass, className) {
                const el = document.body;
                if (addRemoveClass === "addClass") {
                    el.classList.add(className);
                } else {
                    el.classList.remove(className);
                }
            }
        }
    }
</script>
