import { React } from "react";
import ButtonAppBar from "../Components/NavBar";
import { Redirect } from "react-router-dom";
import ParcelForm from "../Components/ParcelForm";
import { Grid } from "@material-ui/core";
import Scanner from "../Components/Scanner";
export default function Admin() {
  if (localStorage.getItem("userType") !== "admin") return <Redirect to="/" />;

  return (
    <>
      <ButtonAppBar />
      <Grid container>
        <Grid item lg="5">
          <ParcelForm />
        </Grid>
        <Grid item lg="2">
          <h4 className="text-center" style={{marginTop: "45vh"}}>Or</h4>
        </Grid>
        <Grid item lg="5">
          <div className="cam-container">
            <Scanner />
          </div>
        </Grid>
      </Grid>
    </>
  );
}
