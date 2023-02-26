<script type="text/javascript">

    $(document).ready(function () {

        $('#multipleImageFile').val(null);


        $('#multipleImageFile').on('change', function() {
            previewMultipleImages(this, 'div.images-preview-div');
            $(".multipleImageResetBtn").show();
        });

        $(".multipleImageResetBtn").on('click', function() {
            $('#multipleImageFile').val(null);
            $('div.images-preview-div').empty();
            $(".multipleImageResetBtn").hide();
        });

        $(document).on("click", ".package-image-delete-btn", function(){

            var id = $(this).data('id');
            var url = '/tour-package/delete/image/'+id;

            $.ajax({
                type:'get',
                url:url,
                success:function(data){
                    $(".package-image-"+id).remove();
                    swal.fire({
                        title:"Success!",
                        html:"Image successfully deleted",
                        icon:"success",
                        button:"Aww yiss!"
                    });

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        });


    });

</script>
