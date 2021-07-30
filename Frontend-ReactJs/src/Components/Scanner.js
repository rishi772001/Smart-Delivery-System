import React, { useEffect, useState } from "react";
import Camera from "react-html5-camera-photo";
import "react-html5-camera-photo/build/css/index.css";
import Tesseract from "tesseract.js"
import ImagePreview from "./ImagePreview"; // source code : ./src/demo/AppWithImagePreview/ImagePreview

function Scanner(props) {
  const [dataUri, setDataUri] = useState("");

  function handleTakePhotoAnimationDone(dataUri) {
    setDataUri(dataUri);
  }

  var generateText = () => {
      dataUri && Tesseract.recognize(dataUri, {
        lang: "eng",
      })
        .catch((err) => {
          console.error(err);
        })
        .then((result) => {
          // Get Confidence score
        //   let confidence = result.confidence;

        //   // Get full output
        //   let text = result.text;

        //   // Get codes
        //   let pattern = /\b\w{10,10}\b/g;
        //   let patterns = result.text.match(pattern);

        //   // Update state
        //   this.setState({
        //     patterns: this.state.patterns.concat(patterns),
        //     documents: this.state.documents.concat({
        //       pattern: patterns,
        //       text: text,
        //       confidence: confidence,
        //     }),
        //   });

        console.log(result);
        });
    
  };

  useEffect(() => {
    generateText();
  }, [dataUri])

  const isFullscreen = false;
  return (
    <div>
      {dataUri ? (
        <ImagePreview dataUri={dataUri} isFullscreen={isFullscreen} />
      ) : (
        <Camera
          onTakePhotoAnimationDone={handleTakePhotoAnimationDone}
          isFullscreen={isFullscreen}
          isImageMirror={false}
        />
      )}
    </div>
  );
}

export default Scanner;
