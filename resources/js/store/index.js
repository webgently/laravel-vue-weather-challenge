import { createStore } from 'vuex';
import { auth } from './auth.module';
import { weather } from './weather.module.js';

const store = createStore({
  modules: {
    auth,
    weather
  }
});

export default store;
