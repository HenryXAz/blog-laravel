const imagePath = document.getElementById("image_path")
const imagePathContainer = document.getElementById("image_path_container")
const preview = document.getElementById("image_path_preview")
const previewContainer = document.getElementById("preview_container")
const removeImageButton = document.getElementById("remove-image-button")

const imageUrl = `${import.meta.env.VITE_IMAGE_POST_URL}#`

if(preview.src === imageUrl) {
  previewContainer.style.display = "none"
} else {
  previewContainer.style.display = "flex"
  imagePathContainer.style.display = "block"
}

imagePath.addEventListener("change", (e) => {
  const selectedFile = e.target.files[0]

  if (selectedFile) {
    const reader = new FileReader()

    reader.onload = (event) => {
      preview.src = event.target.result
    }

    reader.readAsDataURL(selectedFile)

    imagePathContainer.style.display = "none"
    previewContainer.style.display = "flex"
  } else {
    preview.src = imageUrl
  }
})

removeImageButton.addEventListener("click", () => removeImage())

const removeImage = () => {
  preview.src = imageUrl
  imagePathContainer.style.display = "block"
  previewContainer.style.display = "none"
}