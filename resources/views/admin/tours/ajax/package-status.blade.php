<script type="text/javascript">

    $(document).ready(function () {

        $(document).on('click', '.unpublishedBtn', function(){
            var packageID = $(this).closest('tr').attr('data-id');
            var url = '/tour-package/status/update/'+packageID;

            $.ajax({
                type:'get',
                url:url,
                success:function(data){

                    if(data.status == '1'){
                        $(".package-"+packageID+" .unpublishedBtn").hide();
                        $(".package-"+packageID+" .publishedBtn").show();
                    }else{
                        $(".package-"+packageID+" .unpublishedBtn").show();
                        $(".package-"+packageID+" .publishedBtn").hide();
                    }

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        });


        $(document).on('click', '.publishedBtn', function(){
            var packageID = $(this).closest('tr').attr('data-id');
            var url = '/tour-package/status/update/'+packageID;

            $.ajax({
                type:'get',
                url:url,
                success:function(data){

                    if(data.status == '1'){
                        $(".package-"+packageID+" .unpublishedBtn").hide();
                        $(".package-"+packageID+" .publishedBtn").show();
                    }else{
                        $(".package-"+packageID+" .unpublishedBtn").show();
                        $(".package-"+packageID+" .publishedBtn").hide();
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
