<script type="text/javascript">

    $(document).ready(function () {
        


        /*
        |--------------------------------------------------------------------------
        |--------------------------------------------------------------------------
        |
        | Fetch and show Selected Category Data
        |
        |--------------------------------------------------------------------------
        |--------------------------------------------------------------------------
        */

        $(document).on('click', '.edit-category-btn', function (e) {

            var slug = $(this).data('slug');
            var categoryURL = '/category/load/'+slug;

            var SITEURL = '{{URL::to('')}}';

            // alert(slug);

            $.ajax({
                type:'get',
                url:categoryURL,
                success:function(data){
                    $('#categoryEditModal').modal('show');

                    $('#categoryAjaxForm #categoryNameInput').val(data.CATEGORY_NAME);
                    $('#categoryAjaxForm .update-category').attr("data-slug",data.SLUG);

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        });


        /*
        |--------------------------------------------------------------------------
        |--------------------------------------------------------------------------
        |
        | Update Category Data
        |
        |--------------------------------------------------------------------------
        |--------------------------------------------------------------------------
        */

        $(document).on('click', '#categoryEditModal .update-category', function (e) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            e.preventDefault();

            var slug = $(this).data('slug');
            var updateUrl = "/category/update/"+slug;
            var dataString = $('#categoryAjaxForm').serialize();

            // alert(updateUrl);

            $.ajax({
                type:'POST',
                url:updateUrl,
                data:dataString,
                dataType:'json', 
                encode:true,
                success:function(data){
                    // alert("Success");
                    // alert(data.success);
                    $('#categoryAjaxForm')[0].reset();
                    $('#categoryEditModal').modal('hide');
                    swal.fire({
                        title:"Success!",
                        text:"You have upadted the info!",
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