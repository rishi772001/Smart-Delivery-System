import React, { useState } from "react";
import Button from "@material-ui/core/Button";
import CssBaseline from "@material-ui/core/CssBaseline";
import TextField from "@material-ui/core/TextField";
import Typography from "@material-ui/core/Typography";
import { makeStyles } from "@material-ui/core/styles";
import Container from "@material-ui/core/Container";
import ParcelService from "../services/ParcelService";

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

function ParcelForm(props) {
  const classes = useStyles();

  const [state, setState] = useState({});

  var handleChange = (e) => {
    setState({ ...state, [e.target.name]: e.target.value });
  };

  var handleSubmit = (e) => {
    e.preventDefault();
    ParcelService.addParcel(state).then((response) => {
      console.log(response);
      alert(
        "Parcel Added and alloted to employee " +
          response.data.empId +
          " - " +
          response.data.name
      );
    });
  };
  return (
    <div>
      <Container component="main" maxWidth="xs">
        <CssBaseline />
        <div className={classes.paper}>
          <Typography component="h1" variant="h5">
            Add Parcel
          </Typography>
          <form className={classes.form} noValidate>
            <TextField
              variant="outlined"
              margin="normal"
              required
              fullWidth
              id="fromAddress"
              label="From Address"
              name="fromAddress"
              autoFocus
              onChange={handleChange}
            />
            <TextField
              variant="outlined"
              margin="normal"
              required
              fullWidth
              name="fromNumber"
              label="From Number"
              id="fromNumber"
              onChange={handleChange}
            />
            <TextField
              variant="outlined"
              margin="normal"
              required
              fullWidth
              id="toAddress"
              label="To Address"
              name="toAddress"
              autoFocus
              onChange={handleChange}
            />
            <TextField
              variant="outlined"
              margin="normal"
              required
              fullWidth
              name="toNumber"
              label="To Number"
              id="toNumber"
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
              Insert
            </Button>
          </form>
        </div>
      </Container>
    </div>
  );
}

export default ParcelForm;
