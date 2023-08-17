import axios from 'axios';

const API_URL = 'http://localhost:8000/api/auth/';

class WeatherService {
  getWeather(weather) {
    return axios.post(API_URL + 'getWeather', weather).then((response) => {
      return response;
    });
  }
}

export default new WeatherService();
