import {
    Button,
  Container,
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableRow,
} from "@material-ui/core";
import {Button as Btn } from "react-bootstrap";
import React, { useEffect, useState } from "react";
import ButtonAppBar from "../Components/NavBar";
import EmployeeService from "../services/EmployeeService";

function Employees(props) {
  const [state, setState] = useState([]);

  useEffect(() => {
    EmployeeService.getAllEmployee().then((response) => {
      var data = response.data;
      setState(data);
    });
  }, []);

  var handleDelete = (employee) => {
    EmployeeService.deleteEmployee(employee).then(() => window.location.reload());
  }

  return (
    <div>
      <ButtonAppBar />

      <Container style={{ margin: "20px 30px 20px 30px" }}>
        <a href="/admin/addemployee/" className="btn-right">
          <Button variant="contained" color="primary">Add Employee</Button>
        </a>
        <h3>Employees</h3>
        <Table>
          <TableHead>
            <TableRow>
              <TableCell>Id</TableCell>
              <TableCell>Name</TableCell>
              <TableCell>Area</TableCell>
            </TableRow>
          </TableHead>
          <TableBody>
            {state.map((employee) => (
              <TableRow>
                <TableCell>{employee.empId}</TableCell>
                <TableCell>{employee.name}</TableCell>
                <TableCell>{employee.area}</TableCell>
                <TableCell><Btn variant="danger" onClick={() => {handleDelete(employee)}}>Delete</Btn></TableCell>
              </TableRow>
            ))}
          </TableBody>
        </Table>
      </Container>
    </div>
  );
}

export default Employees;
