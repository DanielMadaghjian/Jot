<template>
  <div>
         

      <label class = "italic" for="label">{{ label }}</label>
    <b-form-rating v-model="value" variant="warning" class="mb-2"></b-form-rating>
    <p class="mt-2">Current Rating: {{ value }}</p>
    <b-form-textarea
    class = "pt-3"
      id="textarea"
      v-model="text"
      placeholder="Tell us why..."
      rows="3"
      max-rows="6"
    ></b-form-textarea>

    
  </div>
</template>

<script>
  export default {
name: "Rating",

    data: function() {
      return {
        value: 3,
        text: ''
      }
    },

    props: [
            'label',
        ],
  }
</script>