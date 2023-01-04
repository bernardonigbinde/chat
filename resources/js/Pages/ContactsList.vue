<template>
    <div class="contact-list">
        <ul>
            <li v-for="(contact, index) in props.contacts" :key="contact.uuid" @click="selectContact(index, contact)" :class="{ 'selected': index === selected }">
                <div class="avatar">
                    <img :src="contact.profile_image" class="rounded-full" :alt="contact.name" />
                </div>
                <div class="contact">
                    <p class="name" v-text="contact.name" />
                    <p class="email" v-text="contact.email" />
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
    selected.value = contact;
    emits('selectedContact', selected.value);
}

let selected = ref(0);
</script>
