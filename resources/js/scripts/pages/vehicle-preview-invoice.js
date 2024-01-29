function displayDocument(e) {
  let fileType = $(e.target).attr("data-fileType");
  let base64 = $(e.target).attr("data-base64");

  const blob = b64toBlob(base64, fileType);
  const url = URL.createObjectURL(blob);
  window.open(url, "_blank");
}

function b64toBlob(b64Data, contentType, sliceSize = 512) {
  const byteCharacters = atob(b64Data);
  const byteArrays = [];

  for (let offset = 0; offset < byteCharacters.length; offset += sliceSize) {
    const slice = byteCharacters.slice(offset, offset + sliceSize);

    const byteNumbers = new Array(slice.length);
    for (let i = 0; i < slice.length; i++) {
      byteNumbers[i] = slice.charCodeAt(i);
    }

    const byteArray = new Uint8Array(byteNumbers);

    byteArrays.push(byteArray);
  }

  const blob = new Blob(byteArrays, { type: contentType });
  return blob;
}
