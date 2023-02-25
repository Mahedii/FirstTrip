<!-- @foreach($logs as $key => $log)

    <div class="col-xxl-3 col-sm-6 project-card">
        <div class="card {{ $log->CARD_COLOR }} card-height-100">
            <div class="card-body">
                <div class="d-flex flex-column h-100">
                    

                    <div class="d-flex mt-3">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-sm">
                                <span class=" rounded p-2">
                                    <img src="{!! asset('theme/admin/assets/images/users/multi-user.jpg') !!}" alt=""
                                        class="img-fluid p-1">
                                </span>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h4 class="mb-1 fs-15"><a href="apps-projects-overview.php"
                                    class="text-white">{{ $log->name }}</a></h4>
                            <p class="text-white text-truncate-two-lines mt-2 mb-3">{{ $log->ACTION }}</p>
                        </div>
                    </div>
                    
                </div>

            </div>
            
            <div class="card-footer bg-transparent border-top-dashed py-2">
                <div class="d-flex flex-column h-100">

                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-white mb-4"><i class="ri-calendar-event-fill me-1 align-bottom"></i> {{ $log->created_at }}</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-1 align-items-center">
                                <a href="{{ route('activity.log.delete',$log->id) }}" class="btn avatar-xs mt-n1 p-0 shadow-none">
                                    <span class="avatar-title bg-transparent fs-15">
                                        <i class="ri-delete-bin-fill text-white"></i>
                                    </span>
                                </a>
                                
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            
        </div>
        
    </div>
    

@endforeach -->


<script type="text/javascript">

    $(document).ready(function () {

        $("#searchText").on('keyup', function(e){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // e.preventDefault();

            var searchText = $('#searchText').val();
            // var duration = $( "#duration option:selected" ).val();
            var url = "/activity-log/search/"+searchText+"/"+searchText;

            // alert(duration);

            if(searchText == ""){
                $("#searchedResult").html("");
                $(".orginial").show();
            }

            $.ajax({
                type:'GET',
                url:url,
                dataType:'json',
                // data:{searchText:searchText,duration:searchText},
                success:function(data){

                    // alert(data.count);

                    if(data.error == 1){

                        $("#searchedResult").html(
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                                '<strong>Sorry, Not found!</strong>'+
                                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+
                            '</div>'
                        );
                    }
                    else{
                        $(".orginial").hide();
                        $('.ajax-load').hide();
                        $("#searchedResult").html(data.queryData);
                    }

                }
                // ,error: function (xhr, ajaxOptions, thrownError) {
                //     alert(xhr.status);
                //     alert(thrownError);
                // }
            });

        });

    });

</script>

<script type="text/javascript">

    var busy = false;
    var limit = 20;
    var offset = 0;

    function displayRecords(lim, off) {

        var url = "/activity-log/"+lim+"/"+off;

        $.ajax({
            type: "GET",
            async: false,
            url: url,
            data: "limit=" + lim + "&offset=" + off,
            cache: false,
            beforeSend: function() {
                $(".ajax-load").html("").hide();
                $('.ajax-load').show();
            },
            success: function(html) {
                $("#results").append(html);
                $('.ajax-load').hide();
                if (html == "") {
                $(".ajax-load").html('<button class="btn btn-default" type="button">No more log records.</button>').show()
                } else {
                $(".ajax-load").html('<button class="btn btn-default" type="button">Loading please wait...</button>').show();
                }
                window.busy = false;


            }
        });
    }

    $(document).ready(function() {
        // start to load the first set of data
        if (busy == false) {
        busy = true;
        // start to load the first set of data
        displayRecords(limit, offset);
        }


        $(window).scroll(function() {
        // make sure u give the container id of the data to be loaded in.
        if ($(window).scrollTop() + $(window).height() > $("#results").height() && !busy) {
            busy = true;
            offset = limit + offset;

            // this is optional just to delay the loading of data
            setTimeout(function() { displayRecords(limit, offset); }, 500);

            // you can remove the above code and can use directly this function
            // displayRecords(limit, offset);

        }
        });

    });

</script>