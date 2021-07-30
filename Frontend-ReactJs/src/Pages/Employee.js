import React from "react";
import { Redirect } from "react-router-dom";
import ButtonAppBar from "../Components/NavBar";

function Employee(props) {
  if (localStorage.getItem("userType") !== "employee") return <Redirect to="/" />;
  return (
    <div>
      <ButtonAppBar />
    </div>
  );
}

export default Employee;
