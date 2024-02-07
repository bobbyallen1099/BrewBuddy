# 🍻 BrewBuddy 🍻
Craft beer exploration made delightful! BrewBuddy is your companion in navigating the diverse world of craft brews. Powered by Laravel, Vue.js, and the Punk API, it seamlessly blends technology and flavor for a truly immersive experience.
## 🍻 Features
- Intuitive search for discovering unique craft beers.
- Detailed information on flavors, pairings, and more.
- Crafted with Laravel, Vue.js, and Punk API.
🌐 Explore the world of craft beers with BrewBuddy! 🍺

# 🍻 How to get it up & running
Start off by pulling the code, you'll need to run the following
- 🍺 `composer install`
- 🍺 `npm run dev`
- 🍺 Setup Sail MySQL DB - `./vendor/bin/sail up`
Head over to `localhost` with no ports!

## How to run Unit Test
- `./vendor/bin/sail test`
- It will test if the `PunkAPIService` fetches from the API and also if `PunkAPIManager` will create the correct 325 rows.