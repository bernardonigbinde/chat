<template>
    <div class="overflow-y-scroll rounded-r-lg bg-white">
        <ul class="divide-y">
            <li class="justify-self-start py-2 pl-2 hover:bg-gray-200 cursor-default" v-for="(contact, index) in props.contacts" :key="contact.uuid" @click="selectContact(index, contact)" :class="{ 'bg-gray-300': index === selected }">
                <div class="avatar grid grid-cols-12 items-center">
                    <img :src="contact.profile_image" class="col-span-2 rounded-full p-0.5" :alt="contact.name"/>
                    <div class="col-span-10 whitespace-nowrap ml-1.5 flex flex-row">
                        <div class="overflow-hidden">
                            <p class="row-span-full overflow-hidden text-ellipsis font-bold" v-text="contact.name"/>
                            <p class="row-span-full overflow-hidden text-ellipsis text-md text-gray-500" v-text="contact.email"/>
                        </div>
                        <p class="text-xs font-bold mx-3 self-center bg-green-400 text-white px-2 py-1 rounded" v-if="contact.unreadMessagesCount" v-text="contact.unreadMessagesCount" />
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
import {ref} from "vue";

let props = defineProps({
    contacts: Array,
});

let emits = defineEmits(['selectedContact'])

let selectContact = (index, contact) => {
    selected.value = index;
    emits('selectedContact', contact);
}

let selected = ref(null);
</script>
