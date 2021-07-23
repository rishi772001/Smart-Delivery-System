import React, { useEffect, useState } from "react";
import { Button } from "react-bootstrap";

function Welcome(props) {
  const [state, setState] = useState(0);

  var handleClick = (e) => {
    setState(state + 1);
  };

  return (
    <div>
      <div>
        <p>{props.user}</p>
      </div>
      <div>
        <p>Welcome {state}</p>
      </div>
      <div>
        <Button variant="success" onClick={handleClick}>
          click
        </Button>
      </div>
      {/* for responsive */}
      <div className="container">
      <div className="row">
        <div className="col-md-4">
          <div className="row">
            <div className="col-md-3">
              <p>
                jhgdfuydg
                
              </p>
            </div>
            <div className="col-md-3">
              <p>
                jhgdfuydg
                
              </p>
            </div>
            <div className="col-md-3">
              <p>
                jhgdfuydg
                
              </p>
            </div>
            <div className="col-md-3">
              <p>
                jhgdfuydg
                
              </p>
            </div>
          </div>
        </div>
        <div className="col-sm-4">
          <p>
            jhgdfuydgygyfgs
            
          </p>
        </div>
        <div className="col-sm-4">
          <p>
            jhgdfuydgygyfgs
            
          </p>
        </div>
      </div>
      </div>
    </div>
  );
}

export default Welcome;
