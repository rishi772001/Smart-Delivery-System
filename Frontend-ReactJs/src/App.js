import './App.css';
import Template from './Components/Template';

function App() {
  var type = "Admin";
  return (
    <>
      <Template user = {type}/>
    </>
  );
}

export default App;
