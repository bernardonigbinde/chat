<template>
    <div class="overflow-y-scroll">
        <ul class="divide-y">
            <li class="justify-self-start py-2 pl-2 hover:bg-gray-200 cursor-default" v-for="(contact, index) in props.contacts" :key="contact.uuid" @click="selectContact(index, contact)" :class="{ 'bg-gray-300': index === selected }">
                <div class="avatar grid grid-cols-12 items-center">
                    <img :src="contact.profile_image" class="col-span-2 rounded-full p-0.5" :alt="contact.name"/>
                    <div class="col-span-10 whitespace-nowrap ml-1.5">
                        <p class="row-span-full overflow-hidden text-ellipsis font-bold" v-text="contact.name"/>
                        <p class="row-span-full overflow-hidden text-ellipsis text-md text-gray-500" v-text="contact.email"/>
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

let selected = ref(0);
</script>
