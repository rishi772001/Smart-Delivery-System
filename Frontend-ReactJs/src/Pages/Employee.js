import React, { useEffect, useState } from "react";
import { Redirect } from "react-router-dom";
import ButtonAppBar from "../Components/NavBar";
import Map from "../Components/Map";
import ParcelService from "../services/ParcelService";
import { Button } from "react-bootstrap";
function Employee(props) {
  const [path, setPath] = useState([]);
  const [latlng, setLatlng] = useState([]);
  const [show, setShow] = useState(false);

  var getLatLng = async () => {
    for (let i = 0; i < path.length - 1; i++) {
      
      var url = `https://maps.googleapis.com/maps/api/geocode/json?address=${path[i][1].toAddress}&key=AIzaSyBDcDUoRlMQqyF3Qobuto6U14RKhRqaNRY`;
      fetch(url).then((response) => {
        response.json().then((data) => {
          setShow(false);
          var temp = latlng;
          console.log(data);
          temp.push(data.results[0].geometry.location);
          setLatlng(temp);
          if (latlng.length > 0) setShow(true);
        });
      });
    }
  };

  var getPath = () => {
    ParcelService.getPath(localStorage.getItem("user")).then((response) => {
      var data = response.data;
      var shortestPath = [];
      for (let i = 0; i < data.length - 1; i++) {
        shortestPath.push([data[i], data[i + 1]]);
      }
      setPath(shortestPath);
    });
  };
  useEffect(() => {
    getPath();
  }, []);

  useEffect(() => {
    getLatLng();
  }, [path]);

  var updateStatus = (parcel, index) => {
    // update state
    var updated = [...path];
    updated[index][1].status = "delivered";
    setPath(updated);
    // update database
    ParcelService.updateStatus(parcel.parcelId).then((response) => {
      if (response.data !== null) {
        alert("Thank You for your delivery!!");
      } else alert("No such parcel");
    });
  };

  if (localStorage.getItem("userType") !== "employee")
    return <Redirect to="/" />;
  return (
    <>
      <ButtonAppBar />
      <div className="container" style={{ margin: "40px" }}>
        <div className="map-container">
          {/* {console.log("latlng", latlng)} */}
          {console.log(show)}
          {show ? <Map latlng={latlng} /> : <span></span>}
        </div>
        <br />
        <br />
        <h2>Shortest Path</h2>

        <hr />
        <ol>
          {path.map((parcel, index) => (
            <li>
              {parcel[0].toAddress} ----{">"} {parcel[1].toAddress}
              {parcel[1].status === "pending" && (
                <Button
                  className="path-btn"
                  size="sm"
                  variant="success"
                  onClick={() => updateStatus(parcel[1], index)}
                >
                  Delivered
                </Button>
              )}
              <a
                href={`https://www.google.com/maps/dir/?api=1&origin=${parcel[0].toAddress}&destination=${parcel[1].toAddress}&travelmode=driving`}
              >
                <Button className="path-btn" size="sm" variant="primary">
                  Directions
                </Button>
              </a>
              <br />
              <br />
            </li>
          ))}
        </ol>
      </div>
    </>
  );
}

export default Employee;
