<script type="text/javascript">

    $(document).ready(function () {


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


        $(document).on('click', '.excluded_btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#excluded-row-'+button_id+'').remove();

            var counter = $("#excluded-counter").val() - 1;
            $("#excluded-counter").val(counter);
        });


        $(document).on("click", ".delete-excluded-item", function(){

            var id = $(this).data('id');
            var url = '/tour-package/delete/excluded-service/'+id;
            // alert(url);
            $.ajax({
                type:'get',
                url:url,
                success:function(data){
                    $("#excServiceForm-"+id).remove();
                    swal.fire({
                        title:"Success!",
                        html:"Delected selected excluded service successfully",
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
