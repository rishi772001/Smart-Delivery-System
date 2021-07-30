import axios from "axios";
var ADMIN_API_URL = "localhost:8080/admins/";
class AdminService {
  getAdmin(data) {
    return axios.get(ADMIN_API_URL + customerID);
  }
}
