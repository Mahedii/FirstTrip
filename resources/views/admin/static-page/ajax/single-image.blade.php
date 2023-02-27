<script type="text/javascript">

    $(document).ready(function () {

        $('#singleImageFile').val(null);

        // Single images preview with JavaScript
        var previewImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {

                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        var content = $($.parseHTML('<img>')).attr({src:event.target.result,width:"200px",height:"150px",class:"m-2"});
                        $(imgPreviewPlaceholder).html(content);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#singleImageFile').on('change', function() {
            previewImages(this, 'div.preview-image-before-upload');
        });

    });

</script>
