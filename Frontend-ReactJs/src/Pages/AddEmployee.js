import { React, useState } from "react";
import Avatar from "@material-ui/core/Avatar";
import Button from "@material-ui/core/Button";
import CssBaseline from "@material-ui/core/CssBaseline";
import TextField from "@material-ui/core/TextField";
import FormControlLabel from "@material-ui/core/FormControlLabel";
import Checkbox from "@material-ui/core/Checkbox";
import Link from "@material-ui/core/Link";
import Grid from "@material-ui/core/Grid";
import Box from "@material-ui/core/Box";
import LockOutlinedIcon from "@material-ui/icons/LockOutlined";
import Typography from "@material-ui/core/Typography";
import { makeStyles } from "@material-ui/core/styles";
import Container from "@material-ui/core/Container";
import ButtonAppBar from "../Components/NavBar";
import AdminService from "../services/AdminService";
import EmployeeService from "../services/EmployeeService";

const useStyles = makeStyles((theme) => ({
  paper: {
    marginTop: theme.spacing(8),
    display: "flex",
    flexDirection: "column",
    alignItems: "center",
  },
  avatar: {
    margin: theme.spacing(1),
    backgroundColor: theme.palette.secondary.main,
  },
  form: {
    width: "100%", // Fix IE 11 issue.
    marginTop: theme.spacing(1),
  },
  submit: {
    margin: theme.spacing(3, 0, 2),
  },
}));

export default function AddEmployee() {
  const classes = useStyles();

  const [state, setState] = useState({});

  var handleChange = (e) => {
    setState({ ...state, [e.target.name]: e.target.value });
  };

  var handleSubmit = (e) => {
    e.preventDefault();
    console.log(state);
    if (
      state.name === "" ||
      state.password === "" ||
      state.password === ""
    ) {
      alert("please fill all required data");
    } else if (state.password !== state.reenterpassword) {
      alert("password does not match");
    } else {
      EmployeeService.addEmployee(state).then((response) => {
        alert("Sucess!! Your Id is " + response.data.empId);
        window.location.replace("/");
      });
    }
  };
  return (
    <>
      <ButtonAppBar />
      <Container component="main" maxWidth="xs">
        <CssBaseline />
        <div className={classes.paper}>
        
          <Typography component="h1" variant="h5">
            Add Employee
          </Typography>
          <form className={classes.form}>
            <TextField
              variant="outlined"
              margin="normal"
              required
              fullWidth
              id="name"
              label="Name"
              name="name"
              autoComplete="name"
              onChange={handleChange}
              autoFocus
            />
            <TextField
              variant="outlined"
              margin="normal"
              required
              fullWidth
              id="area"
              label="Area"
              name="area"
              autoComplete="area"
              onChange={handleChange}
              autoFocus
            />
            <TextField
              variant="outlined"
              margin="normal"
              required
              fullWidth
              name="password"
              label="Enter Password"
              type="password"
              id="password"
              autoComplete="current-password"
              onChange={handleChange}
            />
            <TextField
              variant="outlined"
              margin="normal"
              required
              fullWidth
              name="reenterpassword"
              label="Re Enter Password"
              type="password"
              id="reenterpassword"
              autoComplete="current-password"
              onChange={handleChange}
            />

            <Button
              type="submit"
              fullWidth
              variant="contained"
              color="primary"
              className={classes.submit}
              onClick={handleSubmit}
            >
              Add
            </Button>
            
          </form>
        </div>
      </Container>
    </>
  );
}
