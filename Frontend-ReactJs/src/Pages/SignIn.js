import { React, useState } from "react";
import Avatar from "@material-ui/core/Avatar";
import Button from "@material-ui/core/Button";
import CssBaseline from "@material-ui/core/CssBaseline";
import TextField from "@material-ui/core/TextField";
import FormControlLabel from "@material-ui/core/FormControlLabel";
import Link from "@material-ui/core/Link";
import Grid from "@material-ui/core/Grid";
import LockOutlinedIcon from "@material-ui/icons/LockOutlined";
import Typography from "@material-ui/core/Typography";
import { makeStyles } from "@material-ui/core/styles";
import Container from "@material-ui/core/Container";
import ButtonAppBar from "../Components/NavBar";
import AdminService from "../services/AdminService";
import { RadioGroup, Radio } from "@material-ui/core";
import EmployeeService from "../services/EmployeeService";
import { Redirect } from "react-router-dom";

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

export default function SignIn() {
  const classes = useStyles();

  const [state, setState] = useState({});

  var handleChange = (e) => {
    setState({ ...state, [e.target.name]: e.target.value });
  };

  var handleSubmit = (e) => {
    e.preventDefault();
    console.log(state);
    if (state.user == "admin") {
      AdminService.getAdmin(state.id).then((response) => {
        var data = response.data;
        if (data !== null && data.password == state.password) {
          // set session
          localStorage.setItem("user", data.adminId);
          localStorage.setItem("userType", "admin");
          // redirect
          window.location.replace("/admin");
        } else if (data != null) {
          alert("Invalid Password");
        } else {
          alert("Invalid Id");
        }
      });
    } else if(state.user == "employee") {
      EmployeeService.getEmployee(state.id).then((response) => {
        var data = response.data;
        if (data !== null && data.password == state.password) {
          // set session
          localStorage.setItem("user", data.empId);
          localStorage.setItem("userType", "employee");
          // redirect
          window.location.replace("/employee");
        } else if (data != null) {
          alert("Invalid Password");
        } else {
          alert("Invalid Id");
        }
      });
    }
  };

  if(localStorage.getItem("userType") == "admin")
    return <Redirect to="/admin" />
  if(localStorage.getItem("userType") == "employee")
    return <Redirect to="/employee" />  
  return (
    <>
      <ButtonAppBar />
      <Container component="main" maxWidth="xs">
        <CssBaseline />
        <div className={classes.paper}>
          <Avatar className={classes.avatar}>
            <LockOutlinedIcon />
          </Avatar>
          <Typography component="h1" variant="h5">
            Sign in
          </Typography>
          <form className={classes.form} noValidate>
            <TextField
              variant="outlined"
              margin="normal"
              required
              fullWidth
              id="id"
              label="id"
              name="id"
              autoComplete="id"
              autoFocus
              onChange={handleChange}
            />
            <TextField
              variant="outlined"
              margin="normal"
              required
              fullWidth
              name="password"
              label="Password"
              type="password"
              id="password"
              autoComplete="current-password"
              onChange={handleChange}
            />
            <RadioGroup
              row
              aria-label="user"
              name="user"
              onChange={handleChange}
            >
              <FormControlLabel
                value="employee"
                control={<Radio color="primary" />}
                label="Employee"
                labelPlacement="end"
              />

              <FormControlLabel
                value="admin"
                control={<Radio color="primary" />}
                label="Admin"
              />
            </RadioGroup>

            <Button
              type="submit"
              fullWidth
              variant="contained"
              color="primary"
              className={classes.submit}
              onClick={handleSubmit}
            >
              Sign In
            </Button>
            <Grid container>
              <Grid item xs>
                <Link href="#" variant="body2">
                  Forgot password?
                </Link>
              </Grid>
              <Grid item>
                <Link href="/signup" variant="body2">
                  {"Don't have an account? Sign Up"}
                </Link>
              </Grid>
            </Grid>
          </form>
        </div>
      </Container>
    </>
  );
}
