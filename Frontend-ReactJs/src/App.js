import "./css/App.css";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import SignIn from "./Pages/SignIn";
import SignUp from "./Pages/SignUp";
import Scanner from "./Components/Scanner";
import Admin from "./Pages/Admin";
import Employee from "./Pages/Employee";
import Employees from "./Pages/Employees";
import AddEmployee from "./Pages/AddEmployee";
function App() {
  
  return (
    <>
      <Router>
        <Switch>
          <Route exact path="/" component={SignIn} />
          <Route exact path="/signup" component={SignUp} />
          <Route exact path="/scan" component={Scanner} />
          <Route exact path="/admin" component={Admin} />
          <Route exact path="/employee" component={Employee} />
          <Route exact path="/admin/employee" component={Employees} />
          <Route exact path="/admin/addemployee" component={AddEmployee} />
        </Switch>
      </Router>
    </>
  );
}

export default App;
