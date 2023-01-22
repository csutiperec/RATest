<script setup>
    import { ref } from 'vue'

    const props = defineProps({
        tableToDisplay: Array
    })

    const timeArray = ref(props.tableToDisplay);
    const tableStyle = ref('tableStyle');
    const tableCellsStyle = ref('tableCells');

    const openCloseStyle = (time)=> {
        return tableCellsStyle.value + ' ' + (time.open ? 'open' : 'closed');
    };
</script>

<template>
    <div :class="tableStyle">
        <div v-for="time in timeArray" :key="time.id">
            <div :class="tableCellsStyle">
                {{time.time}}
            </div>
            <div :class="openCloseStyle(time)">
                <p v-if="time.open">Open</p>
                <p v-else>Closed</p>
            </div>
        </div>
    </div>
</template>

<style>
    .tableStyle {
        text-align: center;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .tableCells {
        border: 1px solid;
        border-radius: 5px;
        background-color: white;
        color: black;
        min-width: 50px;
    }
    .tableCells.open {
        background-color: greenyellow;
        color: black;
    }
    .tableCells.closed {
        background-color: tomato;
        color: black;
    }
</style>