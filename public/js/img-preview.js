function imgPreview() {

    const $imageInputs = document.querySelectorAll('.image-input');

    for(const $imageInput of $imageInputs) {

        $imageInput.addEventListener('change', e => {
            const $previewImage = $imageInput.querySelector('.preview-image')
            const $selectedImage = $imageInput.querySelector('.selected-image')
            const fileReader = new FileReader()
            fileReader.onload = () => $previewImage.src = fileReader.result
            if (e.target.files.length > 0) {
                fileReader.readAsDataURL(e.target.files[0])
            } else {
                $previewImage.src = $previewImage.dataset.noimage
            }
        })
    }
}