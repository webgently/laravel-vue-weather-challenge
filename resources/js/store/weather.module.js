import WeatherService from '../services/weather.service.js';

const initialState = { status: { weather: true }, weather: null };
export const weather = {
  namespaced: true,
  state: initialState,
  actions: {
    getWeather({ commit }, weather) {
      return WeatherService.getWeather(weather).then(
        (response) => {
          commit('getWeatherSuccess', response);
          return Promise.resolve(response);
        },
        (error) => {
          commit('getWeatherFailure');
          return Promise.reject(error);
        }
      );
    }
  },
  mutations: {
    getWeatherSuccess(state, weather) {
      state.status.weather = true;
      state.weather = weather;
    },
    getWeatherFailure(state) {
      state.status.weather = false;
      state.user = null;
    }
  }
};
