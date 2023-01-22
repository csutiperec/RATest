<script setup>
    import { ref } from 'vue';
    
    const props = defineProps({
        label: String
    })
    const buttonStyle = ref('button');

    const emit = defineEmits(['onClick']);

    const handleClick = () => {
        emit('onClick');
    }
</script>

<template>
    <button @click="handleClick" :class="buttonStyle">{{props.label}}</button>
</template>

<style scoped>
    .button {
	background-color:#10b981;
	border-radius:30px;
	border:1px solid #18ab29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:14px;
	padding:10px 10px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
    min-width: 110px;
    }
    .button:hover {
	    background-color:#5cbf2a;
    }
    .button:active {
	    position:relative;
	    top:1px;
    }   
</style>