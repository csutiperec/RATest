<script setup>
import { ref } from 'vue';
import MultiRangeSlider from './MultiRangeSlider.vue';
import StyledButton from './StyledButton.vue';
import ToggleSwitch from './ToggleSwitch.vue';

const optionsContainer = ref('options-container');
const newRuleSection = ref('new-rule-section');

const MultiRangeSliderValues = ref([0, 24]);
const ToggleValue = ref(false);

const emit = defineEmits(['handleNewRuleClick', 'handleSubmitClick']);

const handleNewRuleClick = () => {
    const returnValues = {
        changeFrom: MultiRangeSliderValues.value[0],
        changeTill: MultiRangeSliderValues.value[1],
        changeTo: ToggleValue.value
    }
    emit('handleNewRuleClick', returnValues);
}

const handleSubmitClick = () => {
    emit('handleSubmitClick');
}

</script>

<template>
    <div :class="newRuleSection">
        <MultiRangeSlider @onUpdate="(values) => MultiRangeSliderValues = values"></MultiRangeSlider>
        <div :class="optionsContainer">
            <span>Open: </span>
            <ToggleSwitch @onChange="(value) => ToggleValue = value"></ToggleSwitch>
        </div>
        <div :class="optionsContainer">
            <StyledButton @onClick="handleNewRuleClick" :label="'Add new rule'"></StyledButton>
            <StyledButton @onClick="handleSubmitClick" :label="'Submit'"></StyledButton>
        </div>
    </div>
</template>

<style>
    .new-rule-section {
        margin-top: 80px;
    }
    .options-container {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 8px;
        margin-top: 18px;
    }
</style>