const imageInput = document.getElementById('userFoto');
const imagePreview = document.getElementById('imagePreview');

imageInput.addEventListener('change', function() {
  const file = this.files[0]; // Get the selected file

  if (file) {
    const reader = new FileReader(); // Create a FileReader object

    // Define what happens once the file is completely read
    reader.onload = function(e) {
      imagePreview.src = e.target.result; // Set src to the image data
      imagePreview.style.display = 'block'; // Make the image visible
    }

    reader.readAsDataURL(file); // Read the file as a base64 URL
  } else {
    // Reset preview if no file is chosen
    imagePreview.src = '';
    imagePreview.style.display = 'none';
  }
});
