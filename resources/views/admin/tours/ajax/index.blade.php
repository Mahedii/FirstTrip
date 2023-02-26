<script type="text/javascript">

    $(document).ready(function () {

        $('#tourPackageForm')[0].reset();
        $('#packageDetailsForm')[0].reset();

        var inc_counter=0;
        $('#add-included-item').click(function(){
            inc_counter++;
            var counter = parseInt($("#included-counter").val())+1;
            $("#included-counter").val(counter);
            $('#included_dynamic_field').append(
                '<div class="row" id="included-row-'+inc_counter+'">'+
                    '<div class="col-md-8">'+
                        '<div class="mb-3">'+
                            '<label for="INCLUDED_SERVICE" class="form-label">Included Service</label>'+
                            '<input type="text" class="form-control" name="INCLUDED_SERVICE[]">'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-md-3">'+
                        '<div class="text-end mt-4">'+
                            '<button type="button" name="remove" id="'+inc_counter+'" class="btn btn-danger included_btn_remove w-sm">Delete</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );
        });

        var exc_counter=0;
        $('#add-excluded-item').click(function(){
            exc_counter++;
            var counter = parseInt($("#excluded-counter").val())+1;
            $("#excluded-counter").val(counter);
            $('#excluded_dynamic_field').append(
                '<div class="row" id="excluded-row-'+exc_counter+'">'+
                    '<div class="col-md-8">'+
                        '<div class="mb-3">'+
                            '<label for="EXCLUDED_SERVICE" class="form-label">Excluded Service</label>'+
                            '<input type="text" class="form-control" name="EXCLUDED_SERVICE[]">'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-md-3">'+
                        '<div class="text-end mt-4">'+
                            '<button type="button" name="remove" id="'+exc_counter+'" class="btn btn-danger excluded_btn_remove w-sm">Delete</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );
        });


        var tour_plan_counter=0;
        $('#add-tour-plan-item').click(function(){
            tour_plan_counter++;
            var counter = parseInt($("#tour-plan-counter").val())+1;
            $("#tour-plan-counter").val(counter);
            $('#tour_plan_dynamic_field').append(
                '<div class="card" id="tour-plan-row-'+tour_plan_counter+'">'+
                    '<div class="card-header align-items-center d-flex">'+
                        '<h4 class="card-title mb-0 flex-grow-1">Tour Plan #'+tour_plan_counter+'</h4>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<div class="row mb-3">'+
                            '<div class="col-md-6">'+
                                '<div class="mb-3">'+
                                    '<label for="TOUR_PLAN_TITLE_TEXT" class="form-label">Tour Plan Title Text</label>'+
                                    '<input type="text" class="form-control" name="TOUR_PLAN_TITLE_TEXT[]">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-12">'+
                                '<div class="mb-3">'+
                                    '<label for="TOUR_PLAN_TITLE_BODY" class="form-label">Tour Plan Title Body</label>'+
                                    '<textarea class="form-control" name="TOUR_PLAN_TITLE_BODY[]" rows="3"></textarea>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="text-end mb-3">'+
                            '<button type="button" name="remove" id="'+tour_plan_counter+'" class="btn btn-danger tour_plan_btn_remove w-sm">Delete</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );
        });


        $(document).on('click', '.included_btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#included-row-'+button_id+'').remove();

            var counter = $("#included-counter").val() - 1;
            $("#included-counter").val(counter);
        });

        $(document).on('click', '.excluded_btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#excluded-row-'+button_id+'').remove();

            var counter = $("#excluded-counter").val() - 1;
            $("#excluded-counter").val(counter);
        });

        $(document).on('click', '.tour_plan_btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#tour-plan-row-'+button_id+'').remove();

            var counter = $("#tour-plan-counter").val() - 1;
            $("#tour-plan-counter").val(counter);
        });


        // $(document).on('click', '.edit-included-item', function(e){

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     e.preventDefault();

        //     var id = $(this).data('id');
        //     var isv = $("#INCLUDED_SERVICE-"+id).val();

        //     var dataString = $('#incServiceForm-'id).serialize();

        //     $.ajax({
        //         type:'POST',
        //         url:"{{ route('incServiceUpdate') }}",
        //         dataType: 'json',
        //         data:dataString,
        //         success:function(data){
        //             swal.fire({
        //                 title:"Success!",
        //                 html:"Included service "+isv+" updated successfully.",
        //                 icon:"success",
        //                 button:"Aww yiss!"
        //             });

        //         },
        //         error: function (xhr, ajaxOptions, thrownError) {
        //             alert(xhr.status);
        //             alert(thrownError);
        //         }
        //     });

        // });



        // $(document).on('click', '.edit-excluded-item', function(){

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     var id = $(this).data('id');
        //     var esv = $("#EXCLUDED_SERVICE-"+id).val();
        //     // alert(esv);
        //     var url = '/tour-package/details/exc_service/update';

        //     $.ajax({
        //         type:'GET',
        //         url:url,
        //         data:{id : id,EXCLUDED_SERVICE: esv},
        //         success:function(data){
        //             swal.fire({
        //                 title:"Success!",
        //                 html:"Excluded service "+esv+" updated successfully.",
        //                 icon:"success",
        //                 button:"Aww yiss!"
        //             });

        //         },
        //         error: function (xhr, ajaxOptions, thrownError) {
        //             alert(xhr.status);
        //             alert(thrownError);
        //         }
        //     });

        // });


        $(document).on("click", ".delete-excluded-item", function(){

            var id = $(this).data('id');
            var url = '/tour-package/delete/excluded-service/'+id;
            alert(url);
            $.ajax({
                type:'get',
                url:url,
                success:function(data){
                    $(".excServiceForm-"+id).remove();
                    swal.fire({
                        title:"Success!",
                        html:"Delected excluded service successfully deleted",
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


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $("body").on("submit", "#packageDetailsForm", function(e){

            e.preventDefault();

            var form = $('#packageDetailsForm')[0];
            let formData = new FormData(form);

            const totalImages = $("#multipleImageFile")[0].files.length;
            let images = $("#multipleImageFile")[0];

            for (let i = 0; i < totalImages; i++) {
                formData.append('multipleImageFile' + i, images.files[i]);
            }
            formData.append('totalImages', totalImages);

            // console.log(formData);

            $.ajax({
                url: "{{ route('tour.package.details.insert') }}",
                type: 'POST',
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {

                    var err_msg = "";
                    jQuery.each(data.errors, function(key, value){
                        // jQuery('.alert-danger').show();
                        // jQuery('.alert-danger').append('<p>'+value+'</p>');
                        err_msg = err_msg+'<p style="color:red;"><b>'+value+'</b></p>';
                    });

                    if(err_msg !=""){
                        swal.fire({
                            title:"Error!",
                            html:err_msg,
                            icon:"error",
                            button:"Aww yiss!"
                        });
                    }else{
                        swal.fire({
                            title:"Success!",
                            html:data.success,
                            icon:"success",
                            button:"Aww yiss!"
                        });

                        $('#packageDetailsForm')[0].reset();
                        $('div.images-preview-div').empty();

                        // $('#packageDetailsForm').trigger("reset");
                        // $("#packageDetailsForm").find('input:text, input:password, input:file, select, textarea').val(null);
                        // $("#packageDetailsForm").find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');

                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        });


        // $(".package-details-add-btn").click(function(e){

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     e.preventDefault();
        //     var dataString = $('#packageDetailsForm').serialize();

        //     alert(dataString);

        //     $.ajax({
        //         type:'POST',
        //         url:"{{ route('tour.package.details.insert') }}",
        //         dataType: 'json',
        //         data:dataString,
        //         success:function(data){

        //             var err_msg = "";

        //             jQuery.each(data.errors, function(key, value){
        //                 // jQuery('.alert-danger').show();
        //                 // jQuery('.alert-danger').append('<p>'+value+'</p>');
        //                 err_msg = err_msg+'<p style="color:red;"><b>'+value+'</b></p>';
        //             });

        //             if(err_msg !=""){

        //                 swal.fire({
        //                     title:"Error!",
        //                     html:err_msg,
        //                     icon:"error",
        //                     button:"Aww yiss!"
        //                 });

        //             }
        //             else{

        //                 swal.fire({
        //                     title:"Success!",
        //                     html:data.success,
        //                     icon:"success",
        //                     button:"Aww yiss!"
        //                 });

        //                 $("#packageDetailsForm")[0].reset();

        //             }

        //         },
        //         error: function (xhr, ajaxOptions, thrownError) {
        //             alert(xhr.status);
        //             alert(thrownError);
        //         }
        //     });

        // });

        $('#singleImageFile').val(null);
        $('#multipleImageFile').val(null);

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


        // Multiple images preview with JavaScript
        var previewMultipleImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {

                        $($.parseHTML('<img>')).attr({src:event.target.result,width:"190px",height:"150px",class:"m-2"}).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

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
