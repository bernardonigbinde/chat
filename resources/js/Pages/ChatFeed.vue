<template>
    <div class="h-[30rem] overflow-y-scroll flex flex-col-reverse">
        <ul v-if="props.contact">
            <li v-for="message in props.messages"
                :key="message.uuid"
                :class="`message_${message.to === props.contact.uuid ? 'sent place-content-end' : 'received'}`"
                class="flex">
                <div class="">
                    <div class="rounded-xl py-1 px-2.5 m-2 min-w-[6rem] max-w-lg"
                         :class="message.to === props.contact.uuid ? 'bg-blue-500 text-white text-right' : 'bg-gray-200'">
                        <div v-html="message.text" />
                        <div class="text-xs font-bold my-0.5"
                             :class="message.to === props.contact.uuid ? 'text-right' : ''">{{ message.created_at }}</div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
import {onMounted} from "vue";

let props = defineProps({
    messages: Array,
    contact: Object,
})

</script>

<style scoped>

</style>
