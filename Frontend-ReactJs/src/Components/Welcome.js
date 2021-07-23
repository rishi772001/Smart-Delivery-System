import React, { useEffect, useState } from 'react';

function Welcome(props) {
    const [state, setState] = useState(0);

    var handleClick = (e) => {
        setState(state + 1);
    }

    return (
        <div>
            <p>{props.user}</p>
            <p>Welcome {state}</p>
            <button onClick={handleClick} >click</button>
        </div>
    );
}

export default Welcome;