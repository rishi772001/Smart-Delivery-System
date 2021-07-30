import axios from "axios";
var ADMIN_API_URL = "http://localhost:8080/admins/";
class AdminService {
  getAdmin(id) {
    return axios.get(ADMIN_API_URL + id);
  }

  addAdmin(data) {
    var admin = {
      name: data.name,
      password: data.password,
    };
    return axios.post(ADMIN_API_URL, admin, {
      headers: {
        'Access-Control-Allow-Origin':'*',
        "content-type": "application/json",
      },
    });
  }
}

export default new AdminService();
