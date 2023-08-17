import axios from 'axios';

const API_URL = 'http://localhost:8000/api/auth/';

class AuthService {
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
