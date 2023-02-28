<script type="text/javascript">

    $(document).ready(function () {


        var hero_section_counter=1;
        $('#add-hero-section-item').click(function(){
            ++hero_section_counter;
            var counter = parseInt($("#hero-section-counter").val())+1;
            $("#hero-section-counter").val(counter);
            $('#hero_section_dynamic_field').append(
                '<div class="card" id="hero-section-row-'+hero_section_counter+'">'+
                    '<div class="card-header align-items-center d-flex">'+
                        '<h4 class="card-title mb-0 flex-grow-1">#'+hero_section_counter+'</h4>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<div class="row mb-3">'+
                            '<div class="col-md-12">'+
                                '<div class="mb-3">'+
                                    '<label for="hero_image" class="form-label">Hero Image (1894*694)</label>'+
                                    '<p class="text-muted">Add hero section slider image.</p>'+
                                    '<input type="file" class="form-control" data-id="'+hero_section_counter+'" class="hero_image" name="hero_image[]">'+
                                '</div>'+
                                '<div class="preview-hero-image-before-upload-'+hero_section_counter+' mb-3"></div>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<div class="mb-3">'+
                                    '<label for="TITLE" class="form-label">Title<span class="text-danger">*</span></label>'+
                                    '<input type="text" class="form-control"  name="TITLE[]">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<div class="mb-3">'+
                                    '<label for="SUBTITLE" class="form-label">Sub Title<span class="text-danger">*</span></label>'+
                                    '<input type="text" class="form-control" name="SUBTITLE[]">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="text-end mb-3">'+
                            '<button type="button" name="remove" id="'+hero_section_counter+'" class="btn btn-danger tour_plan_btn_remove w-sm">Delete</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="text-end mb-5">'+
                    '<button class="btn btn-success w-sm" id="add-hero-section-item-'+hero_section_counter+'">Update</button>'+
                '</div>'
            );
            var temp_id = hero_section_counter-1;
            $("#add-hero-section-item-"+temp_id).remove();


        });


        $(document).on('click', '.tour_plan_btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#hero-section-row-'+button_id+'').remove();

            var counter = $("#hero-section-counter").val() - 1;
            $("#hero-section-counter").val(counter);
        });


        $(document).on("click", ".delete-packageinfo-item", function(){

            var id = $(this).data('id');
            var url = '/tour-package/delete/hero-section/'+id;
            // alert(url);
            $.ajax({
                type:'get',
                url:url,
                success:function(data){
                    $("#tourPlanForm-"+id).remove();
                    swal.fire({
                        title:"Success!",
                        html:"Delected selected tour plan successfully",
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
