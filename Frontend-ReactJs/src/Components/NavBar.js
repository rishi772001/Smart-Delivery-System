import React from "react";
import { makeStyles } from "@material-ui/core/styles";
import AppBar from "@material-ui/core/AppBar";
import Toolbar from "@material-ui/core/Toolbar";
import Typography from "@material-ui/core/Typography";
import Button from "@material-ui/core/Button";
import IconButton from "@material-ui/core/IconButton";
import MenuIcon from "@material-ui/icons/Menu";

const useStyles = makeStyles((theme) => ({
  root: {
    flexGrow: 1,
  },
  menuButton: {
    marginRight: theme.spacing(2),
  },
  title: {
    flexGrow: 1,
  },
}));

export default function ButtonAppBar() {
  const classes = useStyles();
  var user = localStorage.getItem("user");
  var userType = localStorage.getItem("userType");

  var logout = () => {
    if (window.confirm("Are you sure to log out?")) {
      localStorage.clear();
    }
  };
  return (
    <div className={classes.root}>
      <AppBar position="static">
        <Toolbar>
          <Typography variant="h6" className={classes.title}>
            Smart Delivery System
          </Typography>
          {userType === "admin" && (
            <a href="/admin" className="navbar-a">
              <Button color="inherit">Home</Button>
            </a>
          )}
          {userType === "admin" && (
            <a href="/admin/employee/" className="navbar-a">
              <Button color="inherit">Employees</Button>
            </a>
          )}
          {userType === "employee" && (
            <a href="/employee" className="navbar-a">
              <Button color="inherit">Home</Button>
            </a>
          )}
          {(user === null || user === undefined) && (
            <a href="/" className="navbar-a">
              <Button color="inherit">Sign In</Button>
            </a>
          )}

          <a href="/signup" className="navbar-a">
            <Button color="inherit">Sign Up</Button>
          </a>

          {user !== null && user !== undefined && (
            <a href="" className="navbar-a">
              <Button color="inherit" onClick={logout}>
                Log Out
              </Button>
            </a>
          )}
        </Toolbar>
      </AppBar>
    </div>
  );
}
