import axios from "axios";
var PARCEL_API_URL = "http://localhost:8080/parcels/";
class ParcelService {

  addParcel(data) {
    var parcel = {
      fromAddress: data.fromAddress,
      toAddress: data.toAddress,
      fromPhone: data.fromPhone,
      toPhone: data.toPhone,
      status: "pending",
    };
    return axios.post(PARCEL_API_URL, parcel, {
      headers: {
        "content-type": "application/json",
      },
    });
  }
}

export default new ParcelService();
