import React, { Component } from "react";
import GoogleMapReact from "google-map-react";
import { LocationOnSharp } from "@material-ui/icons";

const AnyReactComponent = ({ text }) => <div>{text}</div>;

class SimpleMap extends Component {
  static defaultProps = {
    center: {
      lat: 13.0827,
      lng: 80.2707,
    },
    zoom: 11,
  };

  render() {
    return (
      // Important! Always set the container height explicitly
      <div style={{ height: "100vh", width: "97%" }}>
        <GoogleMapReact
          bootstrapURLKeys={{ key: "AIzaSyBDcDUoRlMQqyF3Qobuto6U14RKhRqaNRY" }}
          defaultCenter={this.props.center}
          defaultZoom={this.props.zoom}
        >
          {console.log(this.props.latlng)}
          {this.props.latlng.map((loc) => (
            <LocationOnSharp
              style={{ color: "red", marginLeft: "-15px" }}
              lat={loc.lat}
              lng={loc.lng}
            />
          ))}
        </GoogleMapReact>
      </div>
    );
  }
}

export default SimpleMap;
