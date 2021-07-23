import './App.css';
import Welcome from './Components/Welcome';

function App() {
  var type = "Admin";
  return (
    <>
      <Welcome user = {type}/>
    </>
  );
}

export default App;
