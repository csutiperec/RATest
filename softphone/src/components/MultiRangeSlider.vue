<script>
    import Slider from '@vueform/slider'

    export default {
        components: { Slider },
        data: () => ({
            value: [0, 24],
            prevState: [0, 24]
        }),
        methods: {
            onUpdate(e) {
                if(e[0]==e[1]){
                    if(this.prevState[0]==e[0]) {
                        e[1]++;
                    }
                    else {
                        e[0]--;
                    }
                }
                this.prevState = e;
                this.$emit('onUpdate', this.value);
            }
        },
        emits: ['onUpdate'],
        
    }
</script>

<template>
    <div>
      <Slider @update="onUpdate" :min="0" :max="24" :lazy="false" v-model="value" />
    </div>
</template>

<style src="@vueform/slider/themes/default.css"></style>