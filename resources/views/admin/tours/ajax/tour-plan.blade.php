<script type="text/javascript">

    $(document).ready(function () {


        var rowCount = parseInt("<?php echo $tourPackageInfoDataCount; ?>");
        if(rowCount){
            for (let i = 0; i < rowCount; i++) {
                var textarea_id = "TOUR_PLAN_TITLE_BODY_"+i;
                ckEditor_Generator(textarea_id);
            }
        }


        ckEditor_Generator("TOUR_PLAN_TITLE_BODY_CK_EDITOR_1");


        var tour_plan_counter=1;
        $('#add-tour-plan-item').click(function(){
            ++tour_plan_counter;
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
                                    '<textarea class="form-control" name="TOUR_PLAN_TITLE_BODY[]" id="TOUR_PLAN_TITLE_BODY_CK_EDITOR_'+tour_plan_counter+'" rows="3"></textarea>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="text-end mb-3">'+
                            '<button type="button" name="remove" id="'+tour_plan_counter+'" class="btn btn-danger tour_plan_btn_remove w-sm">Delete</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );

            ckEditor_Generator("TOUR_PLAN_TITLE_BODY_CK_EDITOR_"+tour_plan_counter);

        });


        function ckEditor_Generator(textarea_id){

            CKEDITOR.ClassicEditor.create(document.getElementById(textarea_id), {
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // placeholder: 'Welcome to CKEditor 5!',
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                htmlEmbed: {
                    showPreviews: true
                },
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },

                removePlugins: [
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    'MathType'
                ]
            });

        }


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
