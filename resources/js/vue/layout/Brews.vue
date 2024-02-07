<template>
  <div>
    <template v-if="loading">
      Loading
    </template>
    <template v-else>
      <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          <svg class="w-4 h-4 text-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
        </div>
        <input v-model="search" class="block w-full p-4 ps-10 text-sm text-indigo-900 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Brew Names" required>
        <button @click="onSearch" class="text-white absolute end-2.5 bottom-2.5 bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
        <button v-if="search" @click="onClear" class="text-gray-700 absolute end-24 bottom-2.5 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 hidden sm:block">Clear</button>
      </div>

      <template v-if="this.brews">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
          <div v-for="brew in brews" :key="brew.id" class="p-4 transition-shadow rounded-lg bg-white shadow hover:shadow-lg border flex flex-col items-center cursor-pointer" @click="onBrew(brew.id)">
            <img :src=brew.image_url class="max-w-24 max-h-56 mb-2"/>
            <div class="flex flex-col mt-auto text-center">
              <span class="font-semibold text-indigo-800 text-lg">{{ brew.name }}</span>
              <span class="text-gray-600">{{ brew.tagline }}</span>
            </div>
          </div>
        </div>
        <div class="flex items-center justify-between bg-gray-800 rounded border shadow-lg py-5 px-4 mt-5">
          <span class="text-3xl text-gray-300 font-semibold flex items-center"><span class="text-5xl">🍻</span> Why not try another page of brews?</span>
          <div class="flex items-center justify-center">
            <div class="px-4 py-2 mx-1 bg-gray-100 border border-gray-500 text-gray-700 rounded-lg" @click="onBack" v-if="this.page !== 1">Back</div>
            <div class="px-4 py-2 mx-1 bg-gray-100 border border-gray-500 text-gray-700 rounded-lg" @click="onNext" v-if="this.brews.length === 20">Next</div>
          </div>
        </div>
      </template>

      <template v-else>
        <div class="p-4 bg-white rounded mt-4">
          No brews found
        </div>
      </template>
    </template>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: "Brews",
  data: function() {
    return {
      loading: true,
      page: 1,
      brews: null,
      search: null,
      total: 325,
    }
  },
  methods: {
    fetchBrews(){
      this.loading = true;
      axios.post('/api/brews', {
        search: this.search,
        page: this.page
      }).then(response => {
        this.brews = JSON.parse(response.data.brews ?? '') ?? null;
        this.total = response.data.total ?? 325;
        this.loading = false;
        console.log(this.brews.length )
      })
    },
    onSearch() {
      this.page = 1;
      this.fetchBrews();
    },
    onClear() {
      this.search = '';
      this.onSearch();
    },
    onBack() {
      this.page = this.page > 1 ? this.page - 1 : this.page;
      this.fetchBrews();
    },
    onNext() {
      this.page++;
      this.fetchBrews();
    },
    onBrew(id) {
      window.location.href = '/brew/'+id;
    }

  },
  mounted() {
    this.fetchBrews();
  }
}
</script>