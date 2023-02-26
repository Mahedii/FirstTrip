<script type="text/javascript">

    $(document).ready(function () {

        $('#tourPackageForm')[0].reset();
        $('#packageDetailsForm')[0].reset();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on("submit", "#packageDetailsForm", function(e){

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

        $('#singleImageFile').val(null);
        $('#multipleImageFile').val(null);

    });

</script>
