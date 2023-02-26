<script type="text/javascript">

    $(document).ready(function () {


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


        $(document).on('click', '.tour_plan_btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#tour-plan-row-'+button_id+'').remove();

            var counter = $("#tour-plan-counter").val() - 1;
            $("#tour-plan-counter").val(counter);
        });


        $(document).on("click", ".delete-packageinfo-item", function(){

            var id = $(this).data('id');
            var url = '/tour-package/delete/tour-plan/'+id;
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
