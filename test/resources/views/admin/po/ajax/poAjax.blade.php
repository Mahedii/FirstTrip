<script type="text/javascript">

    $(document).ready(function () {


        $(document).on('change', '#select-po-no', function () {
            var po_no = $( "#select-po-no option:selected" ).val();
            // alert(po_no);
            var url = '/po/load/vat-ait/'+po_no;

            $.ajax({
                type:'get',
                url:url,
                success:function(data){

                    $('#VAT').val(data.VAT);
                    $('#AIT').val(data.AIT);  

                }
            });
        });


        $(document).on('change', '#inputFile', function () {

            var fileInput = document.getElementById('inputFile');
                
            var filePath = fileInput.value;
            // alert(filePath);

            // Allowing file type
            var allowedExtensions =
                    /(\.zip|\.pdf|\.docx)$/i;
                
            if (!allowedExtensions.exec(filePath)) {
                    // alert('Invalid file type');
                    $(".fileErrMsg").html("Unsupported format (pdf/docx only)");
                    fileInput.value = '';
                    // return false;
            }
            else{
                $(".fileErrMsg").html("");
            }

            // Check if any file is selected.
            if (fileInput.files.length > 0) {
                for (const i = 0; i <= fileInput.files.length - 1; i++) {

                    const fsize = fileInput.files.item(i).size;
                    const file = Math.round((fsize / 1024));
                    // alert(file);
                    // The size of the file.
                    if (file >= 5120) {
                        // alert("File too Big, please select a file less than 100mb");
                        $(".fileSizeErrMsg").html("Select a file less than 5MB");
                        fileInput.value = '';
                    } 
                    else{
                        $(".fileSizeErrMsg").html("");
                    }
                    
                }
            }

            //get the file size and file type from file input field


        });


        function totalPrice(counter) {

            var total_price = 0;

            // alert(counter);

            for (var i = 0; i < counter; i++) {

                var unit_price = $('#UNIT_PRICE'+i).val();
                var quantity = $('#QUANTITY'+i).val();

                total_price += unit_price*quantity;
                // alert('#UNIT_PRICE'+i);
            }

            $('#PRICE_WITHOUT_VAT_AIT').val("৳"+total_price);

            return total_price;
        }


        function vatAitPrice(total_price,vat,ait) {

            var excluded_vat_price = total_price / (1+(vat/100));
            var excluded_ait_price = total_price - ((total_price*ait)/100);
  
            var vat_ait_excluded_price = excluded_vat_price-((excluded_vat_price*ait)/100);

            var price_with_vat = total_price + ((total_price*vat)/100);
            var price_with_ait = total_price + ((total_price*ait)/100);

            $('#vat_ait_included_price').val("৳"+(total_price+((total_price*vat)/100)+((total_price*ait)/100)).toFixed(2));

            if(vat>0 && ait>0){
                
                $('#VAT_AIT_EXCLUDED_PRICE').val("৳"+vat_ait_excluded_price.toFixed(2));
                $('#TOTAL_VAT').val("৳"+((total_price*vat)/100).toFixed(2));
                $('#TOTAL_AIT').val("৳"+((total_price*ait)/100).toFixed(2));
            }
            else if(vat>0 && ait<=0){
                $('#VAT_AIT_EXCLUDED_PRICE').val("৳"+excluded_vat_price.toFixed(2));
                $('#TOTAL_VAT').val("৳"+((total_price*vat)/100).toFixed(2));
                $('#TOTAL_AIT').val("৳0.00");
            }
            else if(vat<=0 && ait>0){
                
                $('#VAT_AIT_EXCLUDED_PRICE').val("৳"+excluded_ait_price.toFixed(2));
                $('#TOTAL_VAT').val("৳0.00");
                $('#TOTAL_AIT').val("৳"+((total_price*ait)/100).toFixed(2));
            }
            else{
                $('#VAT_AIT_EXCLUDED_PRICE').val("৳"+total_price.toFixed(2));
                $('#TOTAL_VAT').val("৳0.00");
                $('#TOTAL_AIT').val("৳0.00");
            }

        }


        $('#dynamic_field').on('keyup', '.UNIT_PRICE', function () {

            var id = $(this).data('id');
            var unit_price = $('#UNIT_PRICE'+id).val();
            var quantity = $('#QUANTITY'+id).val();
            var vat = $('#VAT').val();
            var ait = $('#AIT').val();

            var counter = $("#counter").val();
            var net_total_price = totalPrice(counter);

            if(quantity>0){

                var total_price = unit_price*quantity;
                $('#TOTAL_PRICE'+id).val(total_price);

                vatAitPrice(net_total_price,vat,ait);

            }
            else{
                $('#TOTAL_PRICE'+id).val(0);
                $('#VAT_AIT_PRICE').val(0);
            }
            
        });


        // $('#UNIT_PRICE').on('keyup', function() {

        //     var unit_price = $('#UNIT_PRICE').val();
        //     var quantity = $('#QUANTITY').val();
        //     var vat = $('#VAT').val();
        //     var ait = $('#AIT').val();

        //     if(quantity>0){
        //         var total_price = unit_price*quantity;
        //         $('#TOTAL_PRICE').val(total_price);

        //         if(vat>0 && ait>0){
        //             var vat_price = total_price / (1+(vat/100));
        //             var vat_ait_price = vat_price-((vat_price*ait)/100);
        //             $('#VAT_AIT_PRICE').val(vat_ait_price.toFixed(2));
        //         }
        //         else if(vat>0 && ait<=0){
        //             var vat_price = total_price / (1+(vat/100));
        //             $('#VAT_AIT_PRICE').val(vat_price.toFixed(2));
        //         }
        //         else if(vat<=0 && ait>0){
        //             var ait_price = total_price - ((total_price*ait)/100);
        //             $('#VAT_AIT_PRICE').val(ait_price.toFixed(2));
        //         }
        //         else{
        //             $('#VAT_AIT_PRICE').val(total_price.toFixed(2));
        //         }
        //     }
        //     else{
        //         $('#TOTAL_PRICE').val(0);
        //         $('#VAT_AIT_PRICE').val(0);
        //     }

        // });


        $('#dynamic_field').on('keyup', '.QUANTITY', function () {

            var id = $(this).data('id');
            var unit_price = $('#UNIT_PRICE'+id).val();
            var quantity = $('#QUANTITY'+id).val();
            var vat = $('#VAT').val();
            var ait = $('#AIT').val();

            var counter = $("#counter").val();
            var net_total_price = totalPrice(counter);

            if(unit_price>0){
                var total_price = unit_price*quantity;
                $('#TOTAL_PRICE'+id).val(total_price);

                vatAitPrice(net_total_price,vat,ait); 
            }
            else{
                $('#TOTAL_PRICE'+id).val(0);
                $('#VAT_AIT_PRICE').val(0);
            }

        });


        $('#VAT').on('keyup', function() {

            var total_price = $('#TOTAL_PRICE').val();
            var vat = $('#VAT').val();
            var ait = $('#AIT').val();

            var counter = $("#counter").val();
            var net_total_price = totalPrice(counter);

            vatAitPrice(net_total_price,vat,ait);

        });


        $('#AIT').on('keyup', function() {

            var total_price = $('#TOTAL_PRICE').val();
            var vat = $('#VAT').val();
            var ait = $('#AIT').val();

            var counter = $("#counter").val();
            var net_total_price = totalPrice(counter);

            vatAitPrice(net_total_price,vat,ait);

        });




        var i=0;  
        $('#add-item').click(function(){  
            i++; 
            var counter = parseInt($("#counter").val())+1;
            $("#counter").val(counter); 
            $('#dynamic_field').append(
                '<div class="card" id="row'+i+'">'+
                    '<div class="card-header align-items-center d-flex">'+
                        '<h4 class="card-title mb-0 flex-grow-1">Item #'+i+'</h4>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<div class="row mb-3">'+
                            '<div class="col-md-3">'+
                                '<div class="mb-3">'+
                                    '<label for="SL" class="form-label">SL<span class="text-danger">*</span></label>'+
                                    '<input type="text" class="form-control" name="SL[]" value="'+(i+1)+'">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-3">'+
                                '<div class="mb-3">'+
                                    '<label for="ITEM_CODE" class="form-label">Item Code<span class="text-danger">*</span></label>'+
                                    '<input type="text" class="form-control" name="ITEM_CODE[]">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-3">'+
                                '<div class="mb-3">'+
                                    '<label for="DELIVERY_DATE" class="form-label">Delivery Deadline<span class="text-danger">*</span></label>'+
                                    '<input type="date" class="form-control" name="DELIVERY_DATE[]">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-3">'+
                                '<div>'+
                                    '<label for="PRODUCT_DESCRIPTION" class="form-label">Product Description</label>'+
                                    '<textarea class="form-control" name="PRODUCT_DESCRIPTION[]"></textarea>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="col-md-3">'+
                                '<div class="mb-3">'+
                                    '<label for="UNIT" class="form-label">Unit<span class="text-danger">*</span></label>'+
                                    '<input type="text" class="form-control" name="UNIT[]">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-3">'+
                                '<div class="mb-3">'+
                                    '<label for="UNIT_PRICE" class="form-label">Unit Price<span class="text-danger">*</span></label>'+
                                    '<input type="text" class="form-control UNIT_PRICE" data-id="'+i+'" id="UNIT_PRICE'+i+'" name="UNIT_PRICE[]">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-3">'+
                                '<div class="mb-3">'+
                                    '<label for="QUANTITY" class="form-label">Quantity<span class="text-danger">*</span></label>'+
                                    '<input type="text" class="form-control QUANTITY" data-id="'+i+'" id="QUANTITY'+i+'" name="QUANTITY[]">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-3">'+
                                '<div class="mb-3">'+
                                    '<label for="TOTAL_PRICE" class="form-label">Total Price</label>'+
                                    '<input type="text" class="form-control" placeholder="0" data-id="'+i+'" id="TOTAL_PRICE'+i+'" name="TOTAL_PRICE[]" readonly>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="text-end mb-3">'+
                            '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove w-sm">Delete</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );  
        });  

        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  

            var counter = $("#counter").val() - 1;
            $("#counter").val(counter);
        }); 


        $(".po-list-add-btn").click(function(e){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();
            var dataString = $('#poListForm').serialize();

            // alert(dataString);

            $.ajax({
                type:'POST',
                url:"{{ route('po.list.insert') }}",
                dataType: 'json',
                data:dataString,
                success:function(data){
                    
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

                    }
                    else{

                        swal.fire({
                            title:"Success!",
                            html:data.success,
                            icon:"success",
                            button:"Aww yiss!"
                        });

                        $("#poListForm")[0].reset();  

                    }

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        });

    });

</script>