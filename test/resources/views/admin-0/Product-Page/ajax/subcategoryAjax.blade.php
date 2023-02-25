<script type="text/javascript">

    $(document).ready(function () {

        /*
        |--------------------------------------------------------------------------
        |--------------------------------------------------------------------------
        |
        | Fetch and show Selected SubCategory Data
        |
        |--------------------------------------------------------------------------
        |--------------------------------------------------------------------------
        */

        $(document).on('click', '.edit-subcategory-btn', function (e) {

            var slug = $(this).data('slug');
            var subcategoryURL = '/sub-category/load/'+slug;

            var SITEURL = '{{URL::to('')}}';

            // alert(subcategoryURL);

            $.ajax({
                type:'get',
                url:subcategoryURL,
                success:function(data){
                    $('#subcategoryEditModal').modal('show');

                    $('#subcategoryAjaxForm').attr("action","/sub-category/update/"+data.SLUG);
                    $('#subcategoryAjaxForm #subcategoryNameInput').val(data.SUBCATEGORY_NAME);
                    $('#subcategoryAjaxForm .update-subcategory').attr("data-slug",data.SLUG);
                    $("#select-subcategory option:first-child").attr("value",data.CATEGORY_ID);
                    $("#select-subcategory option:first-child").html(data.CATEGORY_NAME);

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        });



    });

</script>