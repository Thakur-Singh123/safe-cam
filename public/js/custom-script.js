//Profile setting image start
document.getElementById("imageUpload").addEventListener("change", function (event) {
   const input = event.target;
   const reader = new FileReader();

   reader.onload = function (e) {
       document.getElementById("imagePreview").src = e.target.result;
   };

   //Check if a file is selected
   if (input.files && input.files[0]) {
       reader.readAsDataURL(input.files[0]);
   }
});
//End profile setting image

//Start image after clicking show
function previewImage(event) {
    const fileInput = event.target;
    const file = fileInput.files[0];
    const preview = document.getElementById('imagePreview');
    const dynamicImage = document.getElementById('dynamicImage');

    if (file) {
        if (dynamicImage) {
            dynamicImage.style.display = 'none';
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; 
        };
        reader.readAsDataURL(file); 
    } else {
        preview.src = '';
        preview.style.display = 'none';

        if (dynamicImage) {
            dynamicImage.style.display = 'block';
        }
    }
}
//End image after clicking show