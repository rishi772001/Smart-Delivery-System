import axios from "axios";
var EMPLOYEE_API_URL = "http://localhost:8080/employees/";
class EmployeeService {
  getEmployee(id) {
    return axios.get(EMPLOYEE_API_URL + id);
  }

  getAllEmployee(){
    return axios.get(EMPLOYEE_API_URL);
  }

  addEmployee(data) {
    var employee = {
      name: data.name,
      area: data.area,
      password: data.password,
    };
    return axios.post(EMPLOYEE_API_URL, employee, {
      headers: {
        "content-type": "application/json",
      },
    });
  }

  deleteEmployee(data){
    return axios.delete(EMPLOYEE_API_URL + data.empId);
  }
}

export default new EmployeeService();
