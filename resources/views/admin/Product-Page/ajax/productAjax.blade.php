<script type="text/javascript">

    $(document).ready(function () {


        function showSubcategoryData(data){

            $.each(data, function( index, value ) {

                var row = $("<option value='" + value.SUBCATEGORY_ID + "'>" + value.SUBCATEGORY_NAME + "</option>");

                $("#select-subcategory").append(row);
            });
        }


        $('#select-category').on('change', function() {

            var CategoryId = $('#select-category option:selected').val();
            var subcategoryURL = '/product/get-subcategory/'+CategoryId;
            // alert("Selected Category ID: "+CategoryId);
            
            $.ajax({
                type:'get',
                url:subcategoryURL,
                success:function(data){
                    // alert("Success");
                    $("#select-subcategory").html("");
                    showSubcategoryData(data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        
        });



        // Single images preview with JavaScript
        var previewImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        var content = $($.parseHTML('<img>')).attr({src:event.target.result,width:"150px",height:"150px"});
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