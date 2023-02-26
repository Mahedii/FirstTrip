<script type="text/javascript">

    $(document).ready(function () {


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


        $(document).on('click', '.included_btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#included-row-'+button_id+'').remove();

            var counter = $("#included-counter").val() - 1;
            $("#included-counter").val(counter);
        });


        $(document).on("click", ".delete-included-item", function(){

            var id = $(this).data('id');
            var url = '/tour-package/delete/included-service/'+id;
            // alert(url);
            $.ajax({
                type:'get',
                url:url,
                success:function(data){
                    $("#incServiceForm-"+id).remove();
                    swal.fire({
                        title:"Success!",
                        html:"Delected selected included service successfully",
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
