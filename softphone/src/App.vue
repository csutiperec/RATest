<script setup>
  import { ref } from "vue";
  import QueueDisplayed from "./components/QueueDisplayed.vue";
  import NewRuleSection from "./components/NewRuleSection.vue";
  import axios from "axios";

  const appContainer = ref('app-container')
  const textareaValue = ref('');
  const textareaStyle = ref('textarea-style')

  let array = [];
  for (let index = 0; index < 24; index++) {
      array[index] = {
          id: index,
          time: `${index}:00`,
          open: true,
      };
  }
  const phoneQueueStatus = ref(array);

  const handleNewRuleClick = (value) => {
    for (let index = value.changeFrom; index < value.changeTill; index++) {
      phoneQueueStatus.value[index].open = value.changeTo;
    }
  }

  const handleSubmitClick = () => {
    textareaValue.value = 'Loading...';
    axios.get('http://localhost/api/OpenTimesAsList/{"times":' + JSON.stringify(phoneQueueStatus.value) + '}')
    .then(response => {
      let text = '';
      response.data.forEach(element => {
        text += element + '\n';
      });
      textareaValue.value = text;
      console.log(text);
    })
    .catch(() => {
      textareaValue.value = 'Some kind of error occured'
    })
  }
</script>

<template>
  <div :class="appContainer">
    <QueueDisplayed :tableToDisplay="phoneQueueStatus"></QueueDisplayed>
    <NewRuleSection @handleNewRuleClick="(value) => handleNewRuleClick(value)" @handleSubmitClick="handleSubmitClick"></NewRuleSection>
    <textarea readonly v-model="textareaValue" :class="textareaStyle"></textarea>
  </div>
</template>

<style>
  .app-container {
    display: flex;
    flex-direction: column;
    width: 100%;
  }
  .textarea-style {
    height: 150px;
    margin-top: 18px;
    padding: 14px;
  }
</style>
