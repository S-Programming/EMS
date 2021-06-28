<template>
    <div class="modal fixed inset-0 z-50 outline-none focus:outline-none overflow-y-auto"
         v-show="value"> <!-- overflow-hidden -->
        <div :class=config.class class="bg-white mt-3 mb-1 md:mt-3 pb-4 mx-auto">
            <!--content-->
            <div class="border-0 outline-none focus:outline-none">
                <!--header-->
                <div class="relative h-10 md:h-16 w-full">
                    <button
                        class="absolute right-0 mr-2 md:mr-3 p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none z-50"
                        @click.prevent="close">
                        <span class="bg-transparent text-gray-600 opacity-5 font-thin text-6xl block outline-none focus:outline-none hover:text-gray-800">×</span>
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
        created() {
            console.log("App modal")
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
