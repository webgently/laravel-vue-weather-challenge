import axios from 'axios';

const API_URL = 'http://localhost:8000/api/auth/';

class AuthService {
  login(user) {
    return axios
      .post(API_URL + 'login', {
        email: user.email,
        password: user.password
      })
      .then((response) => {
        if (response.status === 200) {
          localStorage.setItem('token', JSON.stringify(response.data.token));
        }
        return response;
      });
  }
  logout() {
    return axios.post(API_URL + 'logout').then((response) => {
      if (response.status === 200) {
        localStorage.removeItem('token');
      }
      return response;
    });
  }
  register(user) {
    return axios
      .post(API_URL + 'register', {
        name: user.name,
        email: user.email,
        password: user.password
      })
      .then((response) => {
        return response;
      });
  }
}

export default new AuthService();
