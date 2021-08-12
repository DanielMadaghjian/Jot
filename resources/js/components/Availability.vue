<template>
  <div>
      
    <b-form-group  label="Availability" class="text-blue-500 pt-2 uppercase text-xs font-bold static " v-slot="{ ariaDescribedby }">
        
      <b-form-checkbox-group 
        class = "text-gray-450  capitalize text-xs"
        v-model="selected"
        :options="options"
        :aria-describedby="ariaDescribedby"
        plain
        stacked
      ></b-form-checkbox-group>
    </b-form-group>
  </div>
</template>

<script>
  export default {
    name: "Availability",

    data: function() {
      return {
        selected: [], // Must be an array reference!
        options: [
          { text: 'Monday', value: 'Monday' },
          { text: 'Tuesday', value: 'Tuesday' },
          { text: 'Wednesday', value: 'Wednesday' },
          { text: 'Thursday', value: 'Thursday' },
          { text: 'Friday', value: 'Friday' },
          { text: 'Saturday', value: 'Saturday' },
          { text: 'Sunday', value: 'Sunday' },
        ]
      }
    }
  }
</script>