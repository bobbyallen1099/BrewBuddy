<template>
  <div class="font-sans">
    <div class="bg-indigo-700 text-white pt-20 pb-56">
      <div class="max-w-6xl mx-auto p-4">
        <div class="max-w-2xl">
          <div class="text-8xl">🍻</div>
          <div class="font-semibold text-4xl">BrewBuddy</div>
          <div class="text-sm">Craft beer exploration made delightful! BrewBuddy is your companion in navigating the diverse world of craft brews. Powered by Laravel, Vue.js, and the Punk API, it seamlessly blends technology and flavor for a truly immersive experience.</div>
        </div>
      </div>
    </div>
    <div class="-mt-40 max-w-6xl mx-auto p-4">
      <brews></brews>
    </div>
  </div>
</template>

<script>
import Brews from "./Brews.vue";
export default {
  name: "App",
  components: {
    Brews
  },
}
</script>