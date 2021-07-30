import "./css/App.css";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import SignIn from "./Pages/SignIn";
import SignUp from "./Pages/SignUp";
import Scanner from "./Components/Scanner";
import Admin from "./Pages/Admin";
function App() {
  var type = "Admin";
  return (
    <>
      <Router>
        <Switch>
          <Route exact path="/" component={SignIn} />
          <Route exact path="/signup" component={SignUp} />
          <Route exact path="/scan" component={Scanner} />
          <Route exact path="/admin" component={Admin} />
        </Switch>
      </Router>
    </>
  );
}

export default App;
